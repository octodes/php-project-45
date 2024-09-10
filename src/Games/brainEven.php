<?php

namespace BrainGames\BrainEven;

use function BrainGames\Greeting\greeting;
use function cli\line;
use function cli\prompt;

function playEvenGame()
{
    $name = greeting();
    $correctAnswerCount = 0;

    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($correctAnswerCount < 3) {
        [$number, $evenState] = getNumber();

        $evenState ? $correctAnswer = 'yes' : $correctAnswer = 'no';

        line("Question: $number");
        $answer = prompt("Your answer");

        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return false;
        }

        $correctAnswerCount++;
        line("Correct!");
    }

    line("Congratulations, $name!");
}

function getNumber()
{
    $number = rand(1, 100);
    return [$number, $number % 2 === 0];
}
