// DGS App javascript

$(document).ready(function() {

	// initial page load

	// check localStorage for last page
	var lastpage = localStorage.getItem('lastpage');

	if(lastpage == null) {
		// default page
		$.mobile.changePage('dgs.php');
	}
	else {
		$.mobile.changePage(lastpage);
	}
	
});

$(document).on('pageload', function(e, data) {
	localStorage.setItem('lastpage', data.url);
});
