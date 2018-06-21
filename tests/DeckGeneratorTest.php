<?php
use PHPUnit\Framework\TestCase;
require_once(__DIR__.'/../services/DeckService.php');

final class DeckGeneratorTest extends TestCase
{
    /**
     * @dataProvider deckProvider
     */
    public function testGeneratedDeck($suits, $ranks) {
        $deckService = new DeckService();
        $deckManager = $deckService->getDeckManager();
        $generatedDeck = $deckManager->getDeck();
        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $card = $suit.$rank;
                $this->assertContains($card, $generatedDeck);
                unset($generatedDeck[array_search($card, $generatedDeck)]);
                array_values($generatedDeck);
            }
        }
        $this->assertCount(0, $generatedDeck);
    }

    public function deckProvider() {
        return array(array(
            array('H','S','D','C'),
            array('A','2','3','4','5','6','7','8','9','10','J','Q','K'))
        );
    }
}