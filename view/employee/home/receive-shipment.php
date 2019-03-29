<?php

$shController = new ShipmentController();
$shipments = $shController->fetchShipmentsToReceive();
?>
<div class="tab-pane fade show active" id="receive" role="tabpanel" aria-labelledby="receive-tab">
    <table id="booksReceiveTable" class="table table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="d-none">Shipment Id</th>
            <th>Book ID & Title</th>
            <th>ISBN</th>
            <th>Quantity</th>
            <th>Publisher ID & Name</th>
            <th>Date Shipped</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($shipments as $k) { ?>
            <tr>
                <td class="d-none"><?php echo $k['shipment_id']; ?></td>
                <td><?php echo $k['book_id'] . ' ' . $k['book_title']; ?></td>
                <td><?php echo $k['isbn']; ?></td>
                <td><?php echo $k['qty_to_receive']; ?></td>
                <td><?php echo $k['publisher_id'] . ' ' . $k['company_name']; ?></td>
                <td><?php echo $k['date_shipped']; ?></td>
                <td><?php echo $k['is_received']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="my-3">
        <div class="row">
            <div class="col-6">
                <button type="button" id="add-to-inventory" class="btn btn-secondary btn-md">Receive</button>
            </div>
        </div>
    </div>
</div>