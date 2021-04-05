<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;
use Session;
use App;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth','locale']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::paginate(10);
        return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Companies::all();
        return view('admin.employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'company' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email',
      ]);

      $employees = Employees::create([
          'company' => $request->company,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
      ]);

      return redirect()->route('employees.index')->with('success','employees create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees,$id)
    {
        //
      $employee = Employees::find($id);
      return view('admin.employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees,$id)
    {
        //
        $companies = Companies::all();
        $employee = Employees::find($id);
        return view('admin.employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees,$id)
    {
        //
        $validatedData = $request->validate([
          'company' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'email',
        ]);
        
        Employees::find($id)->update([
          'company' => $request->company,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
        ]);
        return redirect()->route('employees.index')->with('success','employees update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees,$id)
    {
        //
        Employees::find($id)->delete();
        return redirect()->route('employees.index')->with('success','employees delted successfully');
    }
}
