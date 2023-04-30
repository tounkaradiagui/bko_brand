<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Diagui Shop | Aw Bissimilah</title>

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('admin/images/logogolden.png')}}" >

    <style>
        .py-5{
            padding-top:3rem!important;padding-bottom:3rem!important
        }

        .container{
            width:100%;
            padding-right:var(--bs-gutter-x,.75rem);
            padding-left:var(--bs-gutter-x,.75rem);
            margin-right:auto;
            margin-left:auto
        }

        .row{
            --bs-gutter-x:1.5rem;--bs-gutter-y:0;
            display:flex;
            flex-wrap:wrap;
            margin-top:calc(-1 * var(--bs-gutter-y));
            margin-right:calc(-.5 * var(--bs-gutter-x));
            margin-left:calc(-.5 * var(--bs-gutter-x))
        }

        .col-md-12{
            flex:0 0 auto;
            width:100%
        }
        .card{
            position:relative;
            display:flex;
            flex-direction:column;
            min-width:0;word-wrap:break-word;
            background-color:#fff;
            background-clip:border-box;
            border:1px solid rgba(0,0,0,.125);
            border-radius:.25rem
        }

        .bg-primary{
            --bs-bg-opacity:1;background-color:rgba(var(--bs-primary-rgb),var(--bs-bg-opacity))!important
        }

        .shadow{
            box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important
        }

        .card-header{
            margin-bottom:0;
            background-color:rgba(0,0,0,.03);
            border-bottom:1px solid rgba(0,0,0,.125)
        }

        .card-body{
            flex:1 1 auto;padding:1rem 1rem
        }

    </style>

</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <p><h4>Sujet : {{$validatedData['sujet']}}</h4></p>
                        </div>

                        <div class="card-body">
                            <div>
                                <p>Nom : {{$validatedData['nom']}}</p>
                                <p>Prénom : {{$validatedData['prenom']}}</p>
                                <p>Email : {{$validatedData['email']}}</p>
                            </div>

                            <div>
                                <p>Message :
                                    {{$validatedData['message']}}
                                </p>
                            </div>

                        </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>

</body>
</html>
