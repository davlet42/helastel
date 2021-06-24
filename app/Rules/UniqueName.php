<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Repositories\PersonRepositoryInterface;

class UniqueName implements Rule
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
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        return empty($this->personRepository->getByName($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'The name has already been taken.';
    }
}
