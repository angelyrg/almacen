
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>¡Correcto! </strong> {{ $message }}
    </div>

@elseif($message = Session::get('danger'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>¡Error!</strong> {{ $message }}
    </div>

@endif

