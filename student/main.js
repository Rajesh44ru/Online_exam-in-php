
function dec_hr(){
	hr=parseInt($('.hr').html());
	if(hr!=0)
	{
		
	  if((hr -1)<10){
		  		$('.hr').html('0'+(hr-1));

		  
	  }else{
	  $('.hr').html(hr-1);}
		$('.min').html(59);
		$('.sec').html(59);
		
	}
	
	
	
}

function dec_min(){
	
	min=parseInt($('.min').html());
	if(min!==0)
	{
		if((min -1)<10){
					$('.min').html('0'+ (min-1));

		}
		else{
		$('.min').html(min-1);}
		
		$('.sec').html(59);
		
	}
	else{
		
		dec_hr();
	}
}
$(document).ready(function(){

	
var update =function(){
	$('.sec').each(function(){
		
		
		
		var count=parseInt($(this).html());
		if(count!=0){
			if((count -1)<10){
						$(this).html('0'+ (count-1));

			}
			else{
						$(this).html(count-1);

			}
				
			
		}
		else{
			
			dec_min();
		}
		
	});
	
	
	
};	
setInterval(update,1000);
	
});