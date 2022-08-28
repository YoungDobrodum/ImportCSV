<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class FileService
{

    /**
     * We remove the line from the file with the header, get the data, get a unique file name
     * @param $file
     * @return void
     */
    public function store($file)
    {
        $data = array_slice($file, 1);
        $fileName = resource_path('templates/' . date('y-m-d-H-i-s') . '.csv');
        file_put_contents($fileName, $data);
    }

    /**
     * We get the resource, find the file path, transfer the file as a closure, iterate as strings, write to the database, then delete the file and temporary files.
     * At the same time, we check for a match and the correctness of the file for recording
     * @return void
     */
    public function importToDb()
    {
        $path = resource_path('templates/*.csv');
        $g = glob($path);
        try{
            DB::beginTransaction();
            foreach (array_slice($g, 0) as $file) {
                $data = array_map('str_getcsv', file($file));

                foreach ($data as $row) {
                    DB::table('Users')->upsert([
                        [
                            'UID' => $row[0],
                            'Name' => $row[1],
                            'Age' => $row[2],
                            'Email' => $row[3],
                            'Phone' => $row[4],
                            'Gender' => $row[5],
                        ]
                    ],
                        [],
                        ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender']
                    );
                }
                unlink($file);
            }
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            abort(400, 'Bad Request Error');
        }
    }
}
