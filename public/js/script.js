if (typeof document.getElementById(".btn-back") !== "undefined") {
    jQuery("body").on('click', '.btn-back', function () {
        history.back();
    });
}
