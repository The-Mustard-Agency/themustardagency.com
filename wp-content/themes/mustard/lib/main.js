jQuery(document).ready(function($) {

});

//quicklinks button

function fire_quicklinks() {
	var x = document.getElementById("main_header");
    if (x.style.top === '0px') {
        x.style.top = '90px';
    } else {
        x.style.top = '0px';
    }

	var x = document.getElementById("content");
    if (x.style.top === '0px') {
        x.style.top = '90px';
    } else {
        x.style.top = '0px';
    }

    var x = document.getElementById("pre-foot");
    if (x.style.top === '0px') {
        x.style.top = '90px';
    } else {
        x.style.top = '0px';
    }

}



//open all link in content in a new tab.
/*
var mainContent = document.getElementById('articleBody').getElementsByTagName('a');
for (var i = 0; i < mainContent.length; i++) {
    var elem = mainContent[i]
		var point = elem.href;
		var strip = point.includes("themustardagency.com");
		var stripPdf = point.includes("pdf");

		if( strip != true ){
			elem.target = '_blank';
		} else if ( strip == true && stripPdf == true){
			elem.target = '_blank';
		} else {

		}
}
*/



//hide_popup

document.cookie = "visited=true; path=/;";

function kill_popup(){
	var y = document.getElementById("popup");
	if (y.style.display === 'flex') {

		y.style.display = 'none';
    } else {
        y.style.display = 'none';
    }

}
