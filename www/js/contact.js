$(document).ready(function () {
    'use strict';
    //si javascript n'est pas activé, le formulaire est caché
    $('.contact-form').each(function () {
        var $contact_form = $(this);
        $contact_form.removeClass('hidden');
        $('.contact-no-js').detach();
    });

    $(function () {
        $('#contact-form').submit(function (event) {
            // Annule l'action par défaut (on ne veut pas que la page se recharge)
            event.preventDefault();

            let $aside = $('#contact-form aside');
            let honeypot = $('input[name=name]').val();
            if (honeypot === "") {
                // Envoi de la requête XHR
                $.post($(this).attr('action'), $(this).serializeArray(), function (data) {

                    // Notifications
                    if (data.result) {
                        $aside.addClass('alert-success').text('Le message a bien été envoyé !').removeClass('d-none');
                    } else {
                        
                        //document.getElementById("txtHint").innerHTML = this.responseText;
                        $aside.addClass('alert-danger').text('Erreur lors de l\'envoi du message !').removeClass('d-none');
                    }
                });
            } else {
                document.getElementById("alert-frame").innerHTML = "piège";
            }
        });
    });

});