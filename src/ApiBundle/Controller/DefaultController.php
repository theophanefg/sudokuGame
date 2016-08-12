<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use ApiBundle\Service\MyAPI;
use ApiBundle\Service\MatchManager;

use ApiBundle\Entity\SudokuMatch;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
		return new Response(json_encode('salut'));
    }

    public function newGameAction(Request $request, $difficulty, $playerId)
    {
    	$matchManager = new MatchManager($this->getDoctrine());
    	$match = $matchManager->searchMatch($difficulty, $playerId);
    	$dataArray = array($match->getGrid(), $match->getId());
			
		return new Response(json_encode($dataArray));
    }

    public function saveScoreAction(Request $request, $matchId, $playerId, $time)
    {
    	$matchManager = new MatchManager($this->getDoctrine());
    	$winnerStatus = $matchManager->saveScore($matchId, $playerId, $time);

    	return new Response(json_encode($winnerStatus));
    }

    public function getTimerAction(Request $request, $matchId, $playerId)
    {
    	$matchManager = new MatchManager($this->getDoctrine());
    	$timer = $matchManager->getCurrentTimer($matchId, $playerId);

		return new Response(json_encode($timer));
    }

    public function getRecentResultsAction(Request $request, $playerId)
    {
    	$matchManager = new MatchManager($this->getDoctrine());
    	$recentResults = $matchManager->getRecentResults($playerId);
		return new Response(json_encode($recentResults));
    }

    public function forfeitMatchAction(Request $request, $matchId, $playerId)
    {
    	$matchManager = new MatchManager($this->getDoctrine());
    	$response = $matchManager->forfeitMatch($matchId, $playerId);
    	return new Response(json_encode($response));
    }

    public function getMatchStatus(Request $request, $matchId, $playerId)
    {
    	//return match status, 0 for match still going
    	// 1 for match surrendered by p1, 2 for match surrendered by p2
    	$matchManager = new MatchManager($this->getDoctrine());
    	$matchStatus = $matchManager->getMatchStatus($matchId, $playerId);
    	return new Response(json_encode($matchStatus));
    }

}
