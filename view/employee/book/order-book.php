<div class="tab-pane fade" id="orderBooks" role="tabpanel" aria-labelledby="addBooks-tab">
    <p><code>To full fill the function of employee: the Bookstore can order books from several publishers.</code></p>
    <p><code>Ordering works one publisher at a time.</code></p>
    <form id="employeeOrderBook">
        <div class="form-group">
            <h5>Step 1: Select a publisher to order from</h5>
            <p><code>loop through the database and display the publishers to choose from</code></p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="publishersGroupSelect">Publishers</label>
                </div>
                <select class="custom-select" id="publishersGroupSelect">
                    <option selected>Choose...</option>
                    <option value="1">Publisher 1</option>
                    <option value="2">Publisher 1</option>
                    <option value="3">Publisher 1</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <h5>Step 2: Select book(s) to order from this publisher</h5>
            <p><code>loop through the database and get the books published from selected publisher in step 1</code></p>
            <p><code>generate a dynamic select options and display them below</code></p>
            <label for="booksToOrder">Books to Order</label>
            <select multiple class="form-control" id="booksToOrder"></select>
        </div>
        <div class="form-group">
            <h5>Step 3: Enter number of books needed</h5>
            <label for="edition">Order Quantity</label>
            <input type="number" class="form-control" id="edition">
        </div>
        <input type="submit" class="btn btn-secondary" value="Order"/>
    </form>
</div>