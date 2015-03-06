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
       $("ul").empty();
	   $.each(data.result, function(){
	    $("ul").append("<li>First name: "+this['first_name']+"</li>
                            <li>Last name: "+this['last_name']+"</li>
                            <li>Phone: "+this['phone']+"</li>
                            <br />");
	   });
 });
}