<?php

namespace ApiBundle\Service;
use Doctrine\ORM\EntityManager;

use ApiBundle\Entity\SudokuMatch;
use ApiBundle\Service\GridGenerator;

/**
 * Class used to manage the matches 
 *
 * @author Theophane Fremond-Guilbault <tfremond@humanequation.co> | <theophane21@hotmail.com>
 *
 */
class MatchManager
{
	private $doctrine;

	public function __construct($doctrine)
    {
        // we need a local version of doctrine because usually 
        // its only acceptable from the controller
        $this->doctrine = $doctrine;
    }

    // search and find a match for the player. If there is not match availaible, a new on is created.
    public function searchMatch($difficulty, $playerId) 
    {    	
    	// we get the repo for the sudoku matches
        $dbRepo = $this->doctrine->getRepository('ApiBundle:SudokuMatch');
        $em = $this->doctrine->getManager();

        // we look for a match of the queried difficulty without a second player
        $match = $dbRepo->findOneBy(array('difficulty' => $difficulty, 'player2Id' => null));

        // we get the start time of the player. We will use it later to calculate the time of completion of the grid 
        // and as a reference server side to feed the time to the client side when the user resumes this match.
        $timeStamp = strtotime(date("Y-m-d h:i:sa"));

        // if there isn't a match waiting for a second player, we create a new match a push it to the data base
        if(!$match || $match->getPlayer1Id() == $playerId) {
        	$gridGenerator = new GridGenerator($difficulty);
        	$grid = $gridGenerator->getGrid();        	
    		$match = new SudokuMatch($difficulty, $grid, $playerId, $timeStamp);
            $em->persist($match);
        }
        // if there is a match waiting for a second player, the player is added to the match
        else {
        	$match->setPlayer2Id($playerId);
            $match->setP2StartTime($timeStamp);
        }
        
        // we push the changes to the database
        $em->flush();

        // we return the match generated or completed
    	return $match;
    }

    public function saveScore($matchId, $playerId, $time)
    {
        // we get the repo for the sudoku matches
        $dbRepo = $this->doctrine->getRepository('ApiBundle:SudokuMatch');
        $em = $this->doctrine->getManager();

        // we look for the match with matching id and we load it
        $match = $dbRepo->findOneBy(array('id' => $matchId));
        $playerIndex = $this->getPlayerIndex($match, $playerId);
        if($playerIndex == 1) {
            $match->setP1CompletionTime($time);
        }
        else if ($playerIndex == 2) {
            $match->setP2CompletionTime($time);
        }
        
        $em->flush();
        $winnerStatus = $this->getWinnerStatus($match, $playerIndex);
        return $winnerStatus;

    }

    public function leaveMatch($matchId, $playerId) 
    {

    }

    public function getCurrentTimer($matchId, $playerId)
    {
        // we get the repo for the sudoku matches
        $dbRepo = $this->doctrine->getRepository('ApiBundle:SudokuMatch');

        // we look for the match with matching id and we load it
        $match = $dbRepo->findOneBy(array('id' => $matchId));

        $timeStamp = strtotime(date("Y-m-d h:i:sa"));
        $startTime = $this->getStartTime($match, $playerId);
        return $timeStamp - $startTime;
    }

    public function getRecentResults($playerId)
    {
        $results = array();
        $dbRepo = $this->doctrine->getRepository('ApiBundle:SudokuMatch');
        $em = $this->doctrine->getManager();
        $this->getCompletedMatchesP1($playerId);
        // we need to use custom queries to get these matches, because the findBy
        // method doesnt allow us to use 'is not'
        $matchP1 = $this->getCompletedMatchesP1($playerId);
        $matchP2 = $this->getCompletedMatchesP2($playerId);
        foreach ($matchP1 as $match) {
            $matchData = array();
            $winnerId = $match->getWinner();
            if($winnerId !== null) {
                $match->setCheckedByP1(1);
            }
            array_push($matchData,
                $match->getId(),
                $winnerId,
                $match->getP1CompletionTime(),
                $match->getP2CompletionTime(),
                $match->getDifficulty()); 
            array_push($results, $matchData);          
        }
        foreach ($matchP2 as $match) {
            $matchData = array();
            $winnerId = $match->getWinner();
            if($winnerId !== null) {
                $match->setCheckedByP2(1);
            }
            array_push($matchData,
                $match->getId(),
                $winnerId,
                $match->getP2CompletionTime(),
                $match->getP1CompletionTime(),
                $match->getDifficulty());   
            array_push($results, $matchData);              
        }
        $em->flush();
        return $results;
    }

    public function forfeitMatch($matchId, $playerId) 
    {
        $em = $this->doctrine->getManager();
        // we get the repo for the sudoku matches
        $dbRepo = $this->doctrine->getRepository('ApiBundle:SudokuMatch');
        // we look for the match with matching id and we load it
        $match = $dbRepo->findOneBy(array('id' => $matchId));

        $playerIndex = $this->getPlayerIndex($match, $playerId);
        if($playerIndex == 1) {
            $match->setWinner($match->getPlayer2Id());
            $match->setP1CompletionTime(0);
        } 
        else if($playerIndex == 2) {
            $match->setWinner($match->getPlayer1Id());            
            $match->setP2CompletionTime(0);
        }
        else {
            echo("an error occured while getting player's index");
        }
        $em->flush();
        return 1;
    }

    public function getMatchStatus($matchId, $playerId)
    {
        // return 0 if match is still going, return 1 if adversary surrendered
        // we get the repo for the sudoku matches
        $dbRepo = $this->doctrine->getRepository('ApiBundle:SudokuMatch');
        // we look for the match with matching id and we load it
        $match = $dbRepo->findOneBy(array('id' => $matchId));
        $matchStatus = 0;
        if($match->getWinner() == $playerId) {
            $matchStatus = 1;
        }
        return $matchStatus;
    }

    private function getCompletedMatchesP1($playerId)

    {
        $queryB = $this->doctrine->getManager()->createQueryBuilder();
        $quer = $queryB->select(array('m'))
        ->from('ApiBundle:SudokuMatch', 'm')
        ->where('m.player1Id = :playerId')
        ->andWhere('m.checkedByP1 is null')
        ->andWhere('m.p1CompletionTime is not null')
        ->setParameters(array('playerId'=>$playerId))
        ->getQuery();
        return $quer->getResult();

    }

    private function getCompletedMatchesP2($playerId)
    {
        $queryB = $this->doctrine->getManager()->createQueryBuilder();
        $quer = $queryB->select(array('m'))
        ->from('ApiBundle:SudokuMatch', 'm')
        ->where('m.player2Id = :playerId')
        ->andWhere('m.checkedByP2 is null')
        ->andWhere('m.p1CompletionTime is not null')
        ->setParameters(array('playerId'=>$playerId))
        ->getQuery();
        return $quer->getResult();
    }


    private function getPlayerIndex($match, $playerId) 
    {
        
        $playerIndex = 1;
        if($match->getPlayer2Id() == $playerId) {
            $playerIndex = 2;
        }
        return $playerIndex;
    }

    private function getStartTime($match, $playerId)
    {
        $startTime;
        if($match->getPlayer1Id() == $playerId) {
            $startTime = $match->getP1StartTime();
        }
        else
            $startTime = $match->getP2StartTime();
        return $startTime;
    }

    private function getWinnerStatus($match, $playerIndex)
    {
        // returns the status of the game: 1 = game won, 2 = game lost, 3 = game not finished yet, 4 = tie
        $scoreP1 = $match->getP1CompletionTime();
        $scoreP2 = $match->getP2CompletionTime();
        $em = $this->doctrine->getManager();
        $winnerIndex = 0;
        if(!$scoreP1 || !$scoreP2) 
            $winnerIndex = 3;
        else if($scoreP1 == $scoreP2) {
            $winnerIndex = 4;
            $match->setWinner(0);
        }
        else if($scoreP1 < $scoreP2) {
            $winnerIndex = 1;
            $match->setWinner($match->getPlayer1Id());
        } 
        else {
            $winnerIndex = 2;
            $match->setWinner($match->getPlayer2Id());
        }

        if ($winnerIndex == 3)
            $winnerStatus = 3;
        else if ($winnerIndex == 4)
            $winnerStatus = 4;
        else if ($winnerIndex == $playerIndex) 
            $winnerStatus = 1;
        else
            $winnerStatus = 2;
        $em->flush();
        return $winnerStatus;
    }
}