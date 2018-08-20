$(function(){
	$("ul.nav li.sub").hover(function(){   
		$("ul.nav li.sub .subNav").stop(false,true);
		$(this).find(".subNav").slideDown(800);
	},function(){
		$("ul.nav li.sub .subNav").stop(false,true);
		$(this).find(".subNav").slideUp(400);	
	});	  
    });


 $(function(){
        $('.meun-nav').click(function(){
            if($('.meunCont').is(':hidden'))
            {
                $('.meunCont').slideDown('800');
            }else{
                $('.meunCont').slideUp('800');
            }
        });
    });