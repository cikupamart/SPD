function updateDateTime()
	{
	  var currentDateTime = new Date();
	
	  var currentHours = currentDateTime.getHours();
	  var currentMinutes = currentDateTime.getMinutes();
	  var currentSeconds = currentDateTime.getSeconds();
	
	  // Pad the minutes and seconds with leading zeros, if required
	  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
	  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
	
	  // Choose either "AM" or "PM" as appropriate
	  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
	
	  // Convert the hours component to 12-hour format if needed
	  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
	
	  // Convert an hours component of "0" to "12"
	  currentHours = ( currentHours == 0 ) ? 12 : currentHours;
	
	  // Compose the time string for display
	  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
	
	
	  //var currentDate = new Date ();
	  // Compose the date string for display
	  var dayName = new Array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	  var monthName = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
	  var D = currentDateTime.getDay();  
      var d = currentDateTime.getDate();
      var m = currentDateTime.getMonth() + 1;
      var yy = currentDateTime.getFullYear();
      var currentDateString = dayName[D - 1] + ", "+ d + " " + monthName[m - 1] + " " + yy ;
                    
	  document.getElementById("datetime").innerHTML = currentDateString + " / " + currentTimeString;
	  setTimeout("updateDateTime()", 1000);	  
	}

//	function UpdateDate()
//	{
//	  var currentDate = new Date ();
//	  // Compose the date string for display
//	  var dayName = new Array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
//	  var monthName = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
//	  var D = currentDate.getDay();  
//      var d = currentDate.getDate();
//      var m = currentDate.getMonth() + 1;
//      var yy = currentDate.getFullYear();
//      var currentDateString = dayName[D - 1] + ", "+ d + " " + monthName[m - 1] + " " + yy  + " / ";
//                    
//	  // Update the date-time display
//	  document.getElementById("date").innerHTML = currentDateString;	
//	}
	//--</>>