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

    <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
        <table class="table">
            <tr bgcolor="silver">
                <td>Фото</td>
                <td>Решение</td>
                <td>Действие</td>
            </tr>
            @foreach($photos as $photo)
                <tr>
                    <td>
                        <a href="https://picsum.photos/id/{{ $photo->photo_id }}/600/500" target="_blank">
                            <img src="https://picsum.photos/id/{{ $photo->photo_id }}/600/500" height="50px"/>
                            {{ $photo->photo_id }}
                        </a>
                    </td>
                    <td>
                        @if ($photo->status==0)
                            <div class="alert alert-dark" role="alert">
                                Не решили
                            </div>
                        @endif
                        @if ($photo->status==1)
                            <div class="alert alert-success" role="alert">
                                Принято
                            </div>
                        @endif
                        @if ($photo->status==2)
                            <div class="alert alert-danger" role="alert">
                                Отклонено
                            </div>
                        @endif
                    </td>
                    <td>
                        <button class="btnCancel btn btn-primary" photoid="{{ $photo->photo_id }}" type="button">Отменить решение</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    $(function () {
        $('.btnCancel').on('click', function () {
            var photoId=$(this).attr('photoid');
            $.post("/photo/"+photoId, {status: 0})
            .always(function () {
                window.location='/?token=xyz123';
            });
        });
    });
</script>

</body>
</html>
