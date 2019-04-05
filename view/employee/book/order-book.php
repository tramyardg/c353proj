<?php
$pController = new PublisherController();
$bkPb = $pController->fetchBookJoinPublisher();
?>
<div class="tab-pane fade show active" id="orderBooks" role="tabpanel" aria-labelledby="addBooks-tab">
    <div class="pt-3 pb-3">
        <h3 for="selectBookToOrderTable">Select a book to order from the list below.</h3>
        <table id="selectBookToOrderTable" class="table  table-sm table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Publisher</th>
                <th>Title</th>
                <th>Edition</th>
                <th>ISBN</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < count($bkPb); $i++) { ?>
                <tr>
                    <td><?php echo $bkPb[$i]['book_id']; ?></td>
                    <td><?php echo $bkPb[$i]['company_name']; ?></td>
                    <td><?php echo $bkPb[$i]['title']; ?></td>
                    <td><?php echo $bkPb[$i]['edition']; ?></td>
                    <td><?php echo $bkPb[$i]['isbn']; ?></td>
                    <td><?php echo $bkPb[$i]['price']; ?></td>
                    <td><?php echo BookCategory::toString(intval($bkPb[$i]['category'])); ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Publisher</th>
                <th>Title</th>
                <th>Edition</th>
                <th>ISBN</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="pt-3 pb-3">
        <h3 for="quantityNeeded">How many do you need?</h3>
        <input type="number" class="form-control" id="quantity-needed" min="1" max="50" value="1" required>
    </div>
    <div class="pt-1">
        <button type="button" id="order-book-submit" class="btn btn-primary">Submit</button>
    </div>
</div>
