function openCategory(evt, tabId) {
    var e = $(evt);
    $('button.tablinks').map(function () {
        $(this).removeClass('active');
    });
    $(e[0]).addClass("active");
    $('div.tabcontent').map(function () {
        $(this).addClass('d-none');
    });
    $('#' + tabId + '.tabcontent').removeClass('d-none');
}