<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Rules\PhoneNumber;
use App\Rules\UniqueName;
use App\Repositories\PersonRepositoryInterface;

class PersonRequest extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'source' => 'required|string|in:db,cache,json,xlsx',
            'name'   => 'required|string',
            'email'  => 'email|nullable',
            'phone'  => ['nullable', new PhoneNumber],
        ];
    }

    public function withValidator(Validator $validator) : void
    {
        $validator->sometimes('name', 'unique:people', function ($input) {
            return $input->source === 'db';
        });

        $validator->sometimes('name', new UniqueName($this->personRepository), function ($input) {
            return in_array($input->source, ['cache', 'json', 'xlsx']);
        });
    }
}
