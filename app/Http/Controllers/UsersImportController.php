<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersImportController extends Controller
{

    public function import()
    {
        return view ('import');
    }

    public function store()
    {
        return view ('result');
    }
}
