<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use Exception;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    /**
     * @var personService
     */
    protected PersonService $personService;

    /**
     *
     * @param PersonService $personService
     *
     */
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->personService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status'], [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  PersonRequest $personRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $personRequest)
    {
        $data = $personRequest->validated();

        $result = [
            'status' => 200,
            'message' => 'Success!'
        ];

        try {
            $result['data'] = $this->personService->savePersonData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errors' => [[$e->getMessage()]]
            ];
        }

        return response()->json($result, $result['status']);
    }
}
