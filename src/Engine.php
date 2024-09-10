<?php

namespace BrainGames\Engine;

use function BrainGames\Calc\getCalc;
use function BrainGames\Calc\getCalcRules;
use function BrainGames\Even\getEvenRules;
use function BrainGames\Even\getEvenNumber;
use function cli\line;
use function cli\prompt;

function playBrainGame(string $gameType): void
{
    $correctAnswersCount = 0;
    $winRoundsCount = 3;

    $name = greetGetName();

    line(showRules($gameType));

    while ($correctAnswersCount < $winRoundsCount) {
        [$question, $correctAnswer] = setGame($gameType);
        line("Question: $question");
        $answer = prompt("Your answer");

        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }

        line("Correct!");
        $correctAnswersCount++;
    }

    line("Congratulations, $name!");
}

function greetGetName(): string
{
    line('Welcome to the Brain Game!');
    $name = ucfirst(prompt('May I have your name?'));
    line("Hello, $name!");

    return $name;
}

function setGame(string $gameType): array
{
    return match ($gameType) {
        'even' => getEvenNumber(),
        'calc' => getCalc()
    };
}

function showRules(string $gameType): string
{
    return match ($gameType) {
        'even' => getEvenRules(),
        'calc' => getCalcRules()
    };
}
