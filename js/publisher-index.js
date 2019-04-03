const publisherId = $('a#company-name-id').attr('data-id');
const addBookModal = $('#addBookModal');
// add new book product - start
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
            authorsId: $('#authorsSelect').val()
        }
    }
};

function handleFileSelect() {
    let bImage = document.getElementById("bookImage");
    for (let i = 0; i < bImage.files.length; i++) {
        let file = bImage.files[i];
        if (!file.type.match('image.*')) {
            continue;
        }
        let reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                let span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" id="product-image-' + i + '" src="', e.target.result,
                    '" title="', theFile.name, '"/>'].join('');
                $('#bookImagePreview').empty();
                document.getElementById('bookImagePreview').insertBefore(span, null);
            };
        })(file);
        reader.readAsDataURL(file);
    }
}

const preAddBookFormSubmit = () => {
    let url = 'service/publisher_index.php?publisherId=' + publisherId;
    let productImage = $('#product-image-0').attr('src');
    console.log(productImage);
    $.post(url, {addBookData: addBookFormData.getVal()}, function (response) {
        addBookModal.modal('hide');
        if (response.includes('{"result":true}{"result":true}')) {
            reloadPage('publisher-products.php', 2, $('#addNewProductAlert'));
        }
    });
    return false;
};
const postAddBookFormSubmit = () => {
    addBookForm.submit(function (event) {
        event.preventDefault();
        preAddBookFormSubmit();
    });
};

// update bookstore order(s) - start
const updateOrder = {
    sel: function () {
        return {
            dialog: $('#updateOrderModal'),
            dialogBody: $('#updateOrderModalBody'),
            submitBtn: $('#updateOrderFormSubmit'),
            updateBtn: $('#update-bookstore-order')
        }
    }
};
updateSelectedBookOrder = (table) => {
    updateOrder.sel().updateBtn.click(function () {

        // selRowDat is an array, follows order of the table header
        let selRowData = table.row('.selected').data();
        if (!table.row('.selected').data()) {
            alert('Please select an order to update.');
            return;
        }
        updateOrder.sel().dialog.modal('show');

        let rowObj = {
            orderId: selRowData[0],
            qtyOrdered: selRowData[4],
            qtyOnHand: selRowData[5],
            dateShipped: selRowData[6],
            status: selRowData[selRowData.length - 1]
        };

        updateOrder.sel().dialog.on('shown.bs.modal', function () {
            if (parseInt(rowObj.qtyOrdered) > parseInt(rowObj.qtyOnHand)) {
                updateOrder.sel().dialogBody.empty().append("<p class='text-danger'>You don't have enough books to fulfill this order.</p>");
            } else {
                updateOrder.sel().dialogBody.empty().append('<div class="row mt-2 d-none">\n' +
                    '                                <div class="col">\n' +
                    '                                    <input name="shipmentId" type="hidden" value="' + rowObj.shipmentId + '">\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="row mt-2">\n' +
                    '                                <div class="col">\n' +
                    '                                    <label for="datetimeShipped">Date Shipped</label>\n' +
                    '                                    <input class="form-control" type="date" value="' + new Date().toDateInputValue() + '" \n' +
                    '                                           id="datetimeShipped" min="' + new Date().toDateInputValue() + '">\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="row mt-2">\n' +
                    '                                <div class="col">\n' +
                    '                                    <label for="qtyOrderedByClient">Qty Ordered</label>\n' +
                    '                                    <input class="form-control" readonly type="number" value="' + parseInt(rowObj.qtyOrdered) + '" id="qtyOrderedByClient" >\n' +
                    '                                </div>\n'+
                    '                                <div class="col">\n' +
                    '                                    <label for="qtyOnHandByPublisher">Qty On Hand</label>\n' +
                    '                                    <input class="form-control" readonly type="number" value="' + parseInt(rowObj.qtyOnHand) + '" id="qtyOnHandByPublisher" >\n' +
                    '                                </div>\n' +
                    '                            </div><div class="row mt-3">\n' +
                    '                                <div class="col">\n' +
                    '                                    <div class="input-group mb-3">\n' +
                    '                                        <div class="input-group-prepend">\n' +
                    '                                            <label class="input-group-text" for="inputGroupSelect01">Status</label>\n' +
                    '                                        </div>\n' +
                    '                                        <select class="custom-select" id="inputGroupSelectShippedStatus">\n' +
                    '                                            <option value="PROCESSING" selected>PROCESSING</option>\n' +
                    '                                            <option value="SHIPPED">SHIPPED</option>\n' +
                    '                                        </select>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>');
            }
        });
        updateOrder.sel().dialog.on('hidden.bs.modal', function (e) {
            updateOrder.sel().dialogBody.empty();
        });

        console.log(selRowData);
    });
};

// modify existing product(book)
const existingOrderElements = {
    ele: function () {
        return {
            dialog: $('#modifyExistingProductModal'),
            dialogBody: $('#modifyExistingProductModalBody'),
            submitBtn: $('#modifyExistingProductSubmit'),
            modifySelProduct: $('#updated-selected-book')
        }
    }
};
modifyExistingProduct = (table) => {
    existingOrderElements.ele().modifySelProduct.click(function () {
        let selRow = table.row('.selected').data();
        if (!table.row('.selected').data()) {
            alert('Please select a product first.');
            return;
        }
        console.log(selRow);
        existingOrderElements.ele().dialog.modal('show');
    });
};