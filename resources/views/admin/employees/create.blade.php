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
        <h3 class="card-title">{{ __('employees.employee_create') }}</h3>
        
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="{{ __('employees.collapse') }}">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="{{ __('employees.remove') }}">
            <i class="fas fa-times"></i></button>
          <a href="{{ route('employees.index') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.employees_list') }}">
            <i class="fas fa-eye"></i></button>
          </a>
        </div>
      </div>
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('employees.store') }}">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          {{ csrf_field() }}
          <div class="form-group row">
            <label for="company" class="col-sm-2 col-form-label">{{ __('employees.select_company') }}</label>
            <div class="col-sm-6">  
              <!-- <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" id="company" value="{{ old('company') }}" required placeholder="First Name"> -->
              <select type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror">
                <option value="">{{ __('employees.select_company') }}</option>
                @foreach($companies as $key => $value)
                  <option value="{{ $value->companies_id }}">{{ $value->name }}</option>
                @endforeach
              </select>
              @error('company')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label">{{ __('employees.first_name') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}"  placeholder="{{ __('employees.first_name') }}">
              @error('first_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="last_name" class="col-sm-2 col-form-label">{{ __('employees.last_name') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}"  placeholder="{{ __('employees.last_name') }}">
              @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">{{ __('employees.email') }}</label>
            <div class="col-sm-6">  
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="{{ __('employees.email') }}" value="{{ old('email') }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">{{ __('employees.phone') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('employees.phone') }}" value="{{ old('phone') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">{{ __('companies.address') }}</label>
            <div class="col-sm-6">  
              <textarea class="form-control" name="address" id="address" placeholder="{{ __('companies.address') }}">{{ old('address') }}</textarea>
            </div>
          </div>
                
        </div>
        <div class="card-footer">
          <a href="{{ route('employees.index') }}"><button type="button" class="btn btn-default ">{{ __('employees.cancel') }}</button></a>
          <button type="submit" class="btn btn-info float-right ml-4">{{ __('employees.save') }}</button>
          <button type="reset" class="btn btn-info float-right">{{ __('employees.clear') }}</button>
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

  
