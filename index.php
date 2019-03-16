<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'entity/Customer.php';

ob_start();
session_start();
$customer = new Customer();
if (isset($_SESSION["customer"])) {
    $customer = $_SESSION["customer"];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>

    <link href="css/bootstrap-flatly.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/vertical-tab.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">

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
                    <?php if (isset($_SESSION["customer"])) { ?>
                    <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Hello, <?php echo $customer->getCustomerName(); ?></a>
                    <?php } else { ?>
                    <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Hello, Sign in</a>
                    <?php } ?>
                    <div class="dropdown-menu">
                        <?php if (isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item btn-success" href="#"><i class="mr-2" data-feather="user-check"></i>Your
                            account</a>
                        <?php } ?>
                        <a class="dropdown-item" href="#"><i class="mr-2" data-feather="shopping-cart"></i>Cart</a>
                        <?php if (!isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item" href="login.php"><i class="mr-2" data-feather="log-in"></i>Log in</a>
                        <?php } ?>
                        <?php if (isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item" href="logout.php"><i class="mr-2" data-feather="log-out"></i>Log
                            out</a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["customer"])) { ?>
                        <a class="dropdown-item" href="create-account.php"><i class="mr-2" data-feather="user-plus"></i>Register</a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main">
        <div class="tab">
            <button class="tablinks active" onclick="openCategory(this, 'biography')">Biographies</button>
            <button class="tablinks" onclick="openCategory(this, 'fiction')">Literature & Fiction</button>
            <button class="tablinks" onclick="openCategory(this, 'history')">History</button>
            <button class="tablinks" onclick="openCategory(this, 'thriller')">Thriller</button>
        </div>
        <div id="biography" class="tabcontent">
            <table id="example" class="" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Biographies</th>
                    <th scope="col">Price</th>
                    <th scope="col">Publication Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="180" height="230"
                                     xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                     role="img" aria-label="Placeholder: Thumbnail"><title>
                                        Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3 class="mb-0">Featured post</h3>
                                <strong class="d-inline-block mb-2 text-primary">by World</strong>
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="card-text mb-auto">CDN$ 14.99</p>
                    </td>
                    <td>
                        <p class="card-text mb-auto">Nov 12, 2018</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div id="fiction" class="tabcontent d-none">
            <h3>Literature and Fiction</h3>
        </div>
        <div id="history" class="tabcontent d-none">
            <h3>History</h3>
        </div>
        <div id="thriller" class="tabcontent d-none">
            <h3>Thriller</h3>
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
<script src="js/vertical-tabs.js"></script>
<script>
    $(document).ready(function () {
        $('table#example').DataTable({
            'pageLength': 2
        });
    });
</script>
</body>
</html>