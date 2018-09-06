@extends('admin.layouts.app')

@section('content')

<div class="container">

  <form class="form-horizontal" action="{{route('admin.company.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.companies.partials.form')
  </form>
</div>
@endsection