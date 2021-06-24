<?php

namespace App\Repositories;

use App\Repositories\PersonRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class JsonPersonRepository extends BasePersonRepository implements PersonRepositoryInterface
{
    private const PATH = 'public/people.json';

    /**
     * Get all persons
     *
     * @return array
     */
    public function getAll() : array
    {
        return $this->fileExists(self::PATH) ? json_decode(Storage::get(self::PATH), true) : [];
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

        $result = Storage::put(self::PATH, json_encode($persons));

        return $result;
    }
}
