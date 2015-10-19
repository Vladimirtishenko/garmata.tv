$(function () {
	$('input.newDate').pickmeup({
		position		: 'left',
		change			: function (){location.href = 'http://garmata.tv/site/news/date/'+$(".newDate").val()+'.html';}
	});

});
