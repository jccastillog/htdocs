@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert"><strong>{{$message}}</strong></button>

    </div>
@endif

@if($message = Session::get('danger'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert"><strong>{{$message}}</strong></button>

    </div>
@endif
