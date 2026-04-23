<!DOCTYPE html>
<html>
<head>
    <title>Night Stamp Hesabini Etkinlestir</title>
</head>
<body>
<h2>Night Stamp'e hos geldin, {{$user['name']}}</h2>
<p>Kayitli e-posta adresin: {{$user['email']}}</p>
<p>Hesabini etkinlestirmek icin asagidaki baglantiya tikla:</p>
<p><a href="{{url('/user/verify', $token)}}">Hesabi Etkinlestir</a></p>
</body>
</html>
