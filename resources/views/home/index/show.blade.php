<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>搜索页面</title>
		<link rel="stylesheet" type="text/css" href="/home/css/bootstrap.css">
		<script type="text/javascript" src="/home/js/bootstrap.js"></script>
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/home/js/script.js"></script>
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
				<div class="logo"><img src="/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/home/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form action="{{url('home/index/sear')}}" method="get">
						<input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit">
					</form>

				</div>
			</div>

			<div class="clear"></div>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								<span class="font-pale">相关搜索：</span>
								<a title="坚果" href="#">坚果</a>
								<a title="瓜子" href="#">瓜子</a>
								<a title="鸡腿" href="#">豆干</a>

							</div>
							<ul class="select">
								<p class="title font-normal">
									<span class="fl">{{$data or '全部商品'}}</span>
									<span class="total fl">搜索到<strong class="num">{{$count or $goods_count}}</strong>件相关商品</span>
								</p> 
								<div class="clear"></div>
								<li class="select-result">                 
									<dl>
										<dt>已选</dt>
										<dd class="select-no"></dd>
										<p class="eliminateCriteria">清除</p>
									</dl>
								</li>
								<div class="clear"></div>
								<li class="select-list">
									<dl id="select1">
										<dt class="am-badge am-round">品牌</dt>	
									
										 <div class="dd-conent">										
											<dd class="select-all selected"><a href="#">全部</a></dd>
											@foreach($brand as $k=>$v)
											<dd><a href="#" onclick="func({{$v->brand_id}})">{{$v->brand_name}}</a></dd>
											@endforeach
										 </div>
										<script type="text/javascript">
											function func(id)
											{
												$.get('/home/index/brand/'+id,{'id':id},function(msg){
														console.log(msg);
												},'json')
											}
										</script>
									</dl>
								</li>
								
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li>
									<a href="/home/index/sales/0" title="综合">综合排序</a> 
									 </li>
									<li>
									<a href="/home/index/sales/1" title="销量">销量排序</a>
									</li>
									<li>
									<a href="/home/index/sales/2" title="价格">价格升序</a>
									</li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									@foreach($goods as $k=>$v)
									
									<li>
										<a href="{{url('home/index/introduction',['id'=>$v->goods_id])}}">
										<div class="i-pic limit">
											<img src="/uploads/{{$v->goods_img}}" width="218" height="218" />											
											<p class="title fl">{{$v->gname}}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{$v->market_price}}</strong>
											</p>
											<p class="number fl">
												销量<span>{{$v->sales or '暂无'}}</span>
											</p>
										</div>
										</a>
									</li>
									
									@endforeach
								</ul>

							</div>
							<div class="search-side">

								<div class="side-title">
									经典搭配
								</div>
								@foreach($sales as $k=>$v)
								<li><a href="{{url('home/index/introduction',['id'=>$v->goods_id])}}">
									<div class="i-pic check">
										<img src="/uploads/{{$v->goods_img}}"  width="218" height="218" />
										<p class="check-title">{{$v->gname}}</p>
										<p class="price fl">
											<b>¥</b>
											<strong>{{$v->sales_grice}}</strong>
										</p> 
										<p class="number fl">
											销量&nbsp<span><b style="color: #ccc">{{$v->sales}}</b></span>
										</p>
									</div></a>
								</li>
								@endforeach

							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right" style="float: right;margin-right: 2px;">
								{{$goods->links()}}
							</ul>

						</div>
					</div>
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

			</div>

		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>

		<script>
			window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

	</body>

</html>