<?php

class Deck
{
    private array $cards = [];

    public function __construct()
    {
        $suits = ["Klaveren", "Schoppen", "Harten", "Ruiten"];
        $values = ["Aas", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Boer", "Vrouw", "Heer"];

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $card = new Card($suit, $value);
                $this->cards[] = $card;
            }
        }
    }

    public function drawCard(): Card
    {
        if (empty($this->cards)) {
            throw new Exception("Deck is leeg");
        }
        $randomCard = array_rand($this->cards);
        $drawnCard = $this->cards[$randomCard];
        array_splice($this->cards, $randomCard, 1);
        return $drawnCard;
    }

    public function cardsInDeck()
    {
        return count($this->cards) . PHP_EOL;
    }
}
