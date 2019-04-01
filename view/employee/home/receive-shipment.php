<?php

$shController = new ShipmentController();
$shipments = $shController->fetchShipmentsToReceive();
?>
<div class="tab-pane fade show active" id="receive-shipment" role="tabpanel" aria-labelledby="receive-shipment-tab">
    <table id="booksReceiveTable" class="table table-striped table-hover table-sm">
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
        <?php if (count($shipments)) {
            foreach ($shipments as $k) { ?>
                <tr>
                    <td class="d-none" data-id=<?php echo $k['shipment_id']; ?>></td>
                    <td><?php echo $k['book_id']; ?></td>
                    <td><?php echo $k['book_title']; ?></td>
                    <td><?php echo $k['isbn']; ?></td>
                    <td><?php echo $k['qty_to_receive']; ?></td>
                    <td><?php echo $k['publisher_id'] . ' - ' . $k['company_name']; ?></td>
                    <td><?php echo $k['date_shipped']; ?></td>
                    <td><?php echo $k['is_received'] == '0' ? 'TO BE ADDED' : 'RECEIVED'; ?></td>
                </tr>
            <?php }
        } ?>
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
    <!-- Receive Shipment Modal -->
    <div class="modal fade" id="receiveShipmentModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Receive Shipment</h5>
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