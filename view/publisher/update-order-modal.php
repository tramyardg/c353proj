<?php
//$aController = new AuthorController();
//$authors = $aController->fetchAuthors();
//$author = new Author();
?>
<!-- update order modal for c353proj/publisher-orders.php -->
<div class="modal fade" id="updateOrderModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fulfill client order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateOrderForm">
                <div class="modal-body" id="updateOrderModalBody">
                    <div class="modal-body" id="updateOrderModalBody">
                        <div id="updateOrderModalBodyInner"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="updateOrderFormSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>