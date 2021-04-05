@extends('admin.layout.master')

@section('title')
  Companies
@endsection

@section('page')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('companies.companies_page') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('text.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('companies.companies_page') }}</li>
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
        <h3 class="card-title">{{ __('companies.show_companie') }} : {{ $companie->name }}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="{{ __('companies.collapse') }}">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="{{ __('companies.remove') }}">
            <i class="fas fa-times"></i></button>
          <a href="{{ route('companies.index') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.companies_list') }}">
            <i class="fas fa-eye"></i></button>
          </a>
          <a href="{{ route('companies.create') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.add_companies') }}">
            <i class="fas fa-plus"></i></button>
          </a>
        </div>
      </div>
        <div class="card-body">
          
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('companies.name') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="name" id="name" value="{{ $companie->name }}" readonly placeholder="Compnay Name">
            </div>
          </div>

          @if($companie->logo == '')
          @else
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">{{ __('companies.logo') }}</label>
              <div class="col-sm-6">  
                <img src="{{ $companie->logo }}" height="100" width="100"></th>
              </div>
            </div>
          @endif

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">{{ __('companies.email') }}</label>
            <div class="col-sm-6">  
              <input type="email" class="form-control" name="email" id="email" placeholder="Compnay Name" readonly value="{{ $companie->email }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">{{ __('companies.website') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="website" readonly id="website" placeholder="Compnay website" value="{{ $companie->website }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">{{ __('companies.address') }}</label>
            <div class="col-sm-6">  
              <textarea class="form-control" name="address" readonly id="address" placeholder="Compnay Address">{{ $companie->address }}</textarea>
              <!-- <input type="text" name="website" id="website" placeholder="Compnay Name"> -->
            </div>
          </div>
                
        </div>
        <div class="card-footer">
          <a href="{{ route('companies.index') }}"><button type="button" class="btn btn-default ">{{ __('companies.cancel') }}</button></a>
          
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

  
