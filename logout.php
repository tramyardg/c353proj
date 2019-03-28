<?php
$commonNameTitle = parse_ini_file("./common.ini");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/bootstrap-flatly.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <title>Home</title>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#"><?php echo $commonNameTitle['siteName']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav my-2 my-md-0">
                <li class="dropdown">
                    <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Hello, Sign in</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item btn-success" href="#"><i class="mr-2" data-feather="user-check"></i>Your
                            account</a>
                        <a class="dropdown-item" href="#"><i class="mr-2" data-feather="shopping-cart"></i>Cart</a>
                        <a class="dropdown-item" href="login.php"><i class="mr-2" data-feather="log-in"></i>Log in</a>
                        <a class="dropdown-item" href="logout.php"><i class="mr-2" data-feather="log-out"></i>Log
                            out</a>
                        <a class="dropdown-item" href="create-account.php"><i class="mr-2" data-feather="user-plus"></i>Register</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main">
        <div class="jumbotron">
            <div class="col-sm-8 mx-auto">
                <h3>You are now logged out</h3>
                <p>You have logged out and will be redirected to our homepage in a few seconds</p>
            </div>
        </div>
    </main>
</div>
<script>
    feather.replace();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    (function () {
        $.get('service/logout.php', function (data) {
            if (data) {
                let locHref = location.href;
                let siteRoot = locHref.substring(0, locHref.lastIndexOf('/'));
                let homePageLink = siteRoot + '/index.php';
                window.location.replace(homePageLink);
            }
        });
    })();
</script>
</body>
</html>