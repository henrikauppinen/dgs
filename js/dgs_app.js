// DGS App javascript


var standalone = "standalone" in window.navigator && window.navigator.standalone;
var iOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/i) ? true : false );

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
	/* initialize(); */
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

	$.getJSON('dgs.php?p=api&f=poolmsg', function(data) {
		$.each(data.items, function (i, item) {
			markup = '<div class="msg"><div class="title"><img src="css/img/face.png" /><span>'
						+ item.username
						+ '</span><span>' + item.timeago + '</span></div><div><p>'
						+ item.content
						+ '</b></p></div></div>';

			$('#msgcontainer').append(markup);
		});
	});

});

$(document).delegate('#poolarea', 'pageinit', function () {
	$.getJSON('dgs.php?p=api&f=profilemsg', function(data) {
		$.each(data.items, function (i, item) {
			markup = '<div class="msg"><div class="title"><img src="css/img/face.png" /><span>'
						+ item.username
						+ '</span><span>' + item.timeago + '</span></div><div><p>'
						+ item.content
						+ '</b></p></div></div>';

			$('#msgcontainer').append(markup);
		});
	});
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