<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'Name' => $row['Name'],
            'Age' => $row['Age'],
            'Email' => $row['Email'],
            'Phone' => $row['Phone'],
            'Gender' => $row['Gender'],

        ]);
    }
}
