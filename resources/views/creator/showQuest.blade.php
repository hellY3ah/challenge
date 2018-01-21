<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <title>Создание</title>
    {{HTML::style('css/UserGeneral/headerNav.css')}}
    <style>
        body{
            background: #f9f9f9 url(../../../public/img/page-bg-1.jpg);
        }
    </style>
</head>
<body>
<header>
    @include('Users.General.headerNav')
</header>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <h2>Вы можете создать квест </h2><br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-1">
                 <a href="{{route('createQuestCreator')}}">{{ Form::button('Создать Квест', array('class' => 'btn btn-lg btn-primary'))}}</a><br><br>

                 <a href="{{route('start')}}">{{ Form::button('Назад', array('class' => 'btn btn-secondary'))}}</a>
        </div>
    </div>
</div>
</body>
</html>
