<?php
$commonNameTitle = parse_ini_file("./common.ini");
require 'model/Customer.php';
require 'model/Book.php';
require 'controller/BookController.php';

ob_start();
session_start();
if (isset($_SESSION["customer"])) {
    $customer = $_SESSION["customer"];
} else {
    header('Location: index.php?indexActive=true');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>

    <link href="css/bootstrap-pulse.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <input type="hidden" id="customer-id" class="d-none" value="<?php echo $customer->getCustomerId(); ?>">
    <?php include 'view/customer/navbar.php' ?>
    <main class="container">
        <div class="row">
            <div class="col">
                <h3>My Cart</h3>
                <form id="cart-form">
                    <hr>
                    <div class="row cart-row-header">
                        <div class="col-6 font-weight-bold">Book Title</div>
                        <div class="col-3 font-weight-bold">Price</div>
                        <div class="col-3 font-weight-bold">Quantity</div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        feather.replace();
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(() => {
            let cartForm = $('#cart-form');
            const cartItems = JSON.parse(localStorage.getItem("customer-cart")) || [];
            console.log(cartItems);
            let priceTotal = [];
            cartItems.forEach((item) => {
                priceTotal.push(parseFloat(item.price));
                cartForm.append(`<hr>
                    <div class="row cart-item-row" data-id="${item.book_id}">
                        <div class="col-6 row-title">${item.title}</div>
                        <div class="col-3 row-price">$${item.price}</div>
                        <div class="col-3 row-qty">
                            <input type="number" class="form-control" max="10" min="1"
                                value="${item.order_count}"
                                onchange="updateOrderPrice(this, ${item.price})"/>
                        </div>
                    </div>
                `);
            });

            cartForm.append(`
                    <hr>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Total</div>
                        <div class="col-3 font-weight-bold" id="total-price">$${arrSum(priceTotal)}</div>
                        <div class="col-3 font-weight-bold"></div>
                    </div>
                    <hr>
                    <div id="cart-purchase-back-btn"><button type="submit" class="btn btn-success" id=purchase-btn>Purchase</button></div>
            `);

            const submitCartForm = () => {
                console.log(cartItems);
                if (cartItems.length <= 0) {
                    alert('Your cart is empty.');
                    return;
                }
                let customerId = $("#customer-id").val();
                let orderItems = [];
                $('.cart-item-row').map((i, v) => {
                    orderItems.push({
                        customer_id: customerId,
                        order_date: new Date().toDateInputValue(),
                        book_id: $(v).attr('data-id'),
                        quantity: $(v).children('.row-qty').children().val(),
                        totalAmount: $(v).children('.row-price').text().substr(1)
                    })
                });
                console.log(orderItems);

                $.post("api/purchaseOrder.php", {payload: orderItems}, (response) => {
                    // response = JSON.parse(response);
                    // if (response.status) {
                    //     alert(response.message);
                    // } else {
                    //     alert("Something went wrong");
                    // }
                    localStorage.clear();
                    console.log((response));
                    $('#cart-purchase-back-btn').empty().prepend(`
                        <a href="index.php?indexActive=true" class="btn btn-success" >Home</a>`
                    );
                });
            };

            cartForm.submit((e) => {
                e.preventDefault();
                submitCartForm();
                return false;
            });
        });
    </script>
    <script src="js/util.js"></script>
    <script src="js/client-index.js"></script>
</body>
</html>