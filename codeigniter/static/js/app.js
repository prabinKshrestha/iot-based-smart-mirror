function getDate() {
	var today = new Date();
	
	var month = today.getMonth();
	var year = today.getFullYear();
	var dayOfMonth = today.getDate();
	var dayOfWeek = today.getDay();

	var weekDay = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	var monthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	var dateFormat = monthName[month] + ' ' + dayOfMonth + ', ' + year;  
	var dayFormat = weekDay[dayOfWeek];

	document.getElementById('date').textContent = dateFormat;
	document.getElementById('day').textContent = dayFormat;

	t = setTimeout(function() {
    	getDate()
    }, 60000);

}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;

}

function startTime() {
	var today = new Date();

	var h = today.getHours();
	var m = today.getMinutes();
	// add a zero in front of numbers<10
	h = checkTime(h);
	m = checkTime(m);
	document.getElementById('time').textContent = h + ":" + m;
	t = setTimeout(function() {
	    startTime()
	}, 500);

}


startTime();
getDate();



