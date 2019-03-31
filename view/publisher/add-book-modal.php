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
            <div class="modal-body">
                <form id="addBookForm">
                    <div class="row mt-2">
                        <!-- isbn -->
                        <div class="col">
                            <label for="isbn">ISBN</label>
                            <input type="text" maxlength="11" class="form-control" id="isbn" required>
                        </div>
                        <!-- title -->
                        <div class="col">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- edition -->
                        <div class="col">
                            <label for="edition">Edition</label>
                            <input type="number" class="form-control" id="edition">
                        </div>
                        <!-- price -->
                        <div class="col">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" step=any required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- publishers -->
                        <div class="col">
                            <label for="publishersSelect">Publisher</label>
                            <select class="form-control" id="publishersSelect" required></select>
                        </div>
                        <!-- Book Category -->
                        <div class="col">
                            <label for="bookCategory">Genre</label>
                            <select class="form-control" id="bookCategory" required>
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
                            <label for="bookImageControl">Book Cover Image (optional)</label>
                            <input type="file" class="form-control-file" id="bookImageControl">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="submit" class="btn btn-secondary" value="Add" id="addBookSubmit"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="receiveSaveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>