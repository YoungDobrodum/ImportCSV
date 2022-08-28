<?php

namespace App\Http\Controllers\Import;

use App\Http\Requests\ImportFileRequest;
use App\Models\User;
use function redirect;
use function view;

class UsersImportController extends BaseController
{

    public function index()
    {
        return view('import');
    }

    public function store(ImportFileRequest $request)
    {
        $file = file($request->file->getRealPath());
        $this->service->store($file);
        $this->service->importToDb();
        return redirect('import')->with('success','Success');
    }

    public function show()
    {
        $data = User::all();
        return view('result', compact('data'));
    }

    public function destroy()
    {
        User::getQuery()->delete();
        return redirect()->route('import');
    }
}
