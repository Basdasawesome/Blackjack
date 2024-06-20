<?php

class Blackjack
{
    public function scoreHand(array $hand): string
    {
        $total = 0;
        foreach ($hand as $card) {
            $total += $card->score();
        }
        if ($total > 21) {
            $score = "Busted! ";
        } else if ($total == 21 && count($hand) == 2) {
            $score = "Blackjack! ";
        } else if ($total == 21) {
            $score = "Twenty-One! ";
        } else if ($total < 21 && count($hand) == 5) {
            $score = "Five Card Charlie! ";
        } else {
            $score = $total . "! ";
        }

        return $score;
    }
}
