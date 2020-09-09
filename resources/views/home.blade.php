@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of videos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>File Name</th>
                            <th>Url</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                          <tr>
                            <td>{{$file->name}}</td>
                            <td><a href="{{$file->url}}" target="blank">View File</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
