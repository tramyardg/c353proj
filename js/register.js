const registerFormId = $('#registerForm');
const formData = {
    registerForm: function () {
        return {
            fullName: $('input[id=fullName]').val(),
            email: $('input[id=inputEmail]').val(),
            phone: $('input[id=inputPhone]').val(),
            address: {
                inputAddress: $('input[id=inputAddress]').val(),
                inputCity: $('input[id=inputCity]').val(),
                inputProvince: $('#inputProvince').val(),
                inputPostalCode: $('input[id=inputPostalCode]').val()
            },
            password: $('input[id=inputPassword]').val(),
            confirmPassword: $('input[id=inputConfirmPassword]').val()
        }
    }
};
const isValidAddress = function () {
    const addressValues = Object.values(formData.registerForm().address);
    const addressKeys = Object.keys(formData.registerForm().address);
    var count = 0;
    var invalidAddressInput = [];
    var cond = false;
    addressValues.map(function (v, i) {
        if (v === "") {
            count++;
            invalidAddressInput.push(addressKeys[i])
        }
    });
    if (count !== 0 && count <= 3) {
        invalidAddressInput.map(function (t) {
            $('#' + t).addClass('custom-is-invalid');
        });
        cond = false;
    } else {
        addressKeys.map(function (t) {
            $('#' + t).removeClass('custom-is-invalid');
        });
        cond = true;
    }
    return cond;
};
const isValidPassword = function () {
    const confirmPasswordLabel = $('#inputConfirmPassword');
    if (formData.registerForm().confirmPassword !== formData.registerForm().password) {
        alert('Password not match!');
        confirmPasswordLabel.addClass('custom-is-invalid');
        return false;
    }
    confirmPasswordLabel.removeClass('custom-is-invalid');
    return true;
};
const registerFormSubmit = function () {
    if (isValidAddress() && isValidPassword()) {
        $.ajax({
            url: 'service/create_account_service.php',
            type: 'post',
            data: formData.registerForm()
        }).done(function (response) {
            var res = JSON.parse(response);
            if (res.result) {
                $('#successMessage').removeClass('d-none');
                scrollTop();
                disableInputSubmit($('input[id=inputRegister]'));
                refreshTimer(3, $('#refreshSeconds'), function () {});
            } else {
                alert('There is already an account associated with this email.');
            }
        });
    }
};
$(document).ready(function () {
    $(registerFormId).submit(function (event) {
        event.preventDefault();
        registerFormSubmit();
        return false;
    });
});