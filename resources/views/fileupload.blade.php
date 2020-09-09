@extends('layouts.app')

@section('content')
  <div class="container">
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if (\Session::has('error'))
      <div class="alert alert-danger">
        <p>{{ \Session::get('error') }}</p>
      </div><br />
     @endif
      <form method="post" action="{{url('fileupload')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="file" name="image">    
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Upload</button>
          </div>
        </div>
      </form>
    </div>
@endsection  
