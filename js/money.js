$(function() {
	var money = new Array(
		[2500, '€ Estimated', '#2c4390'],
		[554,  '€ Collected so far', '#666']
	);
	$('#money').jqBarGraph({
		data: money,
		colors: ['#2c4390'] ,
		showValuesColor: '#2c4390',
		width: 320,
		height: 280
	});
});
