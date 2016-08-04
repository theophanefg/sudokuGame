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
}
