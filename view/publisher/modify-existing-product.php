<?php
$aController = new AuthorController();
$authors = $aController->fetchAuthors();
$author = new Author();
?>
<div class="modal fade" id="modifyExistingProductModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify this book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modifyExistingProductForm">
                <div class="modal-body" id="modifyExistingProductModalBody">
                    <div class="row mt-2">
                        <div class="col">
                            <label for="bTitle">Title</label>
                            <input type="text" class="form-control" id="mEpTitle" required>
                        </div>
                        <div class="col">
                            <label for="bIsbn">ISBN</label>
                            <input type="text" maxlength="11" class="form-control" id="mEpIsbn" required>
                        </div>
                        <div class="col">
                            <label for="bEdition">Edition</label>
                            <input type="number" class="form-control" id="mEpEdition" min="1" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="bPrice">Price</label>
                            <input type="number" class="form-control" id="mEpPrice" step=any required>
                        </div>
                        <div class="col">
                            <label for="bQuantity">Quantity</label>
                            <input type="number" class="form-control" id="mEpQuantity" min="1" required>
                        </div>
                        <div class="col">
                            <label for="bAuthorId">Genre</label>
                            <select class="form-control" id="bCategory" required>
                                <option value="">Select genre</option>
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
                        <div class="col">
                            <label for="authorsSelect">Authors</label>
                            <select multiple class="form-control" id="mEpAuthorsSelect" required>
                                <?php foreach ($authors as $k => $v)  { $author = $v; ?>
                                    <option value="<?php echo $author->getAuthorId() ?>">
                                        <?php echo $author->getFirstName() . " "; ?>
                                        <?php echo $author->getMiddleName() != "" ? $author->getMiddleName() : " "; ?>
                                        <?php echo $author->getLastName(); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="mEpBookImage">Book Cover Image (optional)</label>
                            <input type="file" class="form-control-file" id="mEpBookImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="modifyExistingProductSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>