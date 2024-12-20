<?php

use Illuminate\Support\Facades\Route;
use Lightit\Shared\Application\Exceptions\InvalidActionException;

Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));

Route::get('{unknown}', static fn () => view('layouts/app'))->where('unknown', '^(?!api).*$');

