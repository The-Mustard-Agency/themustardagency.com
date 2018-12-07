jQuery(document).ready(function($){
    if ( $('body').hasClass('home')) {
      linkSW();
    } else {
    }
});

function linkSW(){
  if(window.location.hostname == 'staging.mustardwebsites.co.uk/'){
    var swLocation = window.location.hostname + window.location.pathname + 'sw.js';
  } else {
    var swLocation = 'sw.js';
  }

  if (location.protocol === 'https:') {
    if (navigator.serviceWorker) {
      navigator.serviceWorker.register(swLocation).then(function(registration) {
        console.log('Mustard ServiceWorker registration successful with scope:',  registration.scope);
      }).catch(function(error) {
        console.log('Opps, Mustard ServiceWorker registration failed:', error);
      });
    }
  }
  else{
    console.log('Mustard ServiceWorker unavalible - requires https, sorry');
  }
}
