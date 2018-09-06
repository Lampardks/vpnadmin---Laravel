@extends('admin.layouts.app')

@section('content')

<div class="container">

  <a href="{{route('admin.employee.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Add user</a>
  <table class="table table-striped">
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th>Company</th>
      <th class="text-right">Action</th>
    </thead>
    <tbody>
      @forelse ($employees as $employee)
        <tr>
          <td>{{$employee->name}}</td>
          <td>{{$employee->email}}</td>
          <td>
            @foreach ($companies as $company)
                @if ($employee->company_id == $company->id)
                  {{$company->name}}
                @endif
            @endforeach
          </td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.employee.destroy', $employee)}}" method="post">
            
              {{ method_field('DELETE') }}
              {{ csrf_field() }}

              <a href="{{route('admin.employee.edit', $employee)}}"><i class="fa fa-edit"></i></a>

              <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
            </form>            
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center"><h2>No users</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">
          <ul class="pagination pull-right">
            {{$employees->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection