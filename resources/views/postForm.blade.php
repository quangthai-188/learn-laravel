<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>postForm</title>
</head>
<body>
    <form action="{{route('postForm')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="text" name="HoTen">
        <input type="submit">
    </form>
</body>
</html>