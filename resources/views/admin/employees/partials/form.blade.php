@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
@endif

<label for="">Name</label>
<input type="text" class="form-control" name="name" placeholder="User name" value="@if(old('name')){{old('name')}}@else{{$employee->name or ""}}@endif" required>

<label for="">Quota</label>
<input type="email" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$employee->email or ""}}@endif" required>

<label for="">Company</label>
<select class="form-control" name="companies">    
  <option value="0">-- Company --</option>
  @include('admin.employees.partials.companies', ['companies' => $companies])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Save">
