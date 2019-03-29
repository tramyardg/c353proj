// keep all the books here
let allBooks = [];
// these are the books to be displayed
let books = [];

const initializeBooks = (data) => {
    allBooks = data;
    books = data;
    rerenderBooks();
};

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
                    <button type="button" 
                        class="btn btn-primary" 
                        onclick="addOrder(${book.book_id})"
                        ${(book.qty_on_hand > 0) ? "disabled" : ""}>Order Request</button>
                </div>
            </div>
        </div>
    `)

};

const addOrder = (bookId) => {
    console.log(bookId);

    // insert book into cart
    // or table??
};

const filterChange = () => {
    const selectedCategory = $("#category-filter").val();
    const inventoryFilter = $("#inventory-filter").val();

    books = allBooks;
    books = applyCategoryFilter(selectedCategory);
    books = applyInventoryFilter(inventoryFilter);
    
    rerenderBooks();
}

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
    $("#book-container").empty();
    books.forEach((book) => {
        renderBookCard(book);
    });
}