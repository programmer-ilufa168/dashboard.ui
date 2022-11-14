<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){
        
        return Inertia::render('User/Index' );
    }
    public function data(){
        
        return Inertia::render('User/Data' );
    }
}
