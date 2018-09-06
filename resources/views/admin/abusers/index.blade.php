@extends('admin.layouts.app')

@section('content')

<div class="container">

  <div class="line-filter">
    <form class="form-horizontal show-report-form col-sm-10" action="/admin/abusers">
  
      {{-- Form include --}}
      @include('admin.abusers.partials.form')
    </form>
    <a href="{{route('admin.transferlog.create')}}" class="btn btn-primary pull-right">
      <i class="fa fa-plus-square-o"></i> Generate data
    </a>
  </div>  
  <table class="table table-striped">
    <thead>
      <th>Company</th>
      <th>Used</th>
      <th>Qouta</th>
    </thead>
    <tbody>
      @forelse ($sum as $item)
        @foreach ($companies as $company)          
          @if ($company->id == $item['id'] && $item['sum'] >= $company->quota)
            <tr>
              <td>{{$company->name}}</td>
              <td>{{$item['sum']}}</td>
              <td>{{$company->quota}}</td>
            </tr>
          @endif 
        @endforeach 
      @empty
        <tr>
          <td colspan="3" class="text-center"><h2>No abusers</h2></td>
        </tr>
      @endforelse   
      @if ($sum !== Array()) 
        @foreach ($sum as $item)
          @foreach ($companies as $company)          
            @if ($company->id == $item['id'] && $item['sum'] < $company->quota)
              <tr>
                <td colspan="3" class="text-left">
                  {{$company->name}} fits into their limit ({{$company->quota}}), so it's not in the list.
                </td>
              </tr>
            @endif 
          @endforeach 
        @endforeach
      @endif   
    </tbody>
  </table>
</div>
@endsection