$(document).ready(function () {
    $('.filtre').click(function () {
        // on recupère la valeur du filtre
        value = $(this).data('filtre');
        // on enlève la classe select de l'ancien élément
        $('.filtre').removeClass('select'),
            // on ajoute la classe select sur l'élément cliqué
            $(this).addClass('select');

        // pour chaque div 
        $('.tea-container .tea-card').each(function () {
            el = $(this);
            // on montre tout
            el.show();
            // on teste si l'élément n'a pas la classe du filtre ou que l'utilisateur ne souhaite pas tout affiché
            if (!el.hasClass(value) && value != "all")
                el.hide(); // on cache les éléments qu'on ne souhaite pas voir

        });

    });
});