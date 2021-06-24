<?php

namespace App\Repositories;

use App\Repositories\PersonRepositoryInterface;
use Illuminate\Support\Facades\Storage;

abstract class BasePersonRepository implements PersonRepositoryInterface
{
    /**
     * Get all persons
     *
     * @return array
     */
    abstract public function getAll() : array;

    /**
     * Save person
     *
     * @param array $data
     * @return bool
     */
    abstract public function save(array $data) : bool;

    /**
     * Get person by name
     *
     * @param string $name
     * @return array
     */
    public function getByName(string $name) : array
    {
        $allPersons = $this->getAll();

        $key = array_search($name, array_column($allPersons, 'name'));

        return $key === false ? [] : $allPersons[$key];
    }

    /**
     * Check is file exists
     *
     * @param string $path
     * @return bool
     */
    public function fileExists(string $path) : bool
    {
        return Storage::exists($path);
    }

    /**
     * Push data to array
     *
     * @param array $data
     * @return array $persons
     */
    public function append(array $data) : array
    {
        $persons = $this->getAll();

        $persons[] = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' =>$data['phone']
        ];

        return $persons;
    }
}
