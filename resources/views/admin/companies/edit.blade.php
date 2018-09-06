@extends('admin.layouts.app')

@section('content')

<div class="container">

  <form class="form-horizontal" action="{{route('admin.company.update', $company)}}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.companies.partials.form')
  </form>

</div>
@endsection