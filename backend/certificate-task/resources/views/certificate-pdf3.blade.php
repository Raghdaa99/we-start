<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/logo.png'))) }}" width="100" height="100">
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

