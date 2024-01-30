<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        return User::query()->find(2);
    }
}
