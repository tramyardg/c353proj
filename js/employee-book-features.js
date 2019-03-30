const employeeId = $('input[id=employee-input]').val();

initializeBooksOrderedTable = () => {
    $('#booksOrderedTable').DataTable({
        'pageLength': 5
    });
};

const generateAuthorOptions = () => {
    $.get("service/employee_index.php?authors=all&employeeId=" + employeeId + "", function (data) {
        let authors = JSON.parse(data);
        authors.map(function (k) {
            let middleName = '';
            if (k.middle_name !== null) {
                middleName = k.middle_name
            }
            $('#authorsSelect').append($('<option>', {
                value: k.author_id,
                text: k.first_name + ' ' + middleName + ' ' + k.last_name
            }))
        })
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
