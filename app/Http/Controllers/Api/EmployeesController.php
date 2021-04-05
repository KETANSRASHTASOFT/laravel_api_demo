<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employees::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'company' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'email',
        // ]);

        $employees = Employees::create([
          'company' => $request->company,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
        ]);

        return $employees;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employees::find($id);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $validatedData = $request->validate([
        //   'company' => 'required',
        //   'first_name' => 'required',
        //   'last_name' => 'required',
        //   'email' => 'email',
        // ]);

    
        $employees = Employees::findOrFail($id);
        $employees->update([
          'company' => $request->company,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
        ]);

        return $employees;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();
        return $employees;
        //
    }
}
