const scrollTop = function () {
    $(document).scrollTop(0);
};
const refreshTimer = function (sec, id, func) {
    $('.alert-warning').remove();
    var time = sec;
    id.html(time);
    setInterval(function () {
        time--;
        id.html(time);
        // 1 second delay before actual reload
        if (time === 1) {
            location.reload();
            func();
        }
    }, 1000);
};
const disableInputSubmit = function (id) {
    id.attr("disabled", true)
};