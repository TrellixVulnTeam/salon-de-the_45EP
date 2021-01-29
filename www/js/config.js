export const config = {};

/* Récup de l'url courante */
const url = new URL(window.location.href);
console.log(url);
config.baseUrl = url.origin;
switch (url.host) {

    case 'localhost':
    case '127.0.0.1':
    //case '87rgr87r8th.ngrok.io':
    //  config.baseUrl += '/sass-tea/www';
    //  break;
    //case 'association-csm.org':
    // config.baseUrl += '/sass-tea/www';
    //  break;
    //
}