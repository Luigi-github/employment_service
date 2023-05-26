<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = Position::with(['company', 'person'])->get();
        if(!isset($position)){
            return response([
                'message' => 'The positions are not registered.'
            ], Response::HTTP_CONFLICT);
        }

        return response($position, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAvailable(Request $request)
    {
        $data = $request->all();
        $query = Position::with(['company'])->whereAvailable(true);
        if(isset($data['role']) && !empty($data['role'])){
            $query->whereRole($data['role']);
        }
        $positions = $query->get();
        return response($positions, Response::HTTP_OK);
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
            'role' => 'string|required',
            'experience_required' => 'integer|required',
            'salary' => 'regex:/^\d+(\.\d{1,2})?$/|required',
            'available' => 'boolean',
            'company_id' => 'required'
        ]);
        if ($validator->fails()) {
            response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        // Update the number of positions available in the company
        $company = Company::find($data['company_id']);
        $company->positions_available += 1;
        $company->save();

        return response([
            'message' => 'The position has been created.',
            'position' => Position::create($data)
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
        $position = Position::find($id);
        if(!isset($position)){
            return response([
                'message' => 'The position is not registered.'
            ], Response::HTTP_CONFLICT);
        }

        return response($position, Response::HTTP_OK);
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
            'role' => 'string|required',
            'experience_required' => 'integer|required',
            'salary' => 'regex:/^\d+(\.\d{1,2})?$/|required',
            'company_id' => 'required|exists:companies,id'
        ]);
        if ($validator->fails()) {
            response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        // Create position
        $position = Position::find($id);
        $position->fill($data);
        $position->save();

        return response([
            'message' => 'The position has been modified.',
            'position' => $position
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setPerson(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'id' => 'required|exists:positions,id',
            'person_id' => 'required|exists:people,id'
        ]);
        if ($validator->fails()) {
            response($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        // Assign the position to a person and mark as unavailable
        $data['available'] = false;
        $position = Position::find($data['id']);
        $position->fill($data);
        $position->save();

        // Decrease the amount of positions in a company
        $company = Company::find($position->company_id);
        if ($company->positions_available > 0){
            $company->positions_available -= 1;
            $company->save();
        }

        return response([
            'message' => 'The position has been modified.',
            'position' => $position
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
        $position = Position::find($id);
        if(!isset($position)){
            return response([
                'message' => 'The position is not registered.'
            ], Response::HTTP_CONFLICT);
        }
        $position->delete();
        if (!isset($position->person_id)){
            $company = Company::find($position->company_id);
            $company->positions_available -= 1;
            $company->save();
        }

        return response([
            'message' => 'The position has been deleted.'
        ], Response::HTTP_OK);
    }
}
