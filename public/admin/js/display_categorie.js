$(document).ready(function(){
  
  $(".enable_categorie").click(function(){
  	var id = $(this).attr('value');
  	$.ajax({
	      type:'GET',
	      url:'http://localhost:8000/admin/enable-categorie/'+id,
	      cache:true,
	      data:{"id":id},  
	   });
  });
  $(".disable_categorie").click(function(){
    var id = $(this).attr('value');
    $.ajax({
        type:'GET',
        url:'http://localhost:8000/admin/disable-categorie/'+id,
        cache:true,
        data:{"id":id},  
     });
  });
});