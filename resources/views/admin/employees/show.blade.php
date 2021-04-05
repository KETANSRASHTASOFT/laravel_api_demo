@extends('admin.layout.master')

@section('title')
  Employees
@endsection

@section('page')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('employees.employees_page') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('text.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('employees.employees_page') }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ __('employees.show_employee') }} : {{ $employee->first_name }} {{ $employee->last_name }}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="{{ __('employees.collapse') }}">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="{{ __('employees.remove') }}">
            <i class="fas fa-times"></i></button>
          <a href="{{ route('employees.index') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.employees_list') }}">
            <i class="fas fa-eye"></i></button>
          </a>
          <a href="{{ route('employees.create') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.add_employees') }}">
            <i class="fas fa-plus"></i></button>
          </a>
        </div>
      </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('employees.company') }}</label>
            <div class="col-sm-6">  
             <label for="name" class="col-sm-2 col-form-label">{{ $employee->companies->name }}</label>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('employees.first_name') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="name" id="name" value="{{ $employee->first_name }}" readonly placeholder="Compnay Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('employees.last_name') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="name" id="name" value="{{ $employee->first_name }}" readonly placeholder="Compnay Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">{{ __('employees.email') }}</label>
            <div class="col-sm-6">  
              <input type="email" class="form-control" name="email" id="email" placeholder="Compnay Name" readonly value="{{ $employee->email }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">{{ __('employees.phone') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="website" readonly id="website" placeholder="Compnay website" value="{{ $employee->phone }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">{{ __('employees.address') }}</label>
            <div class="col-sm-6">  
              <textarea class="form-control" name="address" readonly id="address" placeholder="Compnay Address">{{ $employee->address }}</textarea>
              <!-- <input type="text" name="website" id="website" placeholder="Compnay Name"> -->
            </div>
          </div>
                
        </div>
        <div class="card-footer">
          <a href="{{ route('employees.index') }}"><button type="button" class="btn btn-default ">{{ __('employees.cancel') }}</button></a>
          
        </div>
      </form>
      <!-- /.card-body -->
      <!-- <div class="card-footer">
        Footer
      </div> -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection

  
