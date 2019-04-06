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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// fulfill bookstore order(s) - start
//////////////////////////////////////
const fulfillOrder = {
    sel: function () {
        return {
            dialog: $('#updateOrderModal'),
            dialogBody: $('#updateOrderModalBody'),
            fulfillSubmitBtn: $('#fulfillOrderFormSubmit'),
            updateBtn: $('#update-bookstore-order')
        }
    }
};

fulfillSelectedOrder = (table) => {
    fulfillOrder.sel().updateBtn.click(function () {
        // selRowDat is an array, follows order of the table header
        let selRowData = table.row('.selected').data();
        if (!table.row('.selected').data()) {
            alert('Please select an order to fulfill.');
            return;
        }
        if (parseInt(selRowData[4]) > parseInt(selRowData[5])) {
            alert("You don't have enough in the inventory to fulfill this order.");
            return;
        }
        let rowObj = {
            orderId: selRowData[0],
            bookId: selRowData[1],
            qtyOrdered: selRowData[4],
            qtyOnHand: selRowData[5],
            dateShipped: selRowData[6],
            status: selRowData[selRowData.length - 1]
        };
        fulfillOrder.sel().dialogBody.empty().append(`
        <input name="bookstore-order-id" type="hidden" class="d-none" value="${rowObj.orderId}">
        <input name="book-id" type="hidden" class="d-none" value="${rowObj.bookId}">
        <div class="row mt-2">
            <div class="col">
                <label for="dateShipped">Date Shipped</label>
                <input class="form-control" type="date" value="${new Date().toDateInputValue()}" name="dateShipped"
                id="dateShipped" 
                min="${new Date().toDateInputValue()}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="qtyOrderedByClient">Qty Ordered</label>
                <input class="form-control" type="number" value="${parseInt(rowObj.qtyOrdered)}" name="qtyOrderedByClient"
                id="qtyOrderedByClient">
            </div>
            <div class="col">
                <label for="qtyOnHandByPublisher">Qty On Hand</label>
                <input class="form-control" type="number" value="${parseInt(rowObj.qtyOnHand)}" name="qtyOnHandByPublisher"
                id="qtyOnHandByPublisher">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Status</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelectShippedStatus">
                        <option value="PROCESSING" ${(rowObj.status === 'PROCESSING') ? 'selected' : ''}>PROCESSING</option>
                        <option value="SHIPPED"  ${(rowObj.status === 'SHIPPED') ? 'selected' : ''}>SHIPPED</option>
                    </select>
                </div>
            </div>
        </div>`);

        fulfillOrder.sel().dialog.modal('show');
        fulfillOrder.sel().dialog.on('hidden.bs.modal', function () {
            fulfillOrder.sel().dialogBody.empty();
        });
    });
};

const fulfillOrderRequest = () => {
    fulfillOrder.sel().fulfillSubmitBtn.click((e) => {
        let fulfillmentPayload = {
            publisherId: $('input[name=publisher-id]').val(),
            bookstoreOrderId: $('input[name=bookstore-order-id]').val(),
            bookId: $('input[name=book-id]').val(),
            dateShipped: $('input[name=dateShipped]').val(),
            qtyOrdered: $('input[name=qtyOrderedByClient]').val(),
            qtyOnHand: $('input[name=qtyOnHandByPublisher]').val(),
            orderStatus: $('#inputGroupSelectShippedStatus').val()
        };
        let url = 'service/publisher_index.php?publisherId=' + fulfillmentPayload.publisherId;
        $.post(url, {fulfillmentData: fulfillmentPayload}, function (response) {
            let result = JSON.parse(response);
            if (result.length > 0) {
                alert('This order will be ship to the bookstore.');
                fulfillOrder.sel().dialog.modal('hide');
                fulfillOrder.sel().fulfillSubmitBtn.attr('disabled', true);
            } else {
                alert('Something went wrong!');
                fulfillOrder.sel().dialog.modal('hide');
            }
        });
        e.preventDefault();
    });
};

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// modify existing product(book)
/////////////////////////////////
const existingOrderElements = {
    ele: function () {
        return {
            dialog: $('#modifyExistingProductModal'),
            dialogBody: $('#modifyExistingProductModalBody'),
            fulfillSubmitBtn: $('#modifyExistingProductSubmit'),
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