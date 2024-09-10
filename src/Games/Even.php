<?php

namespace BrainGames\Even;

function getEvenRules(): string
{
    $message = 'Answer "yes" if the number is even, otherwise answer "no".';
    return $message;
}

function getEvenNumber(): array
{
    $question = rand(1, 99);
    $question % 2 === 0 ? $correctAnswer = 'yes' : $correctAnswer = 'no';
    return [$question, $correctAnswer];
}
