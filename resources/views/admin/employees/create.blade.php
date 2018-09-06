@extends('admin.layouts.app')

@section('content')

<div class="container">

  <form class="form-horizontal" action="{{route('admin.employee.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.employees.partials.form')
  </form>

</div>
@endsection