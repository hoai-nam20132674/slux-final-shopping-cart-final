$(document).ready(function(){
  
  $(".enable_product").click(function(){
  	var id = $(this).attr('value');
  	$.ajax({
	      type:'GET',
	      url:'http://localhost:8000/admin/enable-product/'+id,
	      cache:true,
	      data:{"id":id},  
	   });
  });
  $(".disable_product").click(function(){
    var id = $(this).attr('value');
    $.ajax({
        type:'GET',
        url:'http://localhost:8000/admin/disable-product/'+id,
        cache:true,
        data:{"id":id},  
     });
  });
});