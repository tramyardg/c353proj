<?php
$commonNameTitle = parse_ini_file("./common.ini");

ob_start();
session_start();
if (isset($_SESSION["employee"])) {
    $employee = $_SESSION["employee"];
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
                    <tr>
                        <td class="d-none">1</td>
                        <td><input type="checkbox" name="bookCheckBox" value="" /></td>
                        <td>The Hobbit</td>
                        <td>ASDD3232</td>
                        <td><input type="number" /></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-success btn-md" value="Submit"/>
            </form>
        </div>
        <script>$(document).ready(function () {
                $('#booksTable').DataTable({
                    'pageLength': 2,
                    columnDefs: [{"width": "10%", "targets": 1}]
                });

                $('#receiveForm').submit(function (event) {
                    event.preventDefault();
                    alert(
                        "The following data would have been submitted to the server: \n\n"
                    );

                    return false;
                });

            });
        </script>
        <!-- Add books tab -->
        <div class="tab-pane fade" id="addBooks" role="tabpanel" aria-labelledby="addBooks-tab">
            <form style="margin:2.5% 5%;">
                <!-- isbn -->
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="number" class="form-control" id="isbn" size="20">
                </div>
                <!-- title -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" size="250">
                </div>
                <!-- edition -->
                <div class="form-group">
                    <label for="edition">Edition</label>
                    <input type="number" class="form-control" id="edition" size="2">
                </div>
                <!-- price -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" size="5">
                </div>
                <!-- publisher_id -->
                <div class="form-group">
                    <label for="publisher_id">Publisher ID</label>
                    <input type="number" class="form-control" id="publisher_id" size="4">
                </div>
                <!-- Book Category -->
                <div class="form-group">
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
                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </form>
        </div>
    </div>


</body>
</html>
