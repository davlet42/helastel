<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonExport implements FromArray, WithHeadings
{
    /**
     * @var $persons
     */
    protected array $persons;

    /**
     *
     * @param array
     */
    public function __construct(array $data)
    {
        $this->persons = $data;
    }

    public function array(): array
    {
        return $this->persons;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone'
        ];
    }
}
