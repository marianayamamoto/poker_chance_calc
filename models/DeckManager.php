<?php

Class DeckManager {

    private $deck = array();
    private $suits = array('H','S','D','C');
    private $ranks = array('A','2','3','4','5','6','7','8','9','10','J','Q','K');

    public function __construct(){
        // Generate deck and shuffle it
        $this->setNewDeck();
    }

    public function getRanks() {
        return $this->ranks;
    }

    public function getSuits() {
        return $this->suits;
    }

    public function setDeck($deck) {
        $this->deck = $deck;
    }

    public function getDeck() {
        return $this->deck;
    }

    public function setNewDeck() {
        $this->deck = array();
        foreach ($this->suits as $suit) {
            foreach ($this->ranks as $value) {
                $this->deck[] = $suit . $value;
            }
        }
        $this->shuffleDeck();
    }

    public function shuffleDeck() {
        srand((float)microtime()*1000000);
        shuffle($this->deck);
    }

    public function drawCard() {
        $drawnCard = array_pop($this->deck);
        return $drawnCard;
    }

}