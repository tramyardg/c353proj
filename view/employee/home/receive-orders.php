<?php
require('controller/OrderController.php');
$oController = new OrderController();
$orders = $oController->fetchAllReceivedOrders();
?>
<div class="tab-pane fade show active" id="receive-shipment" role="tabpanel" aria-labelledby="receive-shipment-tab">
    <table id="bookReceiveTable" class="display table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Book ID</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Quantity</th>
            <th>Publisher ID & Name</th>
            <th>Date Shipped</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($orders); $i++) { ?>
            <tr>
                <td><?php echo $orders[$i]['order_id']; ?></td>
                <td><?php echo $orders[$i]['book_id']; ?></td>
                <td><?php echo $orders[$i]['title']; ?></td>
                <td><?php echo $orders[$i]['isbn']; ?></td>
                <td><?php echo $orders[$i]['quantity']; ?></td>
                <td><?php echo $orders[$i]['publisher_id'], "-", $orders[$i]['company_name']; ?></td>
                <td><?php echo $orders[$i]['order_date']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th class="d-none">Order ID</th>
            <th>Book ID</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Quantity</th>
            <th>Publisher ID & Name</th>
            <th>Date Shipped</th>
        </tr>
        </tfoot>
    </table>
    <!-- Receive Orders Modal -->
    <div class="modal fade" id="receiveShipmentModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Receive Orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to proceed?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="receiveSaveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
<script>

    $("#bookReceiveTable tr").click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        var value = $(this).find('td:first').html();

        //alert(value);
        let retVal = confirm("The order ID is " + value + ".\nDo you want to continue?");
        if (retVal == true) {
            $.post("api/process.php", {updateReceiveItems: value}, (response) => {
                console.log(response);
                if (response) {
                    console.log('success');
                } else {
                    alert('something went wrong');
                }
            });
            return true;
        } else {
            document.write("User does not want to continue!");
            return false;
        }
    });

</script>


