// common variables and functions
const warnMessage = $('#warningMessage');

const customerLoginForm = $('#customerLoginForm');
const customerFormData = {
    getVal: function () {
        return {
            email: $('input[id=inputEmail]').val(),
            password: $('input[id=inputPassword]').val()
        }
    }
};
const customerLoginFormSubmit = function () {
    if (customerFormData.getVal().email !== "" && customerFormData.getVal().password !== "") {
        $.post('service/customer_login.php', customerFormData.getVal(), function (data) {
            let res = JSON.parse(data);
            if (res.result) {
                reloadPage('index.php', 2, $('#refreshSeconds'));
            } else {
                warnMessage.removeClass('d-none');
                warnMessage.html(res.message);
            }
        });
    }
};

const employeeLoginForm = $('#employeeLoginForm');
const employeeFormData = {
    getVal: function () {
        return {
            email: $('input[id=inputEmpEmail]').val(),
            password: $('input[id=inputEmpPassword]').val()
        }
    }
};
const employeeLoginFormSubmit = function () {
    if (employeeFormData.getVal().email !== "" && employeeFormData.getVal().password !== "") {
        $.post('service/employee_login.php', employeeFormData.getVal(), function (data) {
            let res = JSON.parse(data);
            if (res.result) {
                reloadPage('employee-index.php', 2, $('#refreshSeconds'));
            } else {
                warnMessage.removeClass('d-none');
                warnMessage.html(res.message);
            }
        });
    }
};

$(document).ready(function () {
    customerLoginForm.submit(function (e) {
        e.preventDefault();
        customerLoginFormSubmit();
        return false;
    });

    employeeLoginForm.submit(function (e) {
        e.preventDefault();
        employeeLoginFormSubmit();
        return false;
    });
});