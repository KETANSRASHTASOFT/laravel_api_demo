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
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <ul>
          <li>{!! \Session::get('success') !!}</li>
        </ul>
      </div>
    @endif
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ __('companies.companies_list') }}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="{{ __('companies.collapse') }}">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="{{ __('companies.remove') }}">
            <i class="fas fa-times"></i></button>
          <a href="{{ route('companies.create') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.add_companies') }}">
            <i class="fas fa-plus"></i></button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="table-responsive" id="companiesInfoTable">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>{{ __('companies.id') }}</th>
                  <th>{{ __('companies.name') }}</th>
                  <th>{{ __('companies.logo') }}</th>
                  <th>{{ __('companies.address') }}</th>
                  <th>{{ __('companies.website') }}</th>
                  <th>{{ __('companies.email') }}</th>
                  <th class="text-right">{{ __('companies.action') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?> 
                @foreach($companies as $key => $value)
                  <tr>
                    <th>{{ $no++ }}</th>
                    <th>{{ $value->name }}</th>
                    <th>
                      @if($value->logo == '')
                      @else
                        <img src="{{ $value->logo }}" height="100" width="100"></th>
                      @endif
                      
                    <th>{{ $value->address }}</th>
                    <th>{{ $value->website }}</th>
                    <th>{{ $value->email }}</th>
                    <th class="text-right">
                      <a href="{{ route('companies.show',$value->companies_id) }}">
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.view_companies') }}"><i class="fas fa-eye"></i></button>
                      </a>
                      <a href="{{ route('companies.edit',$value->companies_id) }}">
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.edit_companies') }}"><i class="fas fa-edit"></i></button>
                      </a>
                      <form method="post" action="{{ route('companies.destroy',$value->companies_id) }}" style="display: inline;">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.delete_companies') }}"><i class="fas fa-times"></i></button>
                      </form>
                    </th>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>

              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="float-right">
          {{ $companies->links() }}
        </div>
      </div>
    </div>
    <!-- /.card -->

  </section>
@endsection

  
