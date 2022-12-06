<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
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
            <h3 class="card-title">Create Certificate</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('certificates.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Title Course</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="no_hours">No of Hours</label>
                    <input type="number" id="no_hours" name="no_hours" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control">
                </div>

                <input type="submit" class="btn btn-primary mt-3" value="Save">
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</body>
</html>
