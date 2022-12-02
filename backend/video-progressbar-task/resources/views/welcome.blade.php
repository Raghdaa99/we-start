<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5" style="max-width:500px">
    <div class="alert alert-success mb-4 text-center" style="display: none;" id="success-msg" role="alert">
        <h2 class="display-6">File has uploaded</h2>
    </div>
    <div class="alert alert-danger mb-4 text-center" style="display: none;" id="error-msg" role="alert">
    </div>
    <form id="form" method="POST" action="{{ route('video.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="title" placeholder="Enter the title" class="form-control">
        </div>
        <div class="form-group mb-3">
            <input name="file" type="file" class="form-control">
        </div>

        <div class="form-group">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span id="percent">0%</span>
                </div>

            </div>
        </div>
        <div class="d-grid mt-4">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    @forelse($videos as $video)
        <video width="320" height="240" controls>
            <source src="{{asset('uploads/'.$video->url)}}" type="video/mp4">
        </video>
    @empty
        <h3> No videos </h3>
    @endforelse

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
    $(function () {
        $(document).ready(function () {
            let percent = $('#percent');
            $('#form').ajaxForm({
                beforeSend: function () {
                    let percentage = '0';
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    let percentage = percentComplete;
                    percent.html(percentage + '%');
                    $('.progress .progress-bar').css("width", percentage + '%', function () {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })
                },
                success: function (xhr) {
                    $("#error-msg").css('display', 'none');
                    $("#success-msg").css('display', 'block');
                },
                error: function (response) {
                    $("#error-msg").css('display', 'block');
                    $('#error-msg').text(response.responseJSON.errors.title ?? '' + "\n" + response.responseJSON.errors.file ?? '');
                }
            });
        });
    });
</script>
</body>
</html>
