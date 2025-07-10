<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $response = Http::get("https://www.google.com/recaptcha/api/siteverify", [
            // "secret" => env('GOOGLE_RECAPTCHA_SECRET'),
            "secret" => 'sdasdsad',
            "response" => $value
        ])->json();

        if (!$response['success']) {
            $fail("The google recaptcha not valid");
        }

        // dd($response);
    }
}
