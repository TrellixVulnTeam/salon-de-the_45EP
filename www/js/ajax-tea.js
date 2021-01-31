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
            //si le champs caché est vide on envoie le formulaire
            let honeypot = $('input[name=name]').val();
            if (honeypot === "") {
                // Envoi de la requête XHR
                $.post($(this).attr('action'), $(this).serializeArray(), function (data) {

                    // Notifications
                    if (data.send) {
                        $('#alert-frame').text('Votre demande de réservation a bien été envoyée !').fadeIn().delay(2000).fadeOut();
                    } else {
                        $('#alert-frame').text('Échec lors de la transmission de la réservation').fadeIn().delay(2000).fadeOut();
                    }
                });
                //si le champs caché est rempli on envoie pas le formulaire
            } else {
                document.getElementById("alert-frame").innerHTML = "piège";
            }
        });
    });

});