<?php

$shController = new ShipmentController();
$shipments = $shController->fetchShipmentsToReceive();
?>
<div class="tab-pane fade show active" id="receive-shipment" role="tabpanel" aria-labelledby="receive-shipment-tab">
    <table id="booksReceiveTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
        <tr>
            <th class="d-none">Shipment Id</th>
            <th>ID</th>
            <th>Title</th>
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
                <td class="d-none" data-id="<?php echo $k['shipment_id']; ?>"></td>
                <td><?php echo $k['book_id']; ?></td>
                <td><?php echo $k['book_title']; ?></td>
                <td><?php echo $k['isbn']; ?></td>
                <td><?php echo $k['qty_to_receive']; ?></td>
                <td><?php echo $k['publisher_id'] . ' - ' . $k['company_name']; ?></td>
                <td><?php echo $k['date_shipped']; ?></td>
                <td><?php echo $k['is_received']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th class="d-none">Shipment Id</th>
            <th>ID</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Quantity</th>
            <th>Publisher ID & Name</th>
            <th>Date Shipped</th>
            <th>Status</th>
        </tr>
        </tfoot>
    </table>
    <div class="my-3">
        <div class="row">
            <div class="col-6">
                <button type="button" id="add-to-inventory" class="btn btn-primary btn-md">Receive</button>
            </div>
        </div>
    </div>
</div>