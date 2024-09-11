<?php

namespace BrainGames\Calc;

function getGCDRules(): string
{
    $message = 'Find the greatest common divisor of given numbers.';
    return $message;
}

function getGCD(): array
{
    $num1 = rand(1, 99);
    $num2 = rand(1, 99);
    $question = "{$num1} {$num2}";
    $correctAnswer = calculateGCD($num1, $num2);

    return [$question,(string) $correctAnswer];
}

function calculateGCD($num1, $num2): int
{
    return $num2 ? calculateGCD($num2, $num1 % $num2) : $num1;
}
