$(document).ready( function() {
 done();
});
 
function done() {
	  setTimeout( function() { 
	  updates(); 
	  done();
	  }, 200);
}
 
function updates() {
	 $.getJSON("json_fetch.php", function(data) {
       $("tbody").empty();
	   $.each(data.result, function(){
	    $("tbody").append("<tr><td>"+this['first_name']+"</td><td>"+this['last_name']+"</td><td>Phone: "+this['phone']+"</td><td><div class='deleteBtn customBtn'><a href='delete.php?del=$subject[id]'><button class='btn btn-default' type='submit'>Delete</button></a></div></td></tr>");
	   });
 });
}