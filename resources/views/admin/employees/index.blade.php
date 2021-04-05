@extends('admin.layout.master')

@section('title')
  employees
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
        <h3 class="card-title">{{ __('employees.employees_list') }}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="{{ __('employees.collapse') }}">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="{{ __('employees.remove') }}">
            <i class="fas fa-times"></i></button>
          <a href="{{ route('employees.create') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.add_employees') }}">
            <i class="fas fa-plus"></i></button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="table-responsive" id="employeesInfoTable">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>{{ __('employees.id') }}</th>
                  <th>{{ __('employees.company') }}</th>
                  <th>{{ __('employees.first_name') }}</th>
                  <th>{{ __('employees.last_name') }}</th>
                  <th>{{ __('employees.email') }}</th>
                  <th>{{ __('employees.phone') }}</th>
                  <th>{{ __('employees.address') }}</th>
                  
                  
                  <th class="text-right">{{ __('employees.action') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?> 
                @foreach($employees as $key => $value)
                  <tr>
                    <th>{{ $no++ }}</th>
                    <th>{{ $value->companies->name }}( {{ $value->company }} )</th>
                    <th>{{ $value->first_name }}</th>
                    <th>{{ $value->last_name }}</th>
                    <th>{{ $value->email }}</th>
                    <th>{{ $value->phone }}</th>
                    <th>{{ $value->address }}</th>
                    <th class="text-right">
                      <a href="{{ route('employees.show',$value->employees_id) }}">
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.view_employees') }}"><i class="fas fa-eye"></i></button>
                      </a>
                      <a href="{{ route('employees.edit',$value->employees_id) }}">
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.edit_employees') }}"><i class="fas fa-edit"></i></button>
                      </a>
                      <form method="post" action="{{ route('employees.destroy',$value->employees_id) }}" style="display: inline;">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-tool" data-toggle="tooltip" title="{{ __('employees.delete_employees') }}"><i class="fas fa-times"></i></button>
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
          {{ $employees->links() }}
        </div>
      </div>
    </div>
    <!-- /.card -->

  </section>
@endsection

  
