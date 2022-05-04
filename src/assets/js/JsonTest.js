$(function() {
	$.getJSON('https://ss-pws-dev.com/app/controller/GetDataFromDB.php', function(data) {
		Object.keys(data).forEach(function (key) {
			$('#contents').append('<ul id="' + key + '">');
			data[key].forEach(function (value, index, array) {
				$(`#${key}`).append('<li>' + value + '</li>');
			});
		});
	});
});