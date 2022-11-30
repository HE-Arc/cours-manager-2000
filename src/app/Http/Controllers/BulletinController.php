<?php

namespace App\Http\Controllers;

use App\Models\Module;

class BulletinController extends Controller
{
    public function index()
    {
        $modules = Module::all();

        return view('bulletin.index', ['modules' => $modules]);
    }
}
