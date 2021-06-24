<?php

namespace App\Services;

use App\Repositories\PersonRepositoryInterface;

class PersonService
{
    /**
     * @var $personRepository
     */
    protected PersonRepositoryInterface $personRepository;

    /**
     *
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * Get all persons
     *
     * @return array
     */
    public function getAll() : array
    {
        return $this->personRepository->getAll();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function savePersonData(array $data) : bool
    {
        $result = $this->personRepository->save($data);

        return $result;
    }
}
