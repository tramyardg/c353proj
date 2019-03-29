// keep all the books here
let allBooks = [];
// these are the books to be displayed
let books = [];

const initializeBooks = (data) => {
    allBooks = data;
    books = data;
    rerenderBooks();
};

// renders a single book card
const renderBookCard = (book) => {
    $("#book-container").append(`
        <div class="card-box">
            <div class="card">
                <div class="book-image">
                        Sample Image Here
                </div>
                <div class="card-body">
                    <div class="cart-title text-uppercase">
                        <span>${book.title}</span><br>
                        <span class="badge badge-primary">${book.category}</span>
                    </div>
                    <div class="card-author" style="font-size: 0.75rem; margin: 0.5rem 0 1rem 0">by <b>${book.first_name} ${book.last_name}</b></div>
                    <div class="inventory" style="font-size: 0.75rem">
                        ${(book.qty_on_hand > 0) ? "In Stock" : "<b class='text-danger'>Out of Stock</b>"}
                    </div>
                    <div class="button-container">
                        ${(containsOrder(book.book_id)) ? 
                            `<button type="button" class="btn btn-success" onclick="removeOrder(${book.book_id})">Remove from Cart</button>` :
                            `<button type="button" 
                                class="btn btn-success" 
                                onclick="addOrder(${book.book_id})"
                                ${(book.qty_on_hand == 0 || containsOrder(book.book_id)) ? "disabled" : ""}>
                                Add to Cart
                            </button>`
                        }
                        ${(book.qty_on_hand == 0) ? `
                            <button type="button" 
                                class="btn btn-primary" 
                                data-toggle="modal" 
                                data-target="#orderRequestModal"
                                onclick="requestOrder(${book.book_id})">Request Book</button>
                        ` : ""}
                    </div>
                </div>
            </div>
        </div>
    `)

};

// check if bookId is in localstorage, if not, add it and set localstorage again
const addOrder = (bookId) => {
    let orderBook = allBooks.filter(book => book.book_id == bookId)[0];
    // by deffault, order count is 1
    orderBook.order_count = 1;
    let customerOrders = JSON.parse(localStorage.getItem("customer-cart")) || [];
    
    if (!containsOrder(bookId)) customerOrders.push(orderBook);
    localStorage.setItem("customer-cart", JSON.stringify(customerOrders));
    rerenderBooks();
};

// removes order from localstorage
const removeOrder = (bookId) => {
    let customerOrders = JSON.parse(localStorage.getItem("customer-cart")) || [];
    let newCustomerOrders = customerOrders.filter(book => book.book_id != bookId);
    localStorage.setItem("customer-cart", JSON.stringify(newCustomerOrders));
    rerenderBooks();
}

// helper method to check if bookId is contained in localstorage
const containsOrder = (bookId) => {
    let customerOrders = JSON.parse(localStorage.getItem("customer-cart")) || [];

    for (let customerOrder of customerOrders) {
        if (customerOrder.book_id == bookId) return true;
    }

    return false;
}

const requestOrder = (bookId) => {
    // alert("SEND REQUEST BOOK HERE");
    console.log("open modal");
}

// apply filter changes on books
const filterChange = () => {
    const selectedCategory = $("#category-filter").val();
    const inventoryFilter = $("#inventory-filter").val();

    books = allBooks;
    books = applyCategoryFilter(selectedCategory);
    books = applyInventoryFilter(inventoryFilter);
}

// apply specific category filter on books
const applyCategoryFilter = (selectedCategory) => {
    let filteredBooks = [];

    (selectedCategory == -1) ? 
        filteredBooks = books :
        books.forEach((book) => {
            if (book.category == selectedCategory)
                filteredBooks.push(book);
        });

    return filteredBooks;
}

// apply specific inventory filter on books
const applyInventoryFilter = (selectedInventory) => {
    let filteredBooks = [];

    (selectedInventory == -1) ?
        filteredBooks = books:
        books.forEach((book) => {
            // books with available inventory
            if (selectedInventory == 1 && book.qty_on_hand > 0) {
                filteredBooks.push(book);
            // books with no inventory
            } else if (selectedInventory == 0 && book.qty_on_hand == 0)  {
                filteredBooks.push(book);
            }
        });
    console.log("FILTERED BOOKS: ", filteredBooks);
    return filteredBooks;
}

// empties container and rerenders new books
const rerenderBooks = () => {
    filterChange();
    $("#book-container").empty();
    books.forEach((book) => {
        renderBookCard(book);
    });
}