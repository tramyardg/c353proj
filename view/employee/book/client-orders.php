<?php
require ('controller/OrderController.php');
$CController = new OrderController();
$Corders = $CController->fetchAllCustomerOrders();
?>
<div class="tab-pane fade" id="client-orders" role="tabpanel" aria-labelledby="client-orders-tab">
<div class="tab-pane fade show active" id="orderBooks" role="tabpanel" aria-labelledby="addBooks-tab">
    <div class="pt-3 pb-3">
        <h3 for="oderlogClients">Customer Orders</h3>
        <table id="oderlogClients" class="table table-bordered table-hover table-sm" style="width:100%">
            <thead>
            <tr>

                <th>Order_id</th>
                <th>Customer_id</th>
                <th>Order_date</th>
                <th>Date to be received</th>
                <th>Status</th>
                
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < count($Corders); $i++) { ?>
            <tr>
                
                <td><?php echo $Corders[$i]['order_id'];?></td>
                <td><?php echo $Corders[$i]['customer_id'];?></td>
                <td><?php echo $Corders[$i]['order_date'];?></td>
                <td><?php echo $Corders[$i]['date_received'];?></td>
                <td><?php echo $Corders[$i]['status']; ?></td>
            </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Order_id</th>
                <th>Customer_id</th>
                <th>Order_date</th>
                <th>Date to be received</th>
                <th>Status</th>
            </tr>
            </tfoot>
        </table>
    </div>
 
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
<script>
Date.prototype.toDateInputValue = (function() {
    let local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
$("#oderlogClients tr").click(function(){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var value= $(this).find('td:first').html();

    //alert(value);  
	let data = {orderId: value, dateShipped: new Date().toDateInputValue()}
	let retVal = confirm("The order ID is:"+ value + "Do you want to continue ?");
       if( retVal == true ) {
	$.post("service/employee_index.php", {updateClientOrder: data}, (response) => {
                    if(response == "1") {
                       alert('success');
console.log('hsad');
                    } else {
                                              alert('something went wrong');
                    }
                });
          return true;
       } else {
          document.write ("User does not want to continue!");
          return false;
       }
  
});
</script>
