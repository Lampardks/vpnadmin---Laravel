@for ($i = 0; $i < count($months); $i++)

    <option value="{{$months[$i] or ""}}"
    
    @isset(request()->month)

        @if (request()->month == $months[$i])
            selected="selected"
        @endif
          
    @endisset 

    >

    {{$months[$i] or ""}}
    </option>
    
@endfor