<?php

namespace BrainGames\Calc;

function getProgressionRules(): string
{
    $message = 'What number is missing in the progression?';
    return $message;
}

function getProgression(): array
{
    $progression = generateProgression();
    $hiddenElemIndex = rand(0, sizeof($progression) - 1);

    $correctAnswer = $progression[$hiddenElemIndex];

    $progression[$hiddenElemIndex] = '..';
    $question = implode(' ', $progression);

    return [$question,(string) $correctAnswer];
}

function generateProgression(): array
{
    $length = rand(5, 10);
    $element = rand(1, 50);
    $step = rand(2, 6);
    $progression = [$element];

    for ($i = 1; $i < $length; $i++) {
        $element += $step;
        $progression[] = $element;
    }

    return $progression;
}
