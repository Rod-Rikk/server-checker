<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="col-md-6 offset-3">
        <div class="alert alert-danger">
            Alert!
        </div>

        <p>The {{$server}} Server is {{$status}}</p>


        Thanks for using <br>
        {{ config('app.name') }}

    </div>


</body>
</html>
