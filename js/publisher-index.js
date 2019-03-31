const publisherId = $('a#company-name-id').attr('data-id');
const productsTable = $('#productsTable');
// display products
const getProductsByPublisherId = () => {
    $.get("service/publisher_index.php?publishers=byId&publisherId=" + publisherId + "", function (data) {
        let products = JSON.parse(data);
        console.log(products);

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
