<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\PersonRepositoryInterface;

class DbPersonRepository extends BasePersonRepository implements PersonRepositoryInterface
{
    /**
     * @var $person
     */
    protected Person $person;

    /**
     *
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * Get all persons
     *
     * @return array
     */
    public function getAll() : array
    {
        return $this->person->get()->toArray();
    }

    /**
     * Get person by name
     *
     * @param string $name
     * @return array
     */
    public function getByName(string $name) : array
    {
        return $this->post->where('name', $name)->get()->toArray();
    }

    /**
     * Save person
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data) : bool
    {
        $person = new $this->person;

        $person->name = $data['name'];
        $person->email = $data['email'];
        $person->phone = $data['phone'];

        return $person->save();
    }
}
