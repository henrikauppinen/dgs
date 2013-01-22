// DGS App javascript

$(document).ready(function() {
	// initial App load
	$.mobile.changePage('dgs.php');
	
	return false;

	// session
	var token = localStorage.getItem('token');

	// alert("token: " + token);
	/*
	if(token != null) {
		$.ajax({
			url: 'dgs.php?p=session&token' + token,
			success: function(data) {
				if(data == 1) {
					$.mobile.changePage('dgs.php?p=frontpage');
				}
				else {
					$.mobile.changePage('dgs.php');
				}
			}
		});
		
	}
	else {
		$.mobile.changePage('dgs.php');
	}
	*/

	// check localStorage for last page
	/*
	var lastpage = localStorage.getItem('lastpage');

	if(lastpage == null) {
		// default page
		$.mobile.changePage('dgs.php');
	}
	else {
		$.mobile.changePage(lastpage);
	}
	*/


});

/*
$(document).on('pageinit', function() {

	$('#loginform').on('submit', function() {
		var token = $('#tokenid').val();
		localStorage.setItem('token', token);
	});

});


$(document).on('pageload', function(e, data) {
	localStorage.setItem('lastpage', data.url);
});
*/