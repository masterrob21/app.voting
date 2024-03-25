<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SystemAccountController extends Controller
{
    public function checkSystemAccount(): View
    {
        return view('message.index');
    }
}