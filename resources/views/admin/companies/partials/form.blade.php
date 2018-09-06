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
<input type="text" class="form-control" name="name" placeholder="Name company" value="@if(old('name')){{old('name')}}@else{{$company->name or ""}}@endif" required>

<label for="">Quota</label>
<input type="text" class="form-control" name="quota" placeholder="Qouta company, TB" value="@if(old('quota')){{old('quota')}}@else{{$company->quota or ""}}@endif" required>

<hr />

<input class="btn btn-primary" type="submit" value="Save">
