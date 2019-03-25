<?php
ob_start();
session_start();

if (isset($_SESSION["customer"]))
{
    header("Location: index.php");
}

?>
<html lang="en" class="gr__getbootstrap_com">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>

    <link href="css/bootstrap-flatly.css" rel="stylesheet">
    <link href="css/floating-labels.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body data-gr-c-s-loaded="true">
<div class="container">
    <div class="alert alert-success d-none" style="width: 60%;margin: 0 auto 1rem;" id="successMessage" role="alert">
        Log in successful.
        <hr/>
        You are being redirected to the home page in <span class="badge badge-light" id="refreshSeconds"></span> seconds.
    </div>
    <div class="alert alert-warning d-none" style="width: 60%;margin: 0 auto 1rem;" id="warningMessage" role="alert"></div>
    <div class="jumbotron" style="width: 60%;margin: 0 auto;">
        <div id="accordion">
            <div class="card">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h4>Member Login</h4>
                </button>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <form class="needs-validation form-signin" id="loginForm" novalidate>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                            <label for="inputEmail"><i class="mr-1" style="width: 20px; height: 20px;" data-feather="mail"></i>Email
                                address</label>
                            <div class="invalid-feedback">
                                Incorrect email address.
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword"><i class="mr-1" style="width: 20px; height: 20px;"
                                                          data-feather="key"></i>Password</label>
                            <div class="invalid-feedback">
                                Incorrect password entered.
                            </div>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Sign in"/>
                    </form>
                </div>
            </div>
            <div class="card">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span>Employee Login</span>
                </button>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <form class="needs-validation form-signin" id="empLoginForm" novalidate>
                        <div class="form-label-group">
                            <input type="email" id="inputEmpEmail" class="form-control" placeholder="Email address" required>
                            <label for="inputEmpEmail"><i class="mr-1" style="width: 20px; height: 20px;" data-feather="mail"></i>Email
                                address</label>
                            <div class="invalid-feedback">
                                Incorrect email address.
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputEmpPassword" class="form-control" placeholder="Password" required>
                            <label for="inputEmpPassword"><i class="mr-1" style="width: 20px; height: 20px;"
                                                          data-feather="key"></i>Password</label>
                            <div class="invalid-feedback">
                                Incorrect password entered.
                            </div>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Sign in"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center mb-4 my-4">
            <h1 class="h5 mb-3 font-weight-normal">
                Not a member? You can easily create an account here.
            </h1>
        </div>
        <div class="col-4 mx-auto" style="text-align: center;">
            <a href="create-account.php" class="">Create an account</a>
        </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center"><i class="mr-1" data-feather="at-sign"></i> 2017-2019</p>
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
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script src="js/util.js"></script>
<script src="js/login.js"></script>
</body>
</html>