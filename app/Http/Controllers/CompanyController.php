<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::get();
        if(!isset($company)){
            return response([
                'message' => 'The company is not registered.'
            ], Response::HTTP_CONFLICT);
        }

        return response($company, Response::HTTP_OK);
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
            'message' => 'The company has been created.',
            'company' => Company::create($data)
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
        $company = Company::find($id);
        if(!isset($company)){
            return response([
                'message' => 'The company is not registered.'
            ], Response::HTTP_CONFLICT);
        }

        return response($company, Response::HTTP_OK);
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

        // Create company
        $company = Company::find($id);
        $company->fill($data);
        $company->save();

        return response([
            'message' => 'The company has been modified.',
            'company' => $company
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
        $company = Company::find($id);
        if(!isset($company)){
            return response([
                'message' => 'The company is not registered.'
            ], Response::HTTP_CONFLICT);
        }
        $company->delete();
        return response([
            'message' => 'The company has been deleted.'
        ], Response::HTTP_OK);
    }
}
