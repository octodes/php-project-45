<?php

namespace BrainGames\Calc;

function getPrimeRules(): string
{
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    return $message;
}

function getPrime(): array
{
    $question = rand(1, 99);
    isPrime($question) ? $correctAnswer = 'yes' : $correctAnswer = 'no';

    return [$question, $correctAnswer];
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 3; $i < intdiv($num, 2) + 1; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
