<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addBookForm">
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col">
                            <label for="publisherIdInput">ISBN</label>
                            <input type="hidden" class="form-control"
                                   id="publisherIdInput" <?php echo $publisher->getCompanyName(); ?> required>
                        </div>
                        <!-- isbn -->
                        <div class="col">
                            <label for="bIsbn">ISBN</label>
                            <input type="text" maxlength="11" class="form-control" id="bIsbn" required>
                        </div>
                        <!-- title -->
                        <div class="col">
                            <label for="bTitle">Title</label>
                            <input type="text" class="form-control" id="bTitle" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- edition -->
                        <div class="col">
                            <label for="bEdition">Edition</label>
                            <input type="number" class="form-control" id="bEdition" min="1">
                        </div>
                        <!-- price -->
                        <div class="col">
                            <label for="bPrice">Price</label>
                            <input type="number" class="form-control" id="bPrice" step=any required>
                        </div>
                        <!-- quantity -->
                        <div class="col">
                            <label for="bQuantity">Price</label>
                            <input type="number" class="form-control" id="bQuantity" min="1" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- publishers -->
                        <div class="col">
                            <label for="publishersSelect">Publisher</label>
                            <select class="form-control" id="publishersSelect" required readonly>
                                <option value="<?php echo $publisher->getPublisherId(); ?>">
                                    <?php echo $publisher->getCompanyName(); ?>
                                </option>
                            </select>
                        </div>
                        <!-- Book Category -->
                        <div class="col">
                            <label for="bAuthorId">Genre</label>
                            <select class="form-control" id="bAuthorId" required>
                                <option value="-1">Select genre</option>
                                <option value="0">Biography</option>
                                <option value="1">Fiction</option>
                                <option value="2">History</option>
                                <option value="3">Mystery</option>
                                <option value="4">Suspense</option>
                                <option value="5">Thriller</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- authors -->
                        <div class="col">
                            <label for="authorsSelect">Authors</label>
                            <select multiple class="form-control" id="authorsSelect" required></select>
                        </div>
                        <div class="col mb-2">
                            <label for="bookImage">Book Cover Image (optional)</label>
                            <input type="file" class="form-control-file" id="bookImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="addBookSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>