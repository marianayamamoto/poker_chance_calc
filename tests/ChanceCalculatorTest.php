<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__.'/../services/DeckService.php');

final class ChanceCalculatorTest extends TestCase
{
    public function testChanceToGetCard() {
        $deckService = new DeckService();
        $deckManager = $deckService->getDeckManager();
        while (count($deckManager->getDeck()) !== 0) {
            $this->assertEquals((1/count($deckManager->getDeck()))*100, $deckService->getChanceToDraw());
            $deckService->drawCard();
        }
    }
}
