@extends('admin.layout.master')

@section('title')
  Companies
@endsection

@section('css')
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <table id="tblCompaniesInfo" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>{{ __('companies.name') }}</th>
                  <th>{{ __('companies.logo') }}</th>
                  <th>{{ __('companies.address') }}</th>
                  <th>{{ __('companies.website') }}</th>
                  <th>{{ __('companies.email') }}</th>
                  <th class="text-right">{{ __('companies.action') }}</th>
                </tr>
              </thead>
              <tbody>
                
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
        </div>
      </div>
    </div>
    <!-- /.card -->

  </section>
@endsection

@section('script')
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
     $(function () {
    
      $('#tblCompaniesInfo').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('useDataTables') }}",
        columns: [
            {data: 'name', name: 'name'},
            {
              data: 'logo',
              name: 'logo',
              orderable: false, 
              searchable: true,
              render: function(data, type, row) {
                    return '<img src="'+data+'" height="50" width="50"/>';
                }
             },
            {data: 'email', name: 'email'},
            
            {data: 'address', name: 'address'},
            {data: 'email', name: 'email'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: true
            },
        ]
    });
    
  });
  </script>
@endsection

  
