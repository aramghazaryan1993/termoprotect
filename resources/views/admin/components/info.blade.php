@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6><i class="icon fas fa-check"></i> Success!</h6>
        {{ Session::get('message') }}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success.alert-dismissible').fadeOut()
        }, 2000);
    </script>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6><i class="icon fas fa-ban"></i> Error!</h6>
        <p>{{ Session::get('error') }}</p>
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-danger.alert-dismissible').fadeOut()
        }, 2000);
    </script>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6><i class="icon fas fa-ban"></i> Error!</h6>
        <p>{!! implode('', $errors->all('<div>:message</div>')) !!}</p>
    </div>
@endif
