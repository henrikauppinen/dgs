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



var msgData = {
	items: [
			{
				user: 'Henkka',
				time: '2013-02-06 23:50:00',
				text: 'Completed Siltamäki'
			},
			{
				user: 'Henkka',
				time: '2013-02-05 14:50:00',
				text: 'Completed Tuusula'
			}
	]
};



$(document).delegate('#profile', 'pageinit', function () {

	var markup = '';

	for(var i=0; i < msgData.items.length; i++) {
			markup += '<div class="msg"><div class="title"><img src="css/img/face.png" /><span>'
						+ msgData.items[i].user
						+ '</span><span>22 minutes ago</span></div><div><p>'
						+ msgData.items[i].text
						+ '</b></p></div></div>';
		}

	$("#msgcontainer").html(markup);
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