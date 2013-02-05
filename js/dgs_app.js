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
				$.mobile.changePage('dgs.php');
			}
		});	
	}
	else {
		$.mobile.changePage('dgs.php');
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

/* edit course save button */
$('#edithole').live('pageinit', function() {
	$('#editholesave').on('vclick', function(e) {
			
		e.preventDefault();

		$('#editholeform').submit();
		
	});

	$('#deleteholebutton').on('vclick', function() {
		$('#confirmdelete').popup('open');
	});
});

$(document).delegate('#checkin', 'pageinit', function() {
	initialize();
});


function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(60.272461, 24.981086),
		disableDefaultUI: true,
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(60.272461, 24.981086),
		map: map
	});
}
