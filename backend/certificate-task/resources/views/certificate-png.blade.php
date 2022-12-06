<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    {{--    <script src="https://raw.githubusercontent.com/amiad/screenshot.js/master/screenshot.js"></script>--}}

</head>
<body>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/logo.png'))) }}"
             width="100" height="100">
        <br><br>
        <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
        <br><br>
        <span style="font-size:25px"><i>This is to certify that</i></span>
        <br><br>
        <span style="font-size:30px"><b>{{$certificate->username}}</b></span><br/><br/>
        <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
        <span style="font-size:30px">{{$certificate->title}}</span> <br/><br/>
        <span style="font-size:20px">with number of hours <b>{{$certificate->no_hours}}</b></span> <br/><br/><br/><br/>
        <span style="font-size:25px"><i>dated</i></span><br>
        {{$certificate->end_date}}
        <span style="font-size:30px"></span>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script type="text/javascript">
    // $('#capture-screenshot').click(function () {
    const screenshotTarget = document.body;
    html2canvas(screenshotTarget).then(canvas => {
        document.body.appendChild(canvas);
        dataURL = canvas.toDataURL();
        pushScreenshotToServer(dataURL);
    });

    // });

    function pushScreenshotToServer(dataURL) {

        $.ajax({
            url: "{{ route('push.screenshot') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                image: dataURL,
                certificate_id: {{$certificate->id }},
            },
            dataType: "html",
            success: function () {
                console.log('Screenshot pushed to server.');
            }
        });
    }
</script>
</html>


