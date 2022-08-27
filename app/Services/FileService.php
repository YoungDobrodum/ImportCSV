<?php

namespace App\Services;

class FileService
{
    public function store($file)
    {
        $data = array_slice($file, 1);
        $fileName = resource_path('templates/' . date('y-m-d-H-i-s') . '.csv');
        file_put_contents($fileName, $data);

        session()->flash('status', 'Importing...');
    }
}
