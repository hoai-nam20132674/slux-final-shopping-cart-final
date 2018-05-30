$(document).ready(function(){
	$(".review").click(function(){
	  	var id = $(this).attr('id');
	  	$.ajax({
		      type:'GET',
		      url:'http://localhost:8000/admin/review/'+id,
		      cache:true,
		      data:{"id":id},  
		});
	});
	$(".unreview").click(function(){
	  	var id = $(this).attr('id');
	  	$.ajax({
		      type:'GET',
		      url:'http://localhost:8000/admin/unreview/'+id,
		      cache:true,
		      data:{"id":id},  
		});
	});
});