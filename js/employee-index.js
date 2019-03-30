// get selected shipment rows

const getReceiveShipmentTable = () => {
    return $('#booksReceiveTable');
};

const getSelectedItems = function () {
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
    console.log(getSelectedItems());
});