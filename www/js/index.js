import { FormContact } from './class/FormContact.js';
document.addEventListener('DOMContentLoaded', function () {

    let form = document.querySelector('.form-contact');

    // affiche notre formulaire, s'il s'agit d'un bot qui désactive javascript, le formulaire ne s'affichera jamais
    $('.contact-form').each(function () {
        var $contact_form = $(this);
        $contact_form.removeClass('hidden');
        $('.contact-no-js').detach();
    });

    if (form != null) {
        //  console.log('Je suis sur la page contact');
        //instanciation de la classe
        const formContact = new FormContact(form);
    }

})