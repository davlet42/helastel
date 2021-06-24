<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonImport implements ToArray, WithHeadingRow
{
    /**
    * @param array
    */
    public function array(array $data)
    {
        //
    }
}
