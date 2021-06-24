<?php

namespace App\Repositories;

use App\Repositories\PersonRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class CachePersonRepository extends BasePersonRepository implements PersonRepositoryInterface
{
    private const CACHE_KEY = 'people';

    /**
     * Get all persons
     *
     * @return array
     */
    public function getAll() : array
    {
        return json_decode(Cache::store('redis')->get(self::CACHE_KEY), true) ?: [];
    }

    /**
     * Save person
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data) : bool
    {
        $result = Cache::store('redis')->lock(self::CACHE_KEY, 10)->block(5, function () use ($data) {
            $persons = $this->append($data);

            Cache::forget(self::CACHE_KEY);

            return Cache::store('redis')->put(self::CACHE_KEY, json_encode($persons));
        });

        return $result;
    }
}
