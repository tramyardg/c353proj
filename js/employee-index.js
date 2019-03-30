const employeeId = $('input[id=employee-input]').val();

const getSelectedShipmentRows = () => {
    let shipmentIds = [];
    $('#booksReceiveTable tr.selected').each(function () {
        shipmentIds.push($(this).find('td').attr('data-id'));
    });
    return shipmentIds;
};

const initializeBooksReceiveTable = () => {
    $('#booksReceiveTable').DataTable({
        select: {style: 'multi'},
        columnDefs: [{"width": "25%", "targets": 2}],
        'pageLength': 5
    });
};

const receiveShipmentRequest = (selectedItems) => {
    let url = 'service/employee_index.php?employeeId=' + employeeId + '';
    $.post(url, {shipmentItems: selectedItems}, function (response) {
        actions.receive().modalId.modal('hide');
        if (response.length > 0) {
            displaySuccessMessage();
            actions.receive().btn.attr('disabled', true);
        }
    });
};

const actions = {
    receive: function () {
        return {
            btn: $('#add-to-inventory'),
            modalId: $('#receiveShipmentModal')
        };
    }
};

const confirmReceivingShipment = () => {
    actions.receive().btn.click(function () {
        if (getSelectedShipmentRows().length === 0) {
            alert('Please select only the shipments that are NOT received.');
            return false;
        }
        actions.receive().modalId.modal('show');
        actions.receive().modalId.find('#receiveSaveChanges').click(function () {
            console.log('selected', getSelectedShipmentRows());
            receiveShipmentRequest(getSelectedShipmentRows())
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