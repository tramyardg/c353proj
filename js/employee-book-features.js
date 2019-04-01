const employeeId = $('input[id=employee-input]').val();

initializeBooksOrderedTable = () => {
    $('#booksOrderedTable').DataTable({
        'pageLength': 5
    });
};

const generatePublisherOptions = () => {
    $.get("service/employee_index.php?publishers=all&employeeId=" + employeeId + "", function (data) {
        let publishers = JSON.parse(data);
        publishers.map(function (k) {
            $('#publishersSelect').append($('<option>', {
                value: k.publiser_id,
                text: k.publisher_id.concat(' ').concat(k.company_name)
            }))
        });
    });
};
