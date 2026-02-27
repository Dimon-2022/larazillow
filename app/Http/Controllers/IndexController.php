<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return inertia('Index/Index');
    }

    public function show() {
        return inertia('Index/Show');
    }

    public function greeting($name){
        $message = "Hello, $name!";
        return inertia('Index/Greeting', ['message' => $message]);
    }
}
