<?php

class Player
{
    private $name;
    public array $hand = [];
    public Blackjack $blackjack;

    public function __construct()
    {
        $this->name = readline("Wat is je naam?... ");
        $this->blackjack = new Blackjack();
    }

    public function addCard(Card $card)
    {
        $this->hand[] = $card;
    }

    public function showHand(): string
    {
        $hand = $this->name . " has ";
        foreach ($this->hand as $card) {
            $hand = $hand . $card->show() . " ";
        }
        return $hand;
    }

    public function getScore(): string
    {
        $score = 0;
        foreach ($this->hand as $card) {
            $score += $card->score();
        }

        return $score;
    }
}
