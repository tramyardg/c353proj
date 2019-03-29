<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'model/Enum.php';
require 'controller/BookController.php';
require 'model/Book.php';

ob_start();
session_start();
if (isset($_SESSION["employee"])) {
    $employee = $_SESSION["employee"];
    // print_r($employee);

}/* else {
    header("Location: index.php");
}*/
// Once employee login implemented add this into if statement
$bkController = new BookController();
$books = $bkController->fetchBooks();
$book = new Book();
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
    <link rel="stylesheet" href="https:////cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php //print_r(json_encode($aController->fetchAuthors())); ?>
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
                    <?php if (isset($_SESSION["employee"])) { ?>
                        <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Hello, Employee</a>
                    <?php } else { ?>
                        <a class="nav-link pl-0 dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Hello, Sign in</a>
                    <?php } ?>
                    <div class="dropdown-menu">
                        <?php if (isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item btn-success" href="#"><i class="mr-2" data-feather="user-check"></i>Your
                                account</a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="login.php"><i class="mr-2" data-feather="log-in"></i>Log
                                in</a>
                        <?php } ?>
                        <?php if (isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="logout.php"><i class="mr-2" data-feather="log-out"></i>Log
                                out</a>
                        <?php } ?>
                        <?php if (!isset($_SESSION["employee"])) { ?>
                            <a class="dropdown-item" href="create-account.php"><i class="mr-2"
                                                                                  data-feather="user-plus"></i>Register</a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="nav nav-tabs" id="tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="receive-tab" data-toggle="tab" href="#receive" role="tab"
               aria-controls="receive" aria-selected="true">Receive</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="addBooks-tab" data-toggle="tab" href="#addBooks" role="tab" aria-controls="addBooks"
               aria-selected="false">Add Book</a>
        </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
        <!-- Receive books tab -->
        <div class="tab-pane fade show active" id="receive" role="tabpanel" aria-labelledby="receive-tab">
            <form id="receiveForm">
                <table id="booksTable" class="display">
                    <thead>
                    <tr>
                        <th class="d-none">Row</th>
                        <th>Select</th>
                        <th>Book Name</th>
                        <th>ISBN</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($books as $k => $v) { $book = $v; ?>
                        <tr>
                            <td class="d-none">1</td>
                            <td><input type="checkbox" name="bookCheckBox" value=""/></td>
                            <td><?php echo $book->getTitle();?></td>
                            <td><?php echo $book->getIsbn();?></td>
                            <td><input type="number"/></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-success btn-md" value="Submit"/>
            </form>
        </div>
        <!-- Add books tab -->
        <div class="tab-pane fade" id="addBooks" role="tabpanel" aria-labelledby="addBooks-tab">
            <p><code>Loop through the publishers data in the database and display in publisher select dropdown</code>
            </p>
            <p><code>Loop through the authors data in the database and display author select dropdown</code></p>
            <form>

                <div class="row">
                    <div class="col">
                        <label for="isbn">ISBN</label>
                        <input type="text" maxlength="11" class="form-control" id="isbn">
                    </div>
                    <!-- title -->
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <!-- edition -->
                    <div class="col">
                        <label for="edition">Edition</label>
                        <input type="number" class="form-control" id="edition">
                    </div>
                    <!-- price -->
                    <div class="col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" step=any>
                    </div>
                </div>
                <div class="row mt-2">
                    <!-- publisher_id -->
                    <div class="col">
                        <label for="publisher_id">Publisher</label>
                        <select class="form-control" id="publishersSelect">
                            <option value="0">Publisher 1</option>
                            <option value="1">Publisher 2</option>
                            <option value="2">Publisher 3</option>
                        </select>
                    </div>
                    <!-- authors -->
                    <div class="col">
                        <label for="authorsSelect">Authors</label>
                        <select multiple class="form-control" id="authorsSelect">
                        </select>
                    </div>
                    <!-- Book Category -->
                    <div class="col">
                        <label for="bookCategory">Genre</label>
                        <select class="form-control" id="bookCategory">
                            <option value="0">Biography</option>
                            <option value="1">Fiction</option>
                            <option value="2">History</option>
                            <option value="3">Mystery</option>
                            <option value="4">Suspense</option>
                            <option value="5">Thriller</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="bookImageControl">Book Cover Image</label>
                        <input type="file" class="form-control-file" id="bookImageControl">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="submit" class="btn btn-outline-success" id="addBookSubmit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#booksTable').DataTable({
                'pageLength': 2,
                columnDefs: [{"width": "10%", "targets": 1}]
            });
            $('#receiveForm').submit(function (event) {
                event.preventDefault();
                alert("The following data would have been submitted to the server: \n\n");
                return false;
            });
        });
        (function () {
            $.get("service/fetch.php?authors=all", function (data) {
                let authors = JSON.parse(data);
                for (let i = 0; i < authors.length; i++) {
                    let middleName = '';
                    if (authors[i].middle_name !== null) {
                        middleName = authors[i].middle_name
                    }
                    $('#authorsSelect').append('<option value="' + authors[i].author_id + '">' +
                        authors[i].first_name + ' ' +
                        middleName + ' ' +
                        authors[i].last_name +
                        '</option>');
                }
            });
            $.get("service/fetch.php?publishers=all", function (data) {
                let publishers = JSON.parse(data);
                for (let i = 0; i < publishers.length; i++) {
                    $('#publishersSelect').append('<option value="' + publishers[i].publisher_id + '">' +
                        publishers[i].publisher_id + ' ' +
                        publishers[i].company_name + ' ' +
                        '</option>');
                }
            });
        })();
    </script>
</body>
</html>
