@if($errors->any())
<div class="alert alert-danger my-0 py-0">
    <h6>Por favor, corrige los errores</h6>
        @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </div>
@endif
@if(session()->has('message'))
    <div class="alert colorfondo my-0 py-0" >
        {{ session()->get('message') }}
    </div>
@endif
