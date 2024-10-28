<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .name{
            font-size: 20px;
        }
    </style>
</head>

<body>
    <h4>Message from <span class="name">{{ $fullname }}</span></h4>
    <h4>Email : {{ $email }}</h4>
    <h3>Phone : {{ $phone }}</h3>
    <h4>Message : </h4>
    <p> {{ $letter }} </p>
</body>

</html>
