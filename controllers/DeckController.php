<?php

require_once(__DIR__."/../services/DeckService.php");

Class DeckController
{
    private $deckService;

    public function __construct()
    {
        $this->deckService = new DeckService();
    }

    public function index() {
        $data = array();
        $this->setData($data);
        $this->showPage($data);
    }

    public function index_post() {
        // Update deck if it was changed previously
        $postData = func_get_args()[0];
        if (isset($postData["deck"])) {
            $this->deckService->setDeck(explode(",",$postData["deck"]));
        }

        // In case we draw the selected card we need to keep the chance
        $success_chance = $this->deckService->getChanceToDraw();

        // Draw a card
        $data["drawn_card"] = $this->deckService->drawCard();

        // Keep selected values
        $data["selected_suit"] = $postData["suit"];
        $data["selected_rank"] = $postData["rank"];

        // Compare selected card with draw
        $selectedCard = $postData["suit"] . $postData["rank"];
        if ($data["drawn_card"] == $selectedCard) {
            $this->setSuccess($data, $success_chance);
        }

        $this->setData($data);
        $this->showPage($data);
    }

    private function setSuccess(&$data, $success_chance) {
        $data["success"] = true;
        $data["chance_success"] = $success_chance;
        // Reset all
        unset($data["selected_rank"]);
        unset($data["selected_suit"]);
        $this->deckService->getDeckManager()->setNewDeck();
    }

    private function setData(&$data) {
        $deckMng = $this->deckService->getDeckManager();
        $data["ranks"] = $deckMng->getRanks();
        $data["suits"] = $deckMng->getSuits();
        $data["deck"] = implode(",", $deckMng->getDeck());
        $data["deck_size"] = count($deckMng->getDeck());
        $data["chance"] = $this->deckService->getChanceToDraw();
    }

    private function showPage($data) {
        require_once(__DIR__."/../views/IndexView.php");
    }
}
