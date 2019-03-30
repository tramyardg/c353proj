const employeeId = $('input[id=employee-input]').val();
const getReceiveShipmentTable = () => {
    return $('#booksReceiveTable');
};

const getSelectedShipmentRows = () => {
    return $('#booksReceiveTable tr.selected');
};

const actions = {
    receive: function () {
        return {
            btn: $('#add-to-inventory')
        };
    }
};

actions.receive().btn.click(function () {
    if (getSelectedShipmentRows().length === 0) {
        alert('Please select a shipment to receive.');
        return false;
    }
    receiveShipmentRequest(getShipmentIdFromSelectedItems());
});

const getShipmentIdFromSelectedItems = () => {
    let shipmentIds = [];
    getSelectedShipmentRows().each(function () {
        shipmentIds.push($(this).find('td').attr('data-id'));
    });
    return shipmentIds;
};

const receiveShipmentRequest = (selectedItems) => {
    let url = 'service/employee_index.php?employeeId=' + employeeId + '';
    // $.post(url, selectedItems, function (response) {
    //
    // })
    console.log(url);
    console.log(selectedItems);

};