$(document).ready(function(){
	$('#selectAllBoxes').on('click',function(){

		$('.checkBoxes').prop("checked",!$('.checkBoxes').prop('checked'));

	});
});


var div_box="<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box);
$('#load-screen').delay(700).fadeOut(500,function(){
	$(this).remove();
});