const publisherId = $('a#company-name-id').attr('data-id');
const productsTable = $('#productsTable');
const addBookModal = $('#addBookModal');
// display products
const getProductsByPublisherId = (data) => {
    let products = data;
    if (products.length <= 0) {
        return;
    }
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
};

// display orders by clients (bookstore)

// add new book product
const addBookForm = $('#addBookForm');
const addBookFormData = {
    getVal: function () {
        return {
            publisherId: $('#publishersSelect').val(),
            isbn: $('#bIsbn').val(),
            title: $('#bTitle').val(),
            edition: $('#bEdition').val(),
            price: $('#bPrice').val(),
            quantity: $('#bQuantity').val(),
            category: $('#bCategory').val(),
            authorsId: $('#authorsSelect').val(),
            image: $('#bookImage').val()
        }
    }
};

const preAddBookFormSubmit = () => {
    let url = 'service/publisher_index.php?publisherId=' + publisherId;
    $.post(url, {addBookData: addBookFormData.getVal()}, function (response) {
        let r = JSON.parse(response);
        console.log(r);
        // dismiss modal and reload the page
    });
};

const postAddBookFormSubmit = () => {
    addBookForm.submit(function (event) {
        event.preventDefault();
        preAddBookFormSubmit();
        return false;
    });
};

const generateAuthorOptions = (data) => {
    data.map(function (k) {
        let middleName = '';
        if (k.middle_name !== null) {
            middleName = k.middle_name
        }
        $('#authorsSelect').append($('<option>', {
            value: k.author_id,
            text: k.first_name + ' ' + middleName + ' ' + k.last_name
        }))
    })
};