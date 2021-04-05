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
        <h3 class="card-title">{{ __('companies.companie_create') }}</h3>
        
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="{{ __('companies.collapse') }}">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="{{ __('companies.remove') }}">
            <i class="fas fa-times"></i></button>
          <a href="{{ route('companies.index') }}">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="{{ __('companies.companies_list') }}">
            <i class="fas fa-eye"></i></button>
          </a>
        </div>
      </div>
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('companies.store') }}">
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
            <label for="name" class="col-sm-2 col-form-label">{{ __('companies.name') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Compnay Name">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">{{ __('companies.email') }}</label>
            <div class="col-sm-6">  
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Compnay Name" value="{{ old('email') }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="logo" class="col-sm-2 col-form-label">{{ __('companies.upload_logo') }}</label>
            <div class="col-sm-6">  
              <img src="https://via.placeholder.com/100" id="selectLogo" style="cursor: pointer;">
              <input type="file" id="logo" name="logo" style="display: none">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-8">
              <label for="logo" class="col-sm-2 col-form-label">{{ __('companies.upload_logo') }}</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">{{ __('companies.website') }}</label>
            <div class="col-sm-6">  
              <input type="text" class="form-control" name="website" id="website" placeholder="Compnay website" value="{{ old('website') }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">{{ __('companies.address') }}</label>
            <div class="col-sm-6">  
              <textarea class="form-control" name="address" id="address" placeholder="Compnay Address">{{ old('address') }}</textarea>
              <!-- <input type="text" name="website" id="website" placeholder="Compnay Name"> -->
            </div>
          </div>
                
        </div>
        <div class="card-footer">
          <a href="{{ route('companies.index') }}"><button type="button" class="btn btn-default ">{{ __('companies.cancel') }}</button></a>
          <button type="submit" class="btn btn-info float-right ml-4">{{ __('companies.save') }}</button>
          <button type="reset" id="clear" class="btn btn-info float-right">{{ __('companies.clear') }}</button>
          
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
@section('script')
<script type="text/javascript">
  $(document).on("click","#selectLogo",function(e){
    $('#logo').click();
  });

  $(document).on("click","#clear",function(e){
    $('#selectLogo').attr('src','https://via.placeholder.com/100');
  });

  $(document).on("change","#logo",function(e){
    var photoFile = this.files[0];
    var type = photoFile.type;;
    if(type=='image/jpeg' || type=='image/jpg'){
        var reader = new FileReader();
        reader.onload = function(e){
            var target =   $('#selectLogo');
            target.attr('src', e.target.result);
            target.attr('width', '100px');
            target.show();
        };
        reader.readAsDataURL(this.files[0]);
    } else{
          alert('Invalid file type. Only jpg and jpeg are allowed.');
          $(this).val('');
          $('#selectLogo').attr('src','https://via.placeholder.com/100');
    }
        
  });
</script>
@endsection

  
