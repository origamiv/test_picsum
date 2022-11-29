<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body class="antialiased">


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <img src="https://picsum.photos/id/{{ $photoId }}/600/500"/>
        </div>
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-1">
            <button id="btnSuccess" type="button" class="btn btn-success">Принять</button>
        </div>
        <div class="col-1">
            <button id="btnDecline" type="button" class="btn btn-danger">Отклонить</button>
        </div>
        <div class="col-5"></div>
    </div>
</div>

<script>
    $(function () {
        $('#btnSuccess').on('click', function () {
            $.post("/photo/{{ $photoId }}", {status: 1})
                .always(function () {
                    window.location='/';
                });
        });
        $('#btnDecline').on('click', function () {
            $.post("/photo/{{ $photoId }}", {status: 2})
                .always(function () {
                    window.location='/';
                });
        });
    });
</script>

</body>
</html>
