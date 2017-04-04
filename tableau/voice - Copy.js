if (annyang) {
  // These are the voice commands in quotes followed by the function
  var tov=0;
	responsiveVoice.speak('Hi. Do you want me to turn on Tableau voice. Yes or No.');
		  var commands = {
		  'yes': function() { tov=1;  responsiveVoice.speak('starting tableau voice'); startTableau();},
			'no': function() { tov=0;  responsiveVoice.speak('stoping tableau voice');stopTableau()},
			'1': function() { tov=1;  responsiveVoice.speak('starting tableau voice'); startTableau();},
			'0': function() { tov=0;  responsiveVoice.speak('stoping tableau voice');stopTableau()},
			'start tableau': function() { tov=1;  responsiveVoice.speak('starting tableau voice'); startTableau();},
			'stop tableau': function() { tov=0;  responsiveVoice.speak('stoping tableau voice');stopTableau()},
			
		 };
		 // remove all commands
		 annyang.removeCommands();
		 // Add commands to annyang
		 annyang.addCommands(commands);
  // Start listening.
  annyang.start();
  annyang.addCallback('error', function() {
 responsiveVoice.speak('There was an error!');
});
annyang.addCallback('errorNetwork', function() {
 responsiveVoice.speak('Network error');
});
annyang.addCallback('errorPermissionBlocked', function() {
 responsiveVoice.speak('permission blocked');
});
annyang.addCallback('errorPermissionDenied', function() {
 responsiveVoice.speak('permission denied');
});
annyang.addCallback('end', function() {
 responsiveVoice.speak('Speech Recognition engine stops');
});
annyang.addCallback('resultNoMatch', function() {
 responsiveVoice.speak('Command not recognized');
});
}

function startTableau()
{
annyang.removeCommands(['yes', 'now', 'start tableau']);
var cmd2 = {'stop tableau': function() { tov=0;  responsiveVoice.speak('stoping tableau voice');stopTableau()},
			'filter 2013': function() { yearFilter(2013); },
			'filter 2012': function() { yearFilter(2012); },
			'filter 2014': function() { yearFilter(2014); },
			'filter Men': function() { genderFilter('Men'); },
			'filter Women': function() { genderFilter('Women'); },
			'filter arts': function() { collegeFilter("Arts & Sciences"); },
			'filter business': function() { collegeFilter("Business"); },
		};
annyang.addCommands(cmd2);
}
function stopTableau()
{
annyang.removeCommands(['stop tableau']);
var cmd2 = {'start tableau': function() { tov=1;  responsiveVoice.speak('starting tableau voice'); startTableau();},};
annyang.addCommands(cmd2);
}