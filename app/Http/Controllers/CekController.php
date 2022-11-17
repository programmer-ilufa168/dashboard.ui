<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Auth\AuthenticationException;
class CekController extends Controller
{
    public function index (Request $request) {

        if(Auth::user()->hasRole('admin')) {
            return redirect()->route('/dashboard');
        } else if (Auth::user()->hasRole('super admin')) {
            return redirect()->route('/super-admin');
        } else if (Auth::user()->hasRole('guest')){
            return redirect()->route('guest');
        }
    }
}
