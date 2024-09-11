<?php

namespace BrainGames\Engine;

use function BrainGames\Calc\getCalc;
use function BrainGames\Calc\getCalcRules;
use function BrainGames\Calc\getGCD;
use function BrainGames\Calc\getGCDRules;
use function BrainGames\Calc\getPrime;
use function BrainGames\Calc\getPrimeRules;
use function BrainGames\Calc\getProgression;
use function BrainGames\Calc\getProgressionRules;
use function BrainGames\Even\getEvenRules;
use function BrainGames\Even\getEven;
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

function setGame(string $gameType): array
{
    return match ($gameType) {
        'even' => getEven(),
        'calc' => getCalc(),
        'gcd' => getGCD(),
        'progression' => getProgression(),
        'prime' => getPrime()
    };
}

function showRules(string $gameType): string
{
    return match ($gameType) {
        'even' => getEvenRules(),
        'calc' => getCalcRules(),
        'gcd' => getGCDRules(),
        'progression' => getProgressionRules(),
        'prime' => getPrimeRules()
    };
}

function greetGetName(): string
{
    line('Welcome to the Brain Game!');
    $name = ucfirst(prompt('May I have your name?'));
    line("Hello, $name!");

    return $name;
}
