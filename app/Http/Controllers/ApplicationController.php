<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ApplicationController extends Controller
{
    public function index(){

        return Inertia::render('Application/List' );
    }
    
}