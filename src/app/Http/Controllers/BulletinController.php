<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class BulletinController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $modules = $user->modules;

        return view('bulletin.index', ['modules' => $modules]);
    }
}
