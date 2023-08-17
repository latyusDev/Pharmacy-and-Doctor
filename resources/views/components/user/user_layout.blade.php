<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor</title>

</head>
<body>
    
<x-user.user_header/>
{{$slot}}
<x-user.user_footer/>

</body>

@stack('search')
</html>