<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    function test()
    {
        Mail::to('alt20448@gmail.com')->send(new TestMail());

        return view('test');
    }
}
