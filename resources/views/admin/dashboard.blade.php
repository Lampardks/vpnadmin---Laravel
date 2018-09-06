@extends('admin.layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="jumbotron">
          <p><span class="label label-primary">Companies {{$count_companies}}</span></p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="jumbotron">
          <p><span class="label label-primary">Users {{$count_employees}}</span></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <a href="{{route('admin.company.create')}}" class="btn btn-block btn-default">Add company</a>
      </div>
      <div class="col-sm-6">
        <a href="{{route('admin.employee.create')}}" class="btn btn-block btn-default">Add user</a>
      </div>
    </div>      
  </div>
@endsection