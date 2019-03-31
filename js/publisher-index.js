const publisherId = $('a#company-name-id').attr('data-id');
const productsTable = $('#productsTable');
// display products
const getProductsByPublisherId = () => {
    $.get("service/publisher_index.php?publishers=byId&publisherId=" + publisherId + "", function (data) {
        let products = JSON.parse(data);
        let h = '';
        products.map(function (k, i) {
            h += '<tr>' +
                '      <th scope="row">' + i + '</th>' +
                '      <td>' + k.title + '</td>' +
                '      <td>' + k.isbn + '</td>' +
                '      <td>' + k.edition + '</td>' +
                '      <td>' + k.price + '</td>' +
                '      <td>' + k.image + '</td>' +
                '      <td>' + k.category + '</td>' +
                '    </tr>';
        });
        productsTable.find('tbody').append(h);
        console.log(data);
    });
};

// display orders by clients (bookstore)

// add new book product
const addBookForm = $('#addBookForm');
const addBookFormData = {
    getVal: function () {
        return {
            publisherId: $('#publisherIdInput').val(),
            isbn: $('#bIsbn').val(),
            title: $('#bTitle').val(),
            edition: $('#bEdition').val(),
            price: $('#bPrice').val(),
            quantity: $('#bQuantity').val(),
            category: $('#bCategory').val(),
            authorsId: $('#bAuthorId').val(),
            image: $('#bookImage').val()
        }
    }
};

const preAddBookFormSubmit = () => {
    let url = 'service/publisher_index.php';
    $.post(url, {addBookData: addBookFormData.getVal()}, function (response) {

    });
};

const postAddBookFormSubmit = () => {
    addBookForm.submit(function (event) {
        event.preventDefault();

        return false;
    });
};
