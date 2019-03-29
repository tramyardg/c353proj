<?php

$shController = new ShipmentController();
$shipments = $shController->fetchShipments();
$shipment = new Shipment();
?>
<div class="tab-pane fade show active" id="receive" role="tabpanel" aria-labelledby="receive-tab">
    <table id="booksReceiveTable" class="display" width="100%">
        <thead>
        <tr>
            <th class="d-none">Row</th>
            <th>Book Title</th>
            <th>ISBN</th>
            <th>Quantity</th>
            <th>Publisher ID & Name</th>
            <th>Date Shipped by Publisher</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($shipments as $k => $v) { $shipment = $v; ?>
            <tr>
                <td class="d-none"></td>
                <td><?php echo $shipment->getBookId(); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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