<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'UID',
        'Name',
        'Age',
        'Email',
        'Phone',
        'Gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    /**
     * File type conversion, writing to database, deleting temporary file
     * @return void
     */
    public function importToDb()
    {
        $path = resource_path('templates/*.csv');
        $g = glob($path);

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
    }

}
