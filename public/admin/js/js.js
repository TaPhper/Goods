$(function(){
	$('#xg_btn').click(function(){
		$('.pop_layer').show();
		});
    $('.pop-close,.cancel-btn').click(function(){
		$('.pop_layer').hide();
		});
	$('.dl_list>dt').click(function(){
	 if($(this).hasClass('dl_open')){
		$(this).removeClass('dl_open').addClass('dl_close').siblings('dd').hide();
		
	 }else{
		$(this).removeClass('dl_close').addClass('dl_open').siblings('dd').show();
	 }
	});
	$('.dl_list>dd>a').click(function(){
		$(this).parent().addClass('dd_current').siblings().removeClass('dd_current').parent().siblings().find('.dd_current').removeClass('dd_current');
	});
	$('.tabtit>span').click(function(){		
		$(this).addClass('active').siblings().removeClass('active');
		var i=$(this).index();
		$('.tab-con>div').eq(i).addClass('cur').siblings().removeClass('cur');
	});
})
