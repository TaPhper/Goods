<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>购物车页面</title>
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="js/jquery.js"></script>

		<link rel="stylesheet" type="text/css" href="/admin/css/erweima-style.css" />

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">

			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						@if(session()->get('login_user')['user_id'] == '0')

						<a href="/home/login" target="_top" class="h">亲，请登录</a>
						<a href="/home/register" target="_top">免费注册</a>
						@else
						<a href="#" target="_top" class="h">欢迎
						@if(session()->get('login_user')['true_name'])
						  {{session()->get('login_user')['true_name']}}
						@else
						会员
						@endif
						</a>
						<a href="/home/logout" target="_top">退出</a>
						@endif
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="/home/info" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="/home/shopcart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">{{session()->get('shop_count')}}</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="/home/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>


			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					@if($nshop)
					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="clear"></div>
							<div class="bundle-main">
							@foreach($shop as $k=>$v)
								<ul class="item-content">							

									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input type="checkbox" name="check[]"  checked class="car_check"  />
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
											<img src="/uploads/{{$v->goods_img}}" width="80" height="80" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" title="{{$v->gname}}" class="item-title J_MakePoint" id="gnames" data-point="tbcart.8.11">{{$v->gname}}</a>

											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">颜色：12#川南玛瑙</span>
											<span class="sku-line">包装：裸装</span>
											<!--<span tabindex="0" class="btn-edit-sku theme-login">修改</span>-->
											<!--<i class="theme-login am-icon-sort-desc"></i>-->
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original"></em>
												</div>
												<div class="price-line">

													<em class="J_Price price-now" tabindex="0"></em>

													<em class="J_Price price-now" id="sales_grices" tabindex="0">{{$v->grice}}</em>

												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl" id="">
													<input class="min" style="width:30px;background:#bbb" money="{{$v->grice}}" type="button" value="-" />
													<input class="text_box" ids="{{$v->good_id}}" name="" type="text" value="{{$v->gnum}}" style="width:30px;" />
													<input class="add" style="width:30px;background:#bbb" money="{{$v->grice}}"  type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" id="money{{$v->good_id}}" class="J_ItemSum">{{$v->sales_gnum}}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a href="/home/edit_collect/{{$v->good_id}}" title="移入收藏夹" class="btn-fav" >移入收藏夹</a>

											<a href="/home/shopcart/destroy/{{$v->id}}" data-point-url="#" class="delete" title="删除">删除</a>
										</div>
									</li>

								</ul>

							@endforeach					
					@else
					<div class="cart-empty">

												
					

			        <h2 style="float:left">您的购物车还是空的!</h2>
		          	<div class="btn" style="margin-top:10px;margin-left:10px;">
						<a href="/"   class="btn btn-info" >
						<span >马上去购物</span></a>
					</div>
					@endif

				<div class="clear"></div>


				<div class="float-bar-wrapper">
					<!-- <div id="J_SelectAll2" class="select-all">
						<div class="cart-checkbox">
							<input type="checkbox" name=""  checked class="check_all"  />
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span >全选</span>
					</div>
					<div class="operations">
						<a href="#" hidefocus="true" class="deleteAll">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div> -->
					<div class="float-bar-right">
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong id="" class="price">¥<em id="J_Total">0</em></strong>
						</div>
						<div class="btn-area">
							@if($nshop)
							<a href="/home/shop/pay" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
							@else
							<a href="javascript:;" id="J_Go1" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
							@endif
						</div>
					</div>

				</div>
				<script type="text/javascript">
					var zsum = 0;
		            //获取商品的小计
		          	$('.text_box').each(function(){
			            var id = $(this).attr('ids');

			            var num = $(this).val();
			            var html = $(this).next().attr('money');
			            // var html = $('#sales_grices').val();
			            var xsum = parseInt(num)*parseInt(html);
			           
			          	$('#money'+id).html(xsum);
			            zsum += xsum;
		            
		           	});
		           	$('#J_Total').html(zsum);

		           	// 选中的商品
		           	$('.car_check').click(function(){
		           		var zsum = 0;
		                if($(this).prop('checked')){
		                  	$(this).prop('checked',true);
		                }else{
		                  	$(this).prop('checked',false);
		                }
		                $("input:checked").each(function(){
		                  	var obj = $(this).parent().parent().parent().find('.text_box');
		                  	var id = obj.attr('ids');
				          	var good_num = obj.val(); 
				          	var good_price = parseInt(obj.next().attr('money'));
				          	var xsum = parseInt(good_price*good_num);
				          	
				          	zsum += xsum;
		              	})
		                $('#J_Total').html(zsum);

		            });

		           	// 手动修改
		           	$('.text_box').change(function(){
		           		var user_id = {{session()->get('login_user')['user_id']}};
						var obj = $(this);
                        var num = obj.val();
		            	var html = obj.next().attr('money');
		            	var id = obj.attr('ids');
		            	$.get('/home/shopcart/up',{'id':id,'num':num,'html':html,'user_id':user_id},function(data){
		            		if(data){
		            			$('#money'+id).html(data);
		            			$('.text_box').each(function(){
						            var id = $(this).attr('ids');
						            // alert(id);
						            var num = $(this).val();
						            var html = $(this).next().attr('money');
						            // var html = $('#sales_grices').val();
						            var xsum = parseInt(num)*parseInt(html);
						           
						          	$('#money'+id).html(xsum);
						            zsum += xsum;
					            
					           	});
				                $('#J_Total').html(zsum);
		            		}
		            	});
		           	})
		           	// 点击减
					$('.min').click(function(){
						var user_id = {{session()->get('login_user')['user_id']}};
						var obj = $(this);
                        var num = obj.next().val()-1;
		            	var html = $(this).attr('money');
		            	var id = obj.next().attr('ids');
		            	if(num <= 0){
		            		alert('选购的商品最少有1件');
		            		$(this).obj.next()('value','1');
		            		return;
		            	}
		            	$.get('/home/shopcart/down',{'id':id,'num':num,'html':html,'user_id':user_id},function(data){
		            		if(data){
		            			$('#money'+id).html(data);
		            			var tot = parseInt($('#J_Total').html());
		            			$('#J_Total').html(tot-parseInt(html));
		            		}
		            	});
					})
					// 点击加
					$('.add').click(function(){
						var user_id = {{session()->get('login_user')['user_id']}};
						var obj = $(this);
                        var num = parseInt(obj.prev().val())+parseInt(1);
                        // alert(num);
		            	var html = $(this).attr('money');
		            	var id = obj.prev().attr('ids');
		            	$.get('/home/shopcart/up',{'id':id,'num':num,'html':html,'user_id':user_id},function(data){
		            		if(data){
		            			$('#money'+id).html(data);
		            			var tot = parseInt($('#J_Total').html());
		            			$('#J_Total').html(tot+parseInt(html));
		            		}
		            	});
					})


					$('#J_Go1').click(function(){
						alert("购物车没有宝贝，将无法结算");
						var user_id = {{session()->get('login_user')['user_id']}};
					})

					$('#J_Go').click(function(){
						if(!$('.car_check').is(':checked')){
		                	alert("如果没有选择宝贝，将无法结算");
		                	return false;
		                }
		                var num = new Array();
		                $("input:checked").each(function(){ 
		                  	var obj = $(this).parent().parent().parent().find('.text_box');
		                  	var id = obj.attr('ids');	
		                  	num.push(id);
		              	})
		              	var id1 = num.join(" ")
		                // alert(id1);
	                  	$('#J_Go').attr('href','/home/shop/pay?id='+id1); 
					})	
				</script>
					
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					<!--<form class="theme-signin" name="loginform" action="" method="post">-->

						<!--<div class="theme-signin-left">-->

							<!--<li class="theme-options">-->
								<!--<div class="cart-title">颜色：</div>-->
								<!--<ul>-->
									<!--<li class="sku-line selected">12#川南玛瑙<i></i></li>-->
									<!--<li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>-->
								<!--</ul>-->
							<!--</li>-->
							<!--<li class="theme-options">-->
								<!--<div class="cart-title">包装：</div>-->
								<!--<ul>-->
									<!--<li class="sku-line selected">包装：裸装<i></i></li>-->
									<!--<li class="sku-line">两支手袋装（送彩带）<i></i></li>-->
								<!--</ul>-->
							<!--</li>-->
							<!--<div class="theme-options">-->
								<!--<div class="cart-title number">数量</div>-->
								<!--<dd>-->
									<!--<input class="min am-btn am-btn-default" name="" type="button" value="-" />-->
									<!--<input class="text_box" name="" type="text" value="1" style="width:30px;" />-->
									<!--<input class="add am-btn am-btn-default" name="" type="button" value="+" />-->
									<!--<span  class="tb-hidden">库存<span class="stock">1000</span>件</span>-->
								<!--</dd>-->

							<!--</div>-->
							<!--<div class="clear"></div>-->
							<!--<div class="btn-op">-->
								<!--<div class="btn am-btn am-btn-warning">确认</div>-->
								<!--<div class="btn close am-btn am-btn-warning">取消</div>-->
							<!--</div>-->

						<!--</div>-->
						<!--<div class="theme-signin-right">-->
							<!--<div class="img-info">-->
								<!--<img src="images/kouhong.jpg_80x80.jpg" />-->
							<!--</div>-->
							<!--<div class="text-info">-->
								<!--<span class="J_Price price-now">¥39.00</span>-->
								<!--<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>-->
							<!--</div>-->
						<!--</div>-->

					<!--</form>-->
				</div>
			</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>