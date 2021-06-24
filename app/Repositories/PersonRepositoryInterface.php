<?php

namespace App\Repositories;

/**
* Interface PersonRepositoryInterface
* @package App\Repositories
*/
interface PersonRepositoryInterface
{
    public function getAll() : array;

    public function getByName(string $name): array;

    public function save(array $data): bool;
}
