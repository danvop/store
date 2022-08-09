<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SimpleController extends Controller
{
    function __invoke()
    {
        return User::first()->name;
    }
}
