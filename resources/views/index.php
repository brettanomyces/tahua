<html>
<head>
    <title>Transparent</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<body>
    <div id="app">
        <router-view></router-view>
    </div>

    <script>
        <?php
         echo 'window.Laravel = { csrfToken: "' . csrf_token() . '"};'
        ?>
    </script>

    <script src="js/app.js"></script>
</body>
</html>

