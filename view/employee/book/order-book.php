<?php
$pController = new PublisherController();
$bkPb = $pController->fetchBookJoinPublisher();
?>
<div class="tab-pane fade show active" id="orderBooks" role="tabpanel" aria-labelledby="addBooks-tab">
    <div class="pt-3 pb-3">
        <label for="selectBookToOrderTable">Step 1: Select a book to order</label>
        <table id="selectBookToOrderTable" class="table table-sm" style="width:100%">
            <thead>
            <tr>
                <th>Book ID</th>
                <th>Publisher Name</th>
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
                <td><?php echo $bkPb[$i]['book_id'];?></td>
                <td><?php echo $bkPb[$i]['company_name'];?></td>
                <td><?php echo $bkPb[$i]['title'];?></td>
                <td><?php echo $bkPb[$i]['edition'];?></td>
                <td><?php echo $bkPb[$i]['isbn'];?></td>
                <td><?php echo $bkPb[$i]['price'];?></td>
                <td><?php echo $bkPb[$i]['category'];?></td>
            </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Book ID</th>
                <th>Publisher Name</th>
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
        <label for="quantityNeeded">Step 2: Enter number of books needed</label>
        <input type="number" class="form-control" id="quantityNeeded" min="1" max="200" required>
    </div>
    <div class="pt-1">
        <button type="button" id="order-book-button" class="btn btn-primary">Order</button>
    </div>
</div>
