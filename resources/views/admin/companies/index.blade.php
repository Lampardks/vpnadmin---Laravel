@extends('admin.layouts.app')

@section('content')

<div class="container">

  <a href="{{route('admin.company.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Add company</a>
  <table class="table table-striped">
    <thead>
      <th>Company</th>
      <th>Qouta</th>
      <th class="text-right">Action</th>
    </thead>
    <tbody>
        @forelse ($companies as $company)
        <tr>
          <td>{{$company->name}}</td>
          <td>{{$company->quota}}</td>
          <td class="text-right">
            <form id="create-company" onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.company.destroy', $company)}}" method="post">
            
              {{ method_field('DELETE') }}
              {{ csrf_field() }}

              <a href="{{route('admin.company.edit', $company)}}"><i class="fa fa-edit"></i></a>

              <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
            </form>            
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="text-center"><h2>No companies</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <ul class="pagination pull-right">
            {{$companies->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection