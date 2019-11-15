$(document).ready(function(){
	$('#selectAllBoxes').on('click',function(){

		$('.checkBoxes').prop("checked",!$('.checkBoxes').prop('checked'));

	});
});