<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportUserController extends Controller
{
    public function __invoke($userId){
        return 'Hello user: '. $userId;
    }
}
