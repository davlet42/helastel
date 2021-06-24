<?php

namespace App\Repositories;

use App\Repositories\PersonRepositoryInterface;
use Excel;
use App\Exports\PersonExport;
use App\Imports\PersonImport;

class XlsxPersonRepository extends BasePersonRepository implements PersonRepositoryInterface
{
    private const PATH = 'public/people.xlsx';

    /**
     * Get all persons
     *
     * @return array
     */
    public function getAll() : array
    {
        return $this->fileExists(self::PATH) ? Excel::toArray(new PersonImport, self::PATH)[0] : [];
    }

    /**
     * Save person
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data) : bool
    {
        $persons = $this->append($data);

        $result = Excel::store(new PersonExport($persons), self::PATH);

        return $result;
    }
}
