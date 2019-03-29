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
                    <div class="card-author" style="font-size: 0.75rem; margin-top: 0.5rem">by <b>${book.first_name} ${book.last_name}</b></div>
                </div>
            </div>
        </div>
    `)

};

const filterChange = () => {
    const selectedCategory = $("#category-filter").val();
    books = [];

    (selectedCategory == -1) ? 
        books = allBooks :
        allBooks.forEach((book) => {
            if (book.category == selectedCategory)
                books.push(book);
        });

    rerenderBooks();
}

// empties container and rerenders new books
const rerenderBooks = () => {
    $("#book-container").empty();
    books.forEach((book) => {
        renderBookCard(book);
    });
}