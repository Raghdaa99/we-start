<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitation</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5 p-5" style="max-width: 500px">
    <div class="card card-primary">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">
                <ul>

                    <li>{{ Session::get('success') }}</li>

                </ul>
            </div>
        @endif
        <div class="card-header">

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body bg-secondary p-5">
            <form action="{{route('form_register.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-center">
                    <img src="{{asset('logo.png')}}" width="80" height="80">

                </div>
                <div class="form-group mt-3">
                    <label for="user_name" class="text-white">User Name</label>
                    <input type="text" id="user_name" name="user_name" class="form-control">
                </div>
                <input type="hidden" name="slug" value="{{$slug}}">
                <div class="form-group mt-3 ">
                    <label for="user_email" class="text-white">User Email</label>
                    <input type="text" id="user_email" name="user_email" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="user_mobile" class="text-white">User Mobile</label>
                    <input type="text" id="user_mobile" name="user_mobile" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-danger mt-3" value="Save">

                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</body>
</html>
