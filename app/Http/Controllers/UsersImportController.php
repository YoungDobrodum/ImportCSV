<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use Illuminate\Http\Request;

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

        $tempFile = fopen($fileName, "r");
        $data = fgetcsv($tempFile, null, ',');
        dd($data);
        return redirect('import');
    }
}
