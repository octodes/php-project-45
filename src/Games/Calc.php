<?php

namespace BrainGames\Calc;

function getCalcRules(): string
{
    $message = 'What is the result of the expression?';
    return $message;
}

function getCalc(): array
{
    $num1 = rand(1, 99);
    $num2 = rand(1, 99);
    $operators = ['+', '-', '*'];
    $operator = $operators[rand(0, 2)];

    $question = "{$num1} {$operator} {$num2}";
    $correctAnswer = match ($operator) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2
    };

    return [$question,(string) $correctAnswer];
}
