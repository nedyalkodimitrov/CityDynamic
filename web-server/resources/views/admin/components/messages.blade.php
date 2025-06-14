@if($errors->any())
    <div class="alert alert-danger mt-2">
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
