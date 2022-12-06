<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
</head>
<body style="background: #f5f5f5;font-family:Arial, Helvetica, sans-serif">
<div style="width: 600px;border: 2px solid #dddddd; padding: 30px;background: #fff;margin: 30px auto;">
    <p>There is your certificate </p>
    <p><b>Name</b>: {{ $data['username'] }}</p>
    <p><b>Course Name</b>: {{ $data['title'] }}</p>
    <p><b>No hours</b>: {{ $data['no_hours'] }}</p>
    <img src="{{$message->embed(public_path().'/storage/imgs/'.$data['image'])}}" alt="image" width="500" height="500">
</div>
</body>
</html>
