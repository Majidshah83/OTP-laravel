$(document).ready(function() {
    var Update = function () {
        $('.sec').each(function() {
            var count = parseInt($(this).html());
            $(this).html(count - 1);
        });
    };
    setInterval(Update, 1000);
});