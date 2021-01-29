import { buildUrl } from '../utilities.js';

export class FormContact {

    constructor(form) {
        /*console.log('Nouvel objet FormContact!');*/
        /*  ona crée la propriété form element et on y  rangé l'objet form cad le formulaire.
         */

        this.formElement = form;
        //console.log(this.formElement);
        this.formElement.addEventListener('submit', this.onSubmitForm.bind(this));
    }

    onSubmitForm(event) {
        event.preventDefault(); /* ARRET DE LA SOUSMISSION DU FORM*/
        /* console.log('formulaire soumis');*/

        const formData = new FormData(this.formElement);

        /* method et body sont déjà définis dans l'api fetch*/
        const options = {
            method: 'POST',
            body: formData
        };


        let name = $('input[name=name]').val();
        //console.log(name);

        if (name != "") {
            //console.log('coucou');            
            //return console.log('coucou');

        }

        if (name = "") {
            //console.log('coucou');            
            //return console.log('ok');

        }

        const urlSubmit = buildUrl('/ajax/contact');


        console.log(urlSubmit)
        //const urlSubmit = "sass-tea/src/controllers/ajax/contact.php";

        fetch(urlSubmit, options)
            .then(response => response.text())
            .then(this.onAjaxContact.bind(this));

    }

    onAjaxContact(content) {
        this.formElement.reset();
        let pElement = document.createElement('span');
        setTimeout(function () {
            pElement.classList.add('success-message');
            pElement.innerHTML = '';
        }, 3000);
        pElement.textContent = content;
        this.formElement.prepend(pElement);
    }
}

/*
 return new Promise(
            (resolve, reject) => {

                resolve(
                    fetch(urlData, options)
                    .then(response => response.text())
                    .then(this.onAjaxContact.bind(this));

                    fetch(urlSubmit, options)
                    .then(response => response.text())
                    .then(this.onAjaxContact.bind(this));

                    onAjaxContact(content) {
                        this.formElement.reset();
                        const pElement = document.createElement('p');
                        pElement.classList.add('success-message');
                        pElement.textContent = content;
                        this.formElement.prepend(pElement);
                    };

                    reject();

                });

        }
    */