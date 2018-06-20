<?php

require_once(__DIR__."/../models/DeckManager.php");

class DeckService
{
    private $deckManager;

    public function __construct()
    {
        $this->deckManager = new DeckManager();
    }

    public function setDeck($deck) {
        $this->deckManager->setDeck($deck);
    }

    public function getDeckManager() {
        return $this->deckManager;
    }

    public function getChanceToDraw() {
        return (1 / count($this->deckManager->getDeck())) * 100;
    }

    public function drawCard() {
        return $this->deckManager->drawCard();
    }

}