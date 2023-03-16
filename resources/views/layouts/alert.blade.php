@if (Session::has('success'))
<div class="alert alert-success alert-dismiss" role="alert">
    <button class="close" type="button" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong >Félicitation ! </strong>

    {{session('success')}}
</div>

@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismiss" role="alert">
    <button class="close" type="button" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong >Erreur ! </strong>

    {{session('error')}}
</div>

@endif
