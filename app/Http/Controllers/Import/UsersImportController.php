<?php

namespace App\Http\Controllers\Import;

use App\Http\Requests\ImportFileRequest;
use App\Models\User;
use function redirect;
use function view;

class UsersImportController extends BaseController
{

    public function import()
    {
        return view('import');
    }

    public function store(ImportFileRequest $request)
    {
        $file = file($request->file->getRealPath());
        $this->service->store($file);
        (new User)->importToDb();
        return redirect('import');
    }


}
