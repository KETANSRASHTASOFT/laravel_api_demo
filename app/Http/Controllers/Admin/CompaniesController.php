<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Session;
use App;
use Mail;
use App\Mail\MailTrap;
use DataTables;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth','locale']);
        // session_start();
        // if(isset($_SESSION['locale'])){
        //   app()->setLocale($_SESSION['locale']); 
        // }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies = Companies::orderBy('companies_id','desc')->paginate(10);
        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.companies.create');
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
        'name' => 'required',
        'email' => 'email',
      ]);

      $logo = FileUpload::photo($request,'photo','logo',null);
      $companies = Companies::create([
          'name' => $request->name,
          'email' => $request->email,
          'logo' => $logo,
          'website' => $request->website,
          'address' => $request->address,
      ]);
      Mail::to('ketandalsaniya05@gmail.com','KetAnk')->send(new MailTrap());

      return redirect()->route('companies.index')->with('success','companies create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies,$id)
    {
        $companie = Companies::find($id);
        return view('admin.companies.show',compact('companie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies,$id)
    {
        //
        $companie = Companies::find($id);
        return view('admin.companies.edit',compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies,$id)
    {
        $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'email',
        ]);
        
        
        Companies::find($id)->update([
          'name' => $request->name,
          'email' => $request->email,
          'website' => $request->website,
          'address' => $request->address,
        ]);

        if($request->logo != ''){
            $logo = FileUpload::photo($request,'photo','logo',null);
            Companies::find($id)->update([
              'logo' => $logo,
            ]);
        }

        
        return redirect()->route('companies.index')->with('success','companies update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies,$id)
    {
        Companies::find($id)->delete();
        return redirect()->route('companies.index')->with('success','companies delted successfully');
    }


    /**
     * Display a listing of the companies using datatables.
     *
     * @return \Illuminate\Http\Response
     */
    public function useDataTables(Request $request)
    {
        if ($request->ajax()) {
            $data = Companies::latest()->get();
            $table = DataTables()->of($data);
            $table->addColumn('action',function($data){
                $html = '<a href="'.route('companies.show',$data->companies_id).'">
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="'.__('companies.view_companies').'"><i class="fas fa-eye"></i></button>
                  </a>';
                $html .= '<a href="'. route('companies.edit',$data->companies_id).'">
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="'. __('companies.edit_companies') .'"><i class="fas fa-edit"></i></button>
                  </a>';
                $html .= '<form method="post" action="'. route('companies.destroy',$data->companies_id) .'" style="display: inline;">
                    '.csrf_field().'
                    '. method_field('DELETE') .'
                    <button type="submit" class="btn btn-tool" data-toggle="tooltip" title="'. __('companies.delete_companies') .'"><i class="fas fa-times"></i></button>
                  </form>';
                  return $html;
            });
            $table->rawColumns(['action']);

            return $table->make(true);
        }
        return view('admin.companies.datatables');
    }
    
}
