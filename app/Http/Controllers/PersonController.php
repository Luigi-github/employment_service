<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Person::get();
        if(!isset($person)){
            return response([
                'message' => 'The person is not registered.'
            ], Response::HTTP_CONFLICT);
        }

        return response($person, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'string|required',
            'birth_date' => 'date|required',
            'education_level' => 'string|required',
            'client_recorded_date' => 'date|required',
        ]);
        if ($validator->fails()) {
            response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        return response([
            'message' => 'The person has been created.',
            'person' => Person::create($data)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        if(!isset($person)){
            return response([
                'message' => 'The person is not registered.'
            ], Response::HTTP_CONFLICT);
        }

        return response($person, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'string|required',
            'birth_date' => 'date|required',
            'education_level' => 'string|required',
            'client_recorded_date' => 'date|required',
        ]);
        if ($validator->fails()) {
            response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        // Create person
        $person = Person::find($id);
        $person->fill($data);
        $person->save();

        return response([
            'message' => 'The person has been modified.',
            'person' => $person
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        if(!isset($person)){
            return response([
                'message' => 'The person is not registered.'
            ], Response::HTTP_CONFLICT);
        }
        $person->delete();
        return response([
            'message' => 'The person has been deleted.'
        ], Response::HTTP_OK);
    }
}
