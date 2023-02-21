<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username' => $row[0],
            'first_name' => $row[0],
            'email' => $row[1],
            'userid' => $row[2],
            'password' => bcrypt($row[2]),
            'role' => 'employee',
            'status' => 1,
        ]);
    }
}
