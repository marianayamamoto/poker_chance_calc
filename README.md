# Poker Change Calculator
Requirements
1. The user should be able to select a card
2. The user should be able to see the chance of drawing the selected card
3. The user should be able to draw a card from a shuffled deck
4. The user should not be able to select a new card until he draws the selected one
5. The user should be able to see which card he has drawn from the deck
6. If the drawn card is the selected one, then the user should be able to see a message saying that the card he has drawn is the selected one and the chance of that happening
7. The user should be able to close the message and return to the form to select a new card and see the chance with a new shuffled deck

Unit Tests
1. Assert chance to draw a card from the deck in each draw until the deck is empty
2. Assert generated deck has all cards (all ranks from all suits) and nothing else

Classes responsibilities

* Init at index.php
    * Works as a router to call the desired controller and action
    * Differs only POST requests to call respective action
    * Other requests are treated as GET

* IndexView at views/IndexView.php
    * Contains all HTML and gets data defined in controller
* DeckController at controllers/DeckController.php
    * Contains actions which are called from index.php
    * Responsible to process incoming data and format output
* DeckService at services/DeckService.php
    * Responsible to perform actions and provide data based on the deck
* DeckManager at models/DeckManager.php
    * Holds the deck, suits and ranks
    * Generates the deck as well as shuffles it