$(function () {
    $("form").submit(function (e) {
        e.preventDefault();
        var $form = $(this);
        $.post($form.attr("action"), $form.serialize())
            .done(function (data) {
                $("#html").html(data);
                $("#formulaire").modal("hide");
            })
            .fail(function () {
                alert("ça marche pas...");
            });
    });
});
