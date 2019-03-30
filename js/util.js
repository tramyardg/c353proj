const scrollTop = function () {
    $(document).scrollTop(0);
};
const refreshTimer = function (sec, id, func) {
    $('.alert-warning').remove();
    let time = sec;
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
const reloadPage = (pageUrl, sec, secContainer) => {
    secContainer.parent().removeClass('d-none');
    refreshTimer(sec, secContainer, function () {
        let locHref = location.href;
        let siteRoot = locHref.substring(0, locHref.lastIndexOf('/'));
        let homePageLink = siteRoot + '/' + pageUrl;
        window.location.replace(homePageLink);
    });
};