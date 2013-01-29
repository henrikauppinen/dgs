// DGS App javascript


$("#launchpage").live('pageinit', function() {
	// initial App load

	// session
	var tokenVal = localStorage.getItem('token');

	if(tokenVal != null) {
		$.ajax({
			url: 'session.php',
			type: 'post',
			data: { token: tokenVal },
			success: function(res) {
				if(res != "0") {
					// update token
					localStorage.setItem('token', res);
				}
			},
			complete: function() {
				$.mobile.changePage('index.php');
			}
		});	
	}
	else {
		$.mobile.changePage('index.php');
	}
	
});


$("#login").live('pageinit', function() {

	// save session id to localStorage
	$('#loginform').on('submit', function() {

		var tokenVal = $('#tokenid').val();
		localStorage.setItem('token', tokenVal);

	});

});

/* edit course save button */
$('#editcourse').live('pageinit', function() {
	$('#editcoursesave').on('vclick', function(e) {
			
		e.preventDefault();

		$('#editcourseform').submit();
		
	});

	$('#deletecoursebutton').on('vclick', function() {
		$('#confirmdelete').popup('open');
	});
});