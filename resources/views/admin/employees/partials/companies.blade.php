@foreach ($companies as $company)

  <option value="{{$company->id or ""}}"
 
    @isset($employee->company_id)

        @if ($employee->company_id == $company->id)
            selected="selected"
        @endif
          
    @endisset 

    >
  
    {{$company->name or ""}}
  </option>

@endforeach