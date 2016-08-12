<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SudokuMatch
 *
 * @ORM\Table(name="sudoku_match")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\SudokuMatchRepository")
 */
class SudokuMatch
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulty", type="string")
     */
    private $difficulty;

    /**
     * @var array
     *
     * @ORM\Column(name="grid", type="array")
     */
    private $grid;

    /**
     * @var array
     *
     * @ORM\Column(name="winner", type="integer", nullable=true)
     */
    private $winner;

    /**
     * @var int
     *
     * @ORM\Column(name="player1", type="integer", nullable=true)
     */
    private $player1Id;

    /**
     * @var int
     *
     * @ORM\Column(name="player2", type="integer", nullable=true)
     */
    private $player2Id;

    /**
     * @var int
     *
     * @ORM\Column(name="p1StartTime", type="integer", nullable=true)
     */
    private $p1StartTime;

    /**
     * @var int
     *
     * @ORM\Column(name="p2StartTime", type="integer", nullable=true)
     */
    private $p2StartTime;

    /**
     * @var int
     *
     * @ORM\Column(name="p1CompletionTime", type="integer", nullable=true)
     */
    private $p1CompletionTime;

    /**
     * @var int
     *
     * @ORM\Column(name="p2CompletionTime", type="integer", nullable=true)
     */
    private $p2CompletionTime;

    /**
     * @var int
     *
     * @ORM\Column(name="checkedByP1", type="integer", nullable=true)
     */
    private $checkedByP1;

    /**
     * @var int
     *
     * @ORM\Column(name="checkedByP2", type="integer", nullable=true)
     */
    private $checkedByP2;

    public function __construct($difficulty, $grid, $playerId, $startTime)
    {
        $this->difficulty = $difficulty;
        $this->grid = $grid;
        $this->player1Id = $playerId;
        $this->p1StartTime = $startTime;
    }
   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set difficulty
     *
     * @param string $difficulty
     * @return SudokuMatch
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return string 
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set grid
     *
     * @param array $grid
     * @return SudokuMatch
     */
    public function setGrid($grid)
    {
        $this->grid = $grid;

        return $this;
    }

    /**
     * Get grid
     *
     * @return array 
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * Set winner
     *
     * @param integer $winner
     * @return SudokuMatch
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return integer 
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set player1Id
     *
     * @param integer $player1Id
     * @return SudokuMatch
     */
    public function setPlayer1Id($player1Id)
    {
        $this->player1Id = $player1Id;

        return $this;
    }

    /**
     * Get player1Id
     *
     * @return integer 
     */
    public function getPlayer1Id()
    {
        return $this->player1Id;
    }

    /**
     * Set player2Id
     *
     * @param integer $player2Id
     * @return SudokuMatch
     */
    public function setPlayer2Id($player2Id)
    {
        $this->player2Id = $player2Id;

        return $this;
    }

    /**
     * Get player2Id
     *
     * @return integer 
     */
    public function getPlayer2Id()
    {
        return $this->player2Id;
    }

    

    /**
     * Set p1StartTime
     *
     * @param integer $p1StartTime
     * @return SudokuMatch
     */
    public function setP1StartTime($p1StartTime)
    {
        $this->p1StartTime = $p1StartTime;

        return $this;
    }

    /**
     * Get p1StartTime
     *
     * @return integer 
     */
    public function getP1StartTime()
    {
        return $this->p1StartTime;
    }

    /**
     * Set p2StartTime
     *
     * @param integer $p2StartTime
     * @return SudokuMatch
     */
    public function setP2StartTime($p2StartTime)
    {
        $this->p2StartTime = $p2StartTime;

        return $this;
    }

    /**
     * Get p2StartTime
     *
     * @return integer 
     */
    public function getP2StartTime()
    {
        return $this->p2StartTime;
    }

    /**
     * Set p1CompletionTime
     *
     * @param integer $p1CompletionTime
     * @return SudokuMatch
     */
    public function setP1CompletionTime($p1CompletionTime)
    {
        $this->p1CompletionTime = $p1CompletionTime;

        return $this;
    }

    /**
     * Get p1CompletionTime
     *
     * @return integer 
     */
    public function getP1CompletionTime()
    {
        return $this->p1CompletionTime;
    }

    /**
     * Set p2CompletionTime
     *
     * @param integer $p2CompletionTime
     * @return SudokuMatch
     */
    public function setP2CompletionTime($p2CompletionTime)
    {
        $this->p2CompletionTime = $p2CompletionTime;

        return $this;
    }

    /**
     * Get p2CompletionTime
     *
     * @return integer 
     */
    public function getP2CompletionTime()
    {
        return $this->p2CompletionTime;
    }

    /**
     * Set checkedByP1
     *
     * @param integer $checkedByP1
     * @return SudokuMatch
     */
    public function setCheckedByP1($checkedByP1)
    {
        $this->checkedByP1 = $checkedByP1;

        return $this;
    }

    /**
     * Get checkedByP1
     *
     * @return integer 
     */
    public function getCheckedByP1()
    {
        return $this->checkedByP1;
    }

    /**
     * Set checkedByP2
     *
     * @param integer $checkedByP2
     * @return SudokuMatch
     */
    public function setCheckedByP2($checkedByP2)
    {
        $this->checkedByP2 = $checkedByP2;

        return $this;
    }

    /**
     * Get checkedByP2
     *
     * @return integer 
     */
    public function getCheckedByP2()
    {
        return $this->checkedByP2;
    }
}
