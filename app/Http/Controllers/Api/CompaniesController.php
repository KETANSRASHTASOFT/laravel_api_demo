<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Companies;
use App\Models\FileUpload;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Companies::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        echo "create";
        exit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'email',
        // ]);

        // $this->validator(['name' => 'required','email' => 'email'])->validate();


        $logo = FileUpload::photo($request,'photo','logo',null);
        $companies = Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logo,
            'website' => $request->website,
            'address' => $request->address,
        ]);
        // return Companies::create($request->all());
        //
        return $companies;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return Companies::find($id);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        // $validatedData = $request->validate([
        //   'name' => 'required',
        //   'email' => 'email',
        // ]);
        

        $companies = Companies::findOrFail($id);

        $companies->update([
          'name' => $request->name,
          'email' => $request->email,
          'website' => $request->website,
          'address' => $request->address,
        ]);

        if($request->logo != ''){
            $logo = FileUpload::photo($request,'photo','logo',null);
            $companies->update([
              'logo' => $logo,
            ]);
        }

        // $companies = Companies::findOrFail($id);
        // $Companies->update($request->all());

        return $companies;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $companies = Companies::findOrFail($id);
        $companies->delete();
        return $companies;
        //
    }
}
