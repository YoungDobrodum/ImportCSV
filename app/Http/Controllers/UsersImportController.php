<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersImportController extends Controller
{

    public function import()
    {
        return view('import');
    }

    public function store(ImportFileRequest $request)
    {
        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1);
        $fileName = resource_path('templates/' . date('y-m-d-H-i-s') . '.csv');
        file_put_contents($fileName, $data);

        session()->flash('status', 'Importing...');

        (new User)->importToDb();
        return redirect('import');
    }


}
