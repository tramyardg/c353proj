const employeeId = $('input[id=employee-input]').val();

const getSelectedShipmentRows = () => {
    return $('#booksReceiveTable tr.selected');
};

const getShipmentIdFromSelectedItems = () => {
    let shipmentIds = [];
    getSelectedShipmentRows().each(function () {
        shipmentIds.push($(this).find('td').attr('data-id'));
    });
    return shipmentIds;
};

const receiveShipmentRequest = (selectedItems) => {
    let url = 'service/employee_index.php?employeeId=' + employeeId + '';
    $.post(url, {shipmentItems: selectedItems}, function (response) {
        console.log(response);
        actions.receive().modal.id.modal('hide');
        displaySuccessMessage();
    });
};

const actions = {
    receive: function () {
        return {
            btn: $('#add-to-inventory'),
            modal: {
                id: $('#receiveShipmentModal')
            }
        };
    }
};

const confirmReceivingShipment = () => {
    actions.receive().btn.click(function () {
        if (getSelectedShipmentRows().length === 0) {
            alert('Please select a shipment to receive.');
            return false;
        }
        actions.receive().modal.id.modal('show');
        actions.receive().modal.id.find('#receiveSaveChanges').click(function () {
            receiveShipmentRequest(getShipmentIdFromSelectedItems())
        });
    });
};

const displaySuccessMessage = () => {
    let refreshSeconds = $('#receiveRefreshSeconds');
    refreshSeconds.parent().removeClass('d-none');
    refreshTimer(3, refreshSeconds, function () {
        let locHref = location.href;
        let siteRoot = locHref.substring(0, locHref.lastIndexOf('/'));
        let homePageLink = siteRoot + '/employee-index.php';
        window.location.replace(homePageLink);
    });
};