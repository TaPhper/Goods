<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/address.js"></script>

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
					<div class="menu-hd"><a href="collection.html" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>
			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="images/logo.png" /></div>
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
			<div class="concent">
				<!--地址 -->
				<form action="/home/shop/indent" method="post">
				{{ csrf_field()}}
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
					
						</div>
						<div class="clear"></div>
						<ul>
							@foreach($addr as $k=>$v)
							<div class="per-border"></div>
							<li class="user-addresslist {{$v->default==1 ? 'defaultAddr':''}}" ids="{{$v->id}}" default="{{$v->default}}">
								<div class="address-left">
									<div class="user">

										<span class="buy-address-detail">   
                   						<span class="buy-users" ids="{{$v->id}}">{{$v->order_name}}</span>
										<span class="buy-phone">{{$v->tel}}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   		<span class="province">{{$v->addr}}{{$v->detail}}</span>
										</span>

										</span>
									</div>
								</div>
								<div class="address-right">
									<a href="person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>
							</li>
							
						@endforeach
						</ul>
						<div class="clear"></div>
					</div>
					<!--物流 -->
					<div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN"><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN"><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN"><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card" ids="1"><input type="text"  style="display:none;" name="payway" /><img src="/home/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq" ids="2"><input type="text"  style="display:none;" name="payway" /><img src="/home/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao" ids="3"><input type="text"  style="display:none;" name="payway" value="1" /><img src="/home/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					
					<div class="concent">
					
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

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
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
							
							<tr class="item-list">

								<div class="bundle  bundle-last">
								@foreach($shop as $k=>$v)
									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img width="80" height="80" src="/uploads/{{$v->goods_img}}" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title" data-point="tbcart.8.11">{{$v->gname}}</a><input type="hidden" name="goods_id{{$v->good_id}}" value="{{$v->good_id}}"  />
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">颜色：12#川南玛瑙</span>
														<span class="sku-line">包装：裸装</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">{{$v->grice}}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min" style="width:30px;background:#bbb" money="{{$v->grice}}" type="button" value="-" />
															<input class="text_box" ids="{{$v->good_id}}" name="num" type="text" value="{{$v->gnum}}" style="width:30px;" />
															<input class="add" style="width:30px;background:#bbb" money="{{$v->grice}}"  type="button" value="+" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" id="money{{$v->good_id}}" class="J_ItemSum">{{$v->sales_grice}}</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														<b class="sys_item_freprice">包邮</b>
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
								@endforeach
							</tr>
							<div class="clear"></div>
							</div>
							
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum">244.00</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">244.00</em>
											</span>
										</div>
										
										<div id="holyshit268" class="pay-address">
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="street">{{$default->addr}}</span>
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user">{{$default->order_name}} </span>
												<span class="buy-phone">{{$default->tel}}</span>
												</span>
											</p>
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<input style="float:right" class="btn-go" type="submit" tabindex="0" value="提交订单">
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
					</form>
				</div>
				<script type="text/javascript">
					var zsum = 0;
		            //获取商品的小计
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
		           	$('.pay-sum').html(zsum);
		           	$('#J_ActualFee').html(zsum);


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
		                $('.pay-sum').html(zsum);
		           		$('#J_ActualFee').html(zsum);

		            });

		           	// 手动修改

		           	$('.text_box').change(function(){
		           		var user_id = {{session()->get('login_user')['user_id']}};
						var obj = $(this);
                        var num = obj.val();
		            	var html = obj.next().attr('money');
		            	var id = obj.attr('ids');
		            	if(num <= 0){
		            		$(this).val('1');
		            		var num = obj.val();
		            		$.get('/home/shopcart/up',{'id':id,'num':num,'html':html,'user_id':user_id},function(data){
				            		if(data){
				            			$('#money'+id).html(data);
				            			var zsum = 0;
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
						              	$('.pay-sum').html(zsum);
						                $('#J_ActualFee').html(zsum);
				            		}
				            	});
		            		alert('选购的商品最少有1件');
		            		return;
		            	}
		            	$.get('/home/shopcart/up',{'id':id,'num':num,'html':html,'user_id':user_id},function(data){
		            		if(data){
		            			$('#money'+id).html(data);
		            			var zsum = 0;
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
				              	$('.pay-sum').html(zsum);
				                $('#J_ActualFee').html(zsum);
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
		            			var tot = parseInt($('#J_ActualFee').html());
		            			$('#J_ActualFee').html(tot-parseInt(html));
		            			var top = parseInt($('.pay-sum').html());
		            			$('.pay-sum').html(tot-parseInt(html));
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
		            			var tot = parseInt($('#J_ActualFee').html());
		            			$('#J_ActualFee').html(tot+parseInt(html));
		            			var top = parseInt($('.pay-sum').html());
		            			$('.pay-sum').html(tot+parseInt(html));
		            		}
		            	});
					})
					$('.user-addresslist').click(function(){
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						var user_id = {{session()->get('login_user')['user_id']}};
				        var id = $(this).attr('ids');
				        // alert(id);
						$.get('/home/shop/addr',{'id':id,'user_id':user_id},function(msg){
								var id = $('.defaultAddr').attr('ids');
								$('.buy-users').each(function(){
									if($(this).attr('ids') == id){
										var name = $(this).html();
										$('.buy-user').html(name);
									}
								})
							
						})
					})


					// $('.OP_LOG_BTN').click(function(){
					// 	$($this).next().html('<input type="text" name="payway" value="/>')
					// })
					// 银联 1  微信 2  支付宝 3 
					$('.pay').click(function(){
						var a = $(this).attr('ids');
						$(this).attr('selected',true);
						// alert(a);
						$(this).children().val(a);
						
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
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="email">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<select data-am-selected>
									<option value="a">浙江省</option>
									<option value="b">湖北省</option>
								</select>
								<select data-am-selected>
									<option value="a">温州市</option>
									<option value="b">武汉市</option>
								</select>
								<select data-am-selected>
									<option value="a">瑞安区</option>
									<option value="b">洪山区</option>
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger">保存</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
	</body>

</html>