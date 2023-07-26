<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RandomPassword extends Controller
{
    //Generate a random, secure password.
    public static function password($length = 8, $letters = true, $numbers = true, $symbols = true, $spaces = false)
{
    return (new Collection)
            ->when($letters, fn ($c) => $c->merge([
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
                'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
                'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
                'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
                'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            ]))
            ->when($numbers, fn ($c) => $c->merge([
                '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            ]))
            ->when($symbols, fn ($c) => $c->merge([
                '~', '!', '#', '$', '%', '^', '&', '*', '(', ')', '-',
                '_', '.', ',', '<', '>', '?', '/', '\\', '{', '}', '[',
                ']', '|', ':', ';',
            ]))
            ->when($spaces, fn ($c) => $c->merge([' ']))
            ->pipe(fn ($c) => Collection::times($length, fn () => $c[random_int(0, $c->count() - 1)]))
            ->implode('');
}
}

 

