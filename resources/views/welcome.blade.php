<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/app.css" rel="stylesheet">
    <title>Task</title>
</head>
<body>
    <main role="main" class="container">
        <div class="starter-template">
            <div id="mute"></div>
            <div id="app"></div>
        </div>
    </main>
    <script src="js/app.js"></script>
</body>
</html>
