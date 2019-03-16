const loginForm = $('#loginForm');
const warnMessage = $('#warningMessage');
const formData = {
    loginForm: function () {
        return {
            email: $('input[id=inputEmail]').val(),
            password: $('input[id=inputPassword]').val()
        }
    }
};
const loginFormSubmit = function () {
    if (formData.loginForm().email !== "" && formData.loginForm().password !== "") {
        $.ajax({
            url: 'service/login_service.php',
            type: 'post',
            data: formData.loginForm()
        }).done(function (response) {
            var res = JSON.parse(response);
            if (res.result) {
                $('#successMessage').removeClass('d-none');
                refreshTimer(3, $('#refreshSeconds'), redirectHome);
            } else {
                warnMessage.removeClass('d-none');
                warnMessage.html(res.message);
            }
        });
    }

};
const redirectHome = function () {
    var locHref = location.href;
    var siteRoot = locHref.substring(0, locHref.lastIndexOf('/'));
    var homePageLink = siteRoot + '/index.php';
    window.location.replace(homePageLink);
};
$(document).ready(function () {
    loginForm.submit(function (e) {
        e.preventDefault();
        loginFormSubmit();
        return false;
    })
});