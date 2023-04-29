<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact form message</title>
    <style>
        body {float:left;width:100%;background: #ebebeb;font-family: 'Poppins',sans-serif;color:#000;}
        #conti {margin: 30px auto; background: #fff;width:90%; padding:30px;box-sizing: border-box;}
        h1 {font-size: 13px;margin-bottom:8px;}
        p {font-size:12px;}
    </style>
</head>
<body>
    <div id="conti">
        <h1>Website Inquiry from</h1>
        <p><b>Name:</b> {{ $data['name'] }}</p>
        <p><b>Email:</b> {{ $data['email'] }}</p>
        <p><b>Phone:</b> {{ $data['phone'] }}</p>
        <p><b>Message:</b><br>
            {{ $data['message'] }}
        </p>
    </div>
</body>
</html>