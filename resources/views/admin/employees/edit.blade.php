@extends('admin.layouts.app')

@section('content')

<div class="container">

  <form class="form-horizontal" action="{{route('admin.employee.update', $employee)}}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.employees.partials.form')
  </form>

</div>
@endsection