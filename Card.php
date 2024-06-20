<?php

class Card
{
    private string $suit;
    private string $value;

    public function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->validateSuit($this->suit);

        $this->value = $value;
        $this->validateValue($this->value);
    }

    private function validateSuit($suit): void
    {
        if (!($suit == "Klaveren" || $suit == "Schoppen" || $suit == "Harten" || $suit == "Ruiten")) {
            throw new InvalidArgumentException("Invalid suit given: " . $suit . PHP_EOL);
        }
    }

    private function validateValue($value): void
    {
        if (!(((int) $value >= 2 && (int) $value <= 10) || $value == "Boer" || $value == "Vrouw" || $value == "Heer" || $value == "Aas")) {
            throw new InvalidArgumentException("Invalid value given: " . $value . PHP_EOL);
        }
    }

    public function show(): string
    {
        switch ($this->suit) {
            case "Klaveren":
                $this->suit = "♣";
                break;
            case "Harten":
                $this->suit = "♥";
                break;
            case "Schoppen":
                $this->suit = "♠";
                break;
            case "Ruiten":
                $this->suit = "♦";
                break;
            default:
        }

        switch ($this->value) {
            case "Boer":
                $this->value = "B";
                break;
            case "Vrouw":
                $this->value = "V";
                break;
            case "Heer":
                $this->value = "H";
                break;
            case "Aas":
                $this->value = "A";
                break;
            default:
        }
        return $this->suit . "/" . $this->value;
    }

    public function score(): int
    {
        $score = 0;
        if ($this->value >= 2 && $this->value <= 10) {
            $score = $this->value;
        } else if ($this->value == "A") {
            $score = 11;
        } else {
            $score = 10;
        }
        return $score;
    }
}
