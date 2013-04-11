// DGS App javascript


var standalone = "standalone" in window.navigator && window.navigator.standalone;
var iOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/i) ? true : false );

// fastclick
window.addEventListener('load', function() {
    new FastClick(document.body);
}, false);

$(document).on('pageinit','#launchpage', function() {
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

$(document).on('pageinit', '#login', function() {

	var userMail = localStorage.getItem('email');

	if(userMail != null) {
		$('form [name=email]').val(userMail);
	}

	// save session id to localStorage
	$('#loginform').on('submit', function() {

		var tokenVal = $('#tokenid').val();
		localStorage.setItem('token', tokenVal);

		userMail = $('form [name=email]').val();

		if(userMail != null) {
			localStorage.setItem('email', userMail);
		}

	});

});

/* edit course save button */
$(document).on('pageinit', '#editcourse', function() {
	$('#editcoursesave').on('vclick', function(e) {
			
		e.preventDefault();

		$('#editcourseform').submit();
		
	});

	$('#deletecoursebutton').on('vclick', function() {
		$('#confirmdelete').popup('open');
	});
});

/* edit course save button */
$(document).on('pageinit', '#edithole', function() {
	$('#editholesave').on('vclick', function(e) {
			
		e.preventDefault();

		$('#editholeform').submit();
		
	});

	$('#deleteholebutton').on('vclick', function() {
		$('#confirmdelete').popup('open');
	});
});

$(document).delegate('#checkin', 'pageinit', function() {
	/* initialize(); */
});


$(document).delegate('#frontpage', 'pageinit', function() {
	$.getJSON('dgs.php?p=api&f=allmsg', function(data) {
		$('#msgcontainer').html($('#msgtmpl').render(data));
	});
});


$(document).delegate('#oncourse', 'pageinit', function() {
	
	$('#panel-stats').on({
		popupbeforeposition: function() {
			var h = $(window).height();
			$('#panel-stats').css('height', h);
		}
	});

});


$(document).delegate('#profile', 'pageinit', function () {
	var msgData = msgManager('profilemsg');
});


$(document).delegate('#poolarea', 'pageinit', function () {
	var msgData = msgManager('poolmsg');
});





function msgManager(key) {

	/* get data from localStorage */
	var msgs = JSON.parse(localStorage.getItem(key));

	/* show data if any exists */
	if(msgs != null) {
		$('#' + key).html($('#msgtmpl').render(msgs));
	}

	/* get new data and save it to localStorage */
	$.getJSON('dgs.php?p=api&f=' + key, function(data) {

		if(data == null) {
			$('#' + key).html('<span>No recent activity</span>');
			return false;
		}

		localStorage.setItem(key, JSON.stringify(data));

		/* render messages again */
		$('#' + key).html($('#msgtmpl').render(data));

	});

}


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
