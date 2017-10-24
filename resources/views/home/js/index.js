$(function(){
	
	$(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:5,interTime:50});

	//内容替换
	$('.content_right').eq(0).css({'display':'block'}).siblings('.content_right').css({'display':'none'});
	$('.content_left .div2>ul>li>a').click(function(){
		$('.content_left .div2>ul>li>a').removeClass('color');
		$(this).addClass('color');
		$('.content_right').css({'display':'none'});
		$('.content_right').eq($(this).parent().index()).css({'display':'block'});
		
	})
	
	
	
					$('.ddddd').click(function(){
						$(this).parent().find(".bbbbb").toggle();
						$(this).parent().siblings().find(".bbbbb").hide();
							$('.bbbbb a').click(function(){
								$('.bbbbb a').removeClass('col');
								$(this).addClass('col');
								
							})
						
					});
					
					
					
					
					
					$(".m-nav-btn").click(function(){
						$(".mobeilNav").toggle();
					})
					
})
