$(document).ready(function($) {
//	$(".confirm").confirm();    
	$(".delete.confirm").confirm({
//		title:"Delete confirmation",
		text:"If you continue, you will not get any credit refunds. Do you really want to delete?",
	});
});