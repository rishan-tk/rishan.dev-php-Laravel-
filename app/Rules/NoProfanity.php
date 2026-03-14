<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoProfanity implements ValidationRule
{
    private array $words = [
        'fuck', 'shit', 'ass', 'bitch', 'damn', 'crap', 'dick', 'bastard',
        'cunt', 'piss', 'cock', 'wanker', 'twat', 'bollocks', 'slut', 'whore',
        'nigger', 'nigga', 'faggot', 'retard',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $lower = strtolower($value);

        foreach ($this->words as $word) {
            if (str_contains($lower, $word)) {
                $fail('Please keep the language professional.');
                return;
            }
        }
    }
}
