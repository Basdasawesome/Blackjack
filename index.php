<?php

require_once("Card.php");
require_once("Deck.php");
require_once("Player.php");
require_once("Blackjack.php");

try {
    $next = "";
    $deck = new Deck();
    $player = new Player();
    $player->addCard($deck->drawCard());
    $player->addCard($deck->drawCard());
    echo $player->showHand() . PHP_EOL;
    while ($next != "s") {
        if ($player->getScore() < 21) {
            $next = readline("Nieuwe kaart (n) of stoppen (s)?... ");
            if ($next == "n") {
                $player->addCard($deck->drawCard());
                if ($player->getScore() < 21) {
                    echo $player->showHand() . PHP_EOL;
                } else {
                    $next = "s";
                }
            }
        } else {
            $next = "s";
        }
    }
    if ($next == "s") {
        echo $player->blackjack->scoreHand($player->hand) . $player->showHand();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
