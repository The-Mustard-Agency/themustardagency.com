var slowLoad = window.setTimeout( function() {
     var slow = document.getElementById("slow");
     slow.style.display = 'block';

    console.log( "the page is taking its sweet time loading" );
}, 3300 );

window.addEventListener( 'load', function() {
    window.clearTimeout( slowLoad );
}, false );
