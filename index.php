<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'db/DB.php';
require 'model/Customer.php';
require 'model/Book.php';
require 'controller/BookController.php';

require 'model/Enum.php';
require 'model/BookCategory.php';


$bkController = new BookController();
$books = $bkController->fetchBooks();

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
    <link href="css/index.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/vertical-tab.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <!-- TODO put customer id value here -->
    <input type="hidden" id="customer-id" style="display:none" value="<?php echo "1"; ?>">
    <?php include './navbar.php' ?>
    <main class="container-fluid">
        <!-- Order Request Modal -->
        <div class="modal fade" id="orderRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form onsubmit="orderSubmit()">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Order Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php if (!isset($_SESSION["customer"])) {?>
                        <div id="order-body" class="modal-body">
                            <!-- content populated from js file -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Send Order">
                        </div>
                    <?php } else { ?>
                        <div class="modal-body">You must login before submitting an order request</div>
                    <?php } ?>
                </form>
            </div>
        </div>
        </div>
        <div class="row">
            <!-- All the filters are in here -->
            <div class="col-3">
                <div class="filter-container">
                    <label for="category-filter">Categories</label>
                    <select id="category-filter" class="custom-select" onchange="rerenderBooks()">
                        <option value="-1" selected>All</option>
                        <option value="0"><?php echo BookCategory::toString(0); ?></option>
                        <option value="1"><?php echo BookCategory::toString(1); ?></option>
                        <option value="2"><?php echo BookCategory::toString(2); ?></option>
                        <option value="3"><?php echo BookCategory::toString(3); ?></option>
                        <option value="4"><?php echo BookCategory::toString(4); ?></option>
                        <option value="5"><?php echo BookCategory::toString(5); ?></option>
                    </select>
                </div>

                <div class="filter-container">
                    <label for="inventory-filter">Availability</label>
                    <select id="inventory-filter" class="custom-select" onchange="rerenderBooks()">
                        <option value="-1" selected>All</option>
                        <option value="0">Out of Stock</option>
                        <option value="1">In Stock</option>
                    </select>
                </div>
            </div>
            <!-- Each book gets appended in here -->
            <div id="book-container" class="col book-container">
            </div>
        </div>
    </main>
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
<!-- <script src="js/vertical-tabs.js"></script> -->
<script src="js/client-index.js"></script>
<script>
    $(document).ready(() => {
        let books = <?php echo json_encode($bkController->fetchBooks()); ?>;
        console.log(books);
        initializeBooks(books);
    });
</script>
</body>
</html>