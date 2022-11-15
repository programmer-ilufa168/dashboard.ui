<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index() {
        $users = User::with('roles')->get();
        return Inertia::render('User/Index', [
            'users' => $users
            ]);
    }
    public function data(){
        
        return Inertia::render('User/Data' );
    }
}
