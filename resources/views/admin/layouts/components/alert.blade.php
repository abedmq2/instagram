@if(session()->has('msg'))
    <div class="alert alert-success">
        {{session()->get('msg')}}
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="width: 100%;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
