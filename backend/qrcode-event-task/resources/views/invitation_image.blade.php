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
    <script src="https://raw.githubusercontent.com/amiad/screenshot.js/master/screenshot.js"></script>
</head>

<body>
<div class="container mt-5" style="max-width: 800px">
    <button id="download-page-as-image" class="btn btn-success">Download as Image</button>

    <div class="card card-primary capture">
        <div class="card-header bg-secondary d-flex justify-content-center">
            <h3 class="card-title text-white ">Invitation</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="mt-5">
                       <h4> {{$invitation->conference_name}} </h4>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {!! $invitation->desc !!}
                    </div>

                    <hr>
                    <div class="mt-2 fw-bold">
                        * Please register by via QR Code
                    </div>
                    <div class="mt-2">
                        {{QrCode::generate(route('form_register',$invitation->slug))}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="mt-2 fw-bold">
                        <h3>Official Sponsor</h3>
                    </div>
                    @foreach($invitation->images as $image)
                        <img src="{{asset('storage/'.$image->path)}}" width="80" height="80" class="mt-3">
                    @endforeach

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</body>
<script type="text/javascript"
        src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script type="text/javascript">
    setUpDownloadPageAsImage();

    function setUpDownloadPageAsImage() {
        document.getElementById("download-page-as-image").addEventListener("click", function () {
            const elementToSave = document.querySelector(".capture");
            html2canvas(elementToSave).then(canvas => {
                const a = document.createElement("a");
                a.href = canvas.toDataURL("image/jpeg");
                a.download = "image.jpeg";
                a.click();
            });
        });
    }
</script>
</html>
