<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    private $names = [
        1 => ['name' => 'John', 'age' => 25],
        2 => ['name' => 'Jane', 'age' => 30],
        3 => ['name' => 'Bob', 'age' => 35],
        4 => ['name' => 'Alice', 'age' => 40],
    ];

    public function getAll()
    {
        return response()->json($this->names);
    }

    public function get(int $id = 0)
    {
        if (isset($this->names[$id])) {
            return response()->json($this->names[$id]);
        } else {
            return response()->json(['error' => 'No such id!'], Response::HTTP_NOT_FOUND);
        }
    }

    public function create(Request $request)
    {
        $person = [
            "id" => count($this->names) + 1,
            "name" => $request->input("name"),
            "age" => $request->input("age"),
        ];

        $this->names[$person["id"]] = $person;
        return response()->json([
            'message' => 'Person added successfully!',
            'person' => $person,
        ], Response::HTTP_CREATED);
    }
}
