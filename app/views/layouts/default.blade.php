<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto|Josefin+Sans|Work+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/main.css">
    <title>Larabook</title>
</head>
<body>
@include('layouts.partials.nav')

<div class="container">
    @include('flash::message')

    @yield('content')
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script>
    $('#flash-overlay-modal').modal();

    $('.comments__create-form').on('keydown', function(e){
        if (e.keyCode == 13){
            e.preventDefault();
            $(this).submit();
        }
    });

</script>
</body>
</html>
 