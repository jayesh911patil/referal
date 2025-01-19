<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}} </title>
</head>
<body>
    
<p>Hii {{$data['name']}}, Welcome to referral system</p>
<p><b>Username</b>{{$data['email']}}</p>
<p><b>Password</b>{{$data['password']}}</p>
<p>You can ass user to your network by share your <a href="{{$data['url']}}">Referral link</a></p>

<p>Thank you!</p>
</body>
</html>