$(document).ready(function () {

    //si javascript n'est pas activé, le formulaire est caché
    $('.popup-form').each(function () {
        var $contact_form = $(this);
        $contact_form.removeClass('hidden');
        $('.contact-no-js').detach();
    });

    $(function () {
        $('.popup-form[id^="form"]').submit(function (event) {
            event.preventDefault();

            let $aside = $('#contact-form aside');
            let honeypot = $('input[name=name]').val();
            if (honeypot === "") {
                // Envoi de la requête XHR
                $.post($(this).attr('action'), $(this).serializeArray(), function (data) {

                    // Notifications
                    if (data.result) {
                        document.getElementById("alert-frame").innerHTML = "good";
                        //$aside.addClass('alert-success').text('votre demande de réservation a bien été envoyée !').removeClass('d-none');
                    } else {

                        document.getElementById("alert-frame").innerHTML = "echec";
                        //$aside.addClass('alert-danger').text('Erreur lors de l\'envoi de la réservation !').removeClass('d-none');
                    }
                });
            } else {
                document.getElementById("alert-frame").innerHTML = "piège";
            }
        });
    });

});