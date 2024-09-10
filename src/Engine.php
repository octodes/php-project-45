<?php

namespace BrainGames\Engine;

use function BrainGames\Greeting\greetGetName;
use function cli\line;
use function cli\prompt;

function playBrainGame(string $gameType, string $message) {
    $name = greetGetName();
    $correctAnswersCount = 0;
    $winRoundsCount = 3;

    line($message);
    
    while ($correctAnswersCount < $winRoundsCount) {
        [$question, $correctAnswer] = 
    }

    

}