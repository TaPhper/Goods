<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>首页</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/home/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">
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
						<li><img src="/home/images/logobig.png" /></li>
					</div>

					<div class="search-bar pr">
						
						<form action="home/index/sear">
							<input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off">
							<input type="submit" id="ai-topsearch" class="submit am-btn" value="搜索" index="1">
						</form>
					</div>
				</div>

				<div class="clear"></div>
			</div>
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
							@foreach($slide as $k=>$v)
								<li class="banner1"><a href="/home/index/introduction"><img style="width: 779px;" src="/uploads/{{$v->slide_img}}" /></a></li>
							@endforeach
							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
                               
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>					
		        				
						<!--侧边导航 -->
 <div id="nav" class="navfull"> 
   <div class="area clearfix"> 
    <div class="category-content" id="guide_2"> 
     <div class="category"> 
      <ul class="category-list" id="js_climit_li">

      	@foreach($cates as $k=>$v)
       <li class="appliance js_toggle relative first"> 
        <div class="category-info"> 
         <h3 class="category-name b-category-name"><i><img src="/home/images/cake.png" /></i><a class="ml-22" title="点心" href="">{{$v->type_name}}</a></h3> 
         <em>&gt;</em>
        </div> 
        <div class="menu-item menu-in top"> 
         <div class="area-in"> 
          <div class="area-bg"> 
           <div class="menu-srot"> 
            <div class="sort-side"> 
            @foreach($v->sub as $kk=>$vv)
             <dl class="dl-sort"> 
              <dt>
               <span title="蛋糕">{{$vv->type_name}}</span>
              </dt> 
              	@foreach($vv->sub as $kkk=>$vvv)
              <dd>
               <a href="home/index/search/{{$vvv->type_id}}" title="{{$vvv->type_name}}"><span>{{$vvv->type_name}}</span></a>
              </dd> 
                @endforeach
             </dl> 
            @endforeach
            </div> 
            <div class="brand-side"> 
             <dl class="dl-sort">
              <dt>
               <span>实力商家</span>
              </dt> 
              <dd>
               <a rel="nofollow" title="呵官方旗舰店" target="_blank" href="introduction.html"><span class="red">呵官方旗舰店</span></a>
              </dd> 
              <dd>
               <a rel="nofollow" title="格瑞旗舰店" target="_blank" href="introduction.html"><span>格瑞旗舰店</span></a>
              </dd> 
              <dd>
               <a rel="nofollow" title="飞彦大厂直供" target="_blank" href="introduction.html"><span class="red">飞彦大厂直供</span></a>
              </dd> 
              <dd>
               <a rel="nofollow" title="红e&middot;艾菲妮" target="_blank" href="#"><span>红e&middot;艾菲妮</span></a>
              </dd> 
              <dd>
               <a rel="nofollow" title="本真旗舰店" target="_blank" href="introduction.html"><span class="red">本真旗舰店</span></a>
              </dd> 
              <dd>
               <a rel="nofollow" title="杭派女装批发网" target="_blank" href="#"><span class="red">杭派女装批发网</span></a>
              </dd> 
             </dl> 
            </div> 
           </div> 
          </div> 
         </div> 
        </div> <b class="arrow"></b>
    	</li>
       @endforeach
      </ul> 
     </div> 
    </div> 
   </div> 
  </div>
 
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/home/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="my.html"><img src="/home/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a href="#">
									<img src="/home/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/home/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="/home/info">
								@if(session()->get('login_user')['user_id'] == '0')
									<img src="/home/images/getAvatar.do.jpg">
								@else
									<img src="/uploads/{{session()->get('login_user')['uface']}}"  onerror="this.src='/home/images/getAvatar.do.jpg'">
								@endif
								</a>
								<em>
									@if(session()->get('login_user')['user_id'] == '0')
										Hi,<span class="s-name">小叮当</span>
										<a href="#"><p>点击更多优惠活动</p></a>	
									@else
										@if(empty(session()->get('login_user')['true_name']))
											Hi,<span class="s-name">小叮当</span>
											<a href="#"><p>点击更多优惠活动</p></a>	
										@else
											Hi,<span class="s-name">{{session()->get('login_user')['true_name']}}</span>
											<a href="#"><p>点击更多优惠活动</p></a>	
										@endif
									@endif
																	
								</em>
							</div>
							<div class="member-logout">
								@if(session()->get('login_user')['user_id'] == '0')
								<a class="am-btn-warning btn" href="/home/login">登录</a>
								<a class="am-btn-warning btn" href="/home/register">注册</a>
								@else
								<a class="am-btn-warning btn" href="/home/logout">退出</a>
								@endif
								
							</div>
							<div class="member-login">
								<a href="logistics.html"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="commentlist.html"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/home/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div> 
			<div class="shopMainbg"> 
				<div class="shopMain" id="shopmain"> 
				   	 <!--今日推荐 --> 
				    <div class="am-g am-g-fixed recommendation"> 
				    	<div class="clock am-u-sm-3" "=""> 
				           <img src="/home/images/2016.png " /> 
				           <p>今日<br />推荐</p> 
				    	</div> 
				    @foreach($TheDay as $k=>$v)
				    <div class="am-u-sm-4 am-u-lg-3 "> 
					    <div class="info "> 
						       <h3>{{$v->gname}}</h3> 
						       <h4>开年福利篇</h4> 
					    </div> 
				     	<div class="recommendationMain one"> 
				      		 <a href="/home/index/introduction/{{$v->goods_id}}"><img src="/uploads/{{$v->goods_img}}" title="点击查看详情"  width="120" height="120" /></a> 
				    	</div> 
				    </div> 
				    @endforeach
				    </div>
				</div>
			</div>
					

  
<div id="f2">
					<!--坚果-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>干果</h4>
							<h3>酥酥脆脆，回味无穷</h3>
							<div class="today-brands ">
								<a href="/home/index/sear?search=腰果">腰果</a>
								<a href="/home/index/sear?search=松子">松子</a>
								<a href="/home/index/sear?search=夏威夷果">夏威夷果 </a>
								<a href="/home/index/sear?search=碧根果">碧根果</a>
							</div>
							<span class="more ">
                    <a href="/home/index/introduction">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodThree ">
						<div class="am-u-sm-4 text-four list">
							<div class="word">
								
																
							</div>
							<a href="# ">
								<img src="/home/images/act1.png " />
								<div class="outer-con ">
									<div class="title ">
									
									</div>									
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-4 text-four">
							<a href="/home/index/introduction/{{$Mast[0]->goods_id}}">
								<img src="/uploads/{{$Mast[0]->goods_img}}" width="180" height="180" alt="商品暂无图片" title="点击购买" />
								<div class="outer-con ">
									<div class="title ">
										{{$Mast[0]->gname or '暂无商品'}}
									</div>								
									<div class="sub-title ">
										¥{{$Mast[0]->sales_grice or '暂无商品'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						<div class="am-u-sm-4 text-four sug">
							<a href="/home/index/introduction/{{$Mast[1]->goods_id}}">
								<img src="/uploads/{{$Mast[1]->goods_img}}"  title="点击购买" alt="商品暂无图片" width="180" height="180" />
								<div class="outer-con ">
									<div class="title ">
										{{$Mast[1]->gname or '暂无商品'}}
									</div>
									<div class="sub-title ">
										¥{{$Mast[1]->sales_grice or '暂无商品'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						
						<div class="am-u-sm-6 am-u-md-3 text-five big ">
							<a href='/home/index/introduction/{{$Mast[2]->goods_id or ""}}'>
								<img src="/uploads/{{$Mast[2]->goods_img or ''}}"  alt="商品暂无图片" width="194" height="194" />
								<div class="outer-con ">
									<div class="title ">
										{{$Mast[2]->gname or '暂无商品'}}
									</div>		
									<div class="sub-title ">
										¥{{$Mast[2]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>						
						<div class="am-u-sm-6 am-u-md-3 text-five ">
							<a href='/home/index/introduction/{{$Mast[3]->goods_id or ""}}'>
								<img src="/uploads/{{$Mast[3]->goods_img or ''}}" alt="商品暂无图片" width="180" height="180" />
								<div class="outer-con ">
									<div class="title ">
										{{$Mast[3]->gname or '暂无商品'}}
									</div>	
									<div class="sub-title ">
										¥{{$Mast[3]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>						
						<div class="am-u-sm-6 am-u-md-3 text-five sug">
							<a href='/home/index/introduction/{{$Mast[4]->goods_id or ""}}'>
								<img src="/uploads/{{$Mast[4]->goods_img or ''}}" alt="商品暂无图片" />
								<div class="outer-con ">
									<div class="title ">
										{{$Mast[4]->gname or '暂无商品'}}
									</div>
									<div class="sub-title ">
										¥{{$Mast[4]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						<div class="am-u-sm-6 am-u-md-3 text-five big ">
							<a href='/home/index/introduction/{{$Mast[5]->goods_id or ""}}'>
								<img src="/uploads/{{$Mast[5]->goods_img or '111'}}"  alt="商品暂无图片" width="194" height="194" />
								<div class="outer-con ">
									<div class="title ">
										{{$Mast[5]->gname or '暂无商品'}}
									</div>		
									<div class="sub-title ">
										¥{{$Mast[5]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
							
					</div>
					<div class="clear "></div>
</div>
<div id="f3">
					<!--饮料-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>饮料</h4>
							<h3>清凉一夏</h3>
							<div class="today-brands ">
								<a href="/home/index/sear?search=雪碧">雪碧</a>
								<a href="/home/index/sear?search=可乐">可乐</a>
								<a href="/home/index/sear?search=脉动">脉动 </a>
								<a href="/home/index/sear?search=水蜜桃">水蜜桃</a>
							</div>
							<span class="more ">
                    <a href="/home/index/introduction">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodThree ">
						<div class="am-u-sm-4 text-four list">
							<div class="word">
								
							</div>
							<a href="# ">
								<img src="/home/images/act1.png " />
								<div class="outer-con ">
									<div class="title ">
										
									</div>									
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-4 text-four">
							<a href="/home/index/introduction/{{$Drink[0]->goods_id}}">
								<img src="/uploads/{{$Drink[0]->goods_img}}" width="180" height="180" alt="商品暂无图片" title="点击购买" />
								<div class="outer-con ">
									<div class="title ">
										{{$Drink[0]->gname or '暂无商品'}}
									</div>								
									<div class="sub-title ">
										¥{{$Drink[0]->sales_grice or '暂无商品'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						<div class="am-u-sm-4 text-four sug">
							<a href="/home/index/introduction/{{$Drink[1]->goods_id or ''}}">
								<img src="/uploads/{{$Drink[1]->goods_img or ''}}"  title="点击购买" alt="商品暂无图片" width="180" height="180" />
								<div class="outer-con ">
									<div class="title ">
										{{$Drink[1]->gname or '暂无商品'}}
									</div>
									<div class="sub-title ">
										¥{{$Drink[1]->sales_grice or '暂无商品'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						
						<div class="am-u-sm-6 am-u-md-3 text-five big ">
							<a href='/home/index/introduction/{{$Drink[2]->goods_id or ""}}'>
								<img src="/uploads/{{$Drink[2]->goods_img or ''}}"  alt="商品暂无图片" width="194" height="194" />
								<div class="outer-con ">
									<div class="title ">
										{{$Drink[2]->gname or '暂无商品'}}
									</div>		
									<div class="sub-title ">
										¥{{$Drink[2]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>						
						<div class="am-u-sm-6 am-u-md-3 text-five ">
							<a href='/home/index/introduction/{{$Drink[3]->goods_id or ""}}'>
								<img src="/uploads/{{$Drink[3]->goods_img or ''}}" alt="商品暂无图片" width="180" height="180" />
								<div class="outer-con ">
									<div class="title ">
										{{$Drink[3]->gname or '暂无商品'}}
									</div>	
									<div class="sub-title ">
										¥{{$Drink[3]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>						
						<div class="am-u-sm-6 am-u-md-3 text-five sug">
							<a href='/home/index/introduction/{{$Drink[4]->goods_id or ""}}'>
								<img src="/uploads/{{$Drink[4]->goods_img or ''}}" alt="商品暂无图片" />
								<div class="outer-con ">
									<div class="title ">
										{{$Drink[4]->gname or '暂无商品'}}
									</div>
									<div class="sub-title ">
										¥{{$Drink[4]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						<div class="am-u-sm-6 am-u-md-3 text-five big ">
							<a href='/home/index/introduction/{{$Drink[5]->goods_id or ""}}'>
								<img src="/uploads/{{$Drink[5]->goods_img or '111'}}"  alt="商品暂无图片" width="194" height="194" />
								<div class="outer-con ">
									<div class="title ">
										{{$Drink[5]->gname or '暂无商品'}}
									</div>		
									<div class="sub-title ">
										¥{{$Drink[5]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
							
					</div>
					<div class="clear "></div>
</div>  
   <div id="f4">
					<!--手机-->
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>手机</h4>
							<h3>大屏,大容量</h3>
							<div class="today-brands ">
								<a href="/home/index/sear?search=华为">华为</a>
								<a href="/home/index/sear?search=vivo">vivo</a>
								<a href="/home/index/sear?search=一加">一加 </a>
								<a href="/home/index/sear?search=苹果">苹果</a>
							</div>
							<span class="more ">
                    <a href="/home/index/introduction">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodThree ">
						<div class="am-u-sm-4 text-four list">
							<div class="word">
								
							</div>
							<a href="# ">
								<img src="/home/images/act1.png " />
								<div class="outer-con ">
									<div class="title ">
										
									</div>									
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<div class="am-u-sm-4 text-four">
							<a href="/home/index/introduction/{{$Phone[0]->goods_id}}">
								<img src="/uploads/{{$Phone[0]->goods_img}}" width="180" height="180" alt="商品暂无图片" title="点击购买" />
								<div class="outer-con ">
									<div class="title ">
										{{$Phone[0]->gname or '暂无商品'}}
									</div>								
									<div class="sub-title ">
										¥{{$Phone[0]->sales_grice or '暂无商品'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						<div class="am-u-sm-4 text-four sug">
							<a href="/home/index/introduction/{{$Phone[1]->goods_id or ''}}">
								<img src="/uploads/{{$Phone[1]->goods_img or ''}}"  title="点击购买" alt="商品暂无图片" width="180" height="180" />
								<div class="outer-con ">
									<div class="title ">
										{{$Phone[1]->gname or '暂无商品'}}
									</div>
									<div class="sub-title ">
										¥{{$Phone[1]->sales_grice or '暂无商品'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						
						<div class="am-u-sm-6 am-u-md-3 text-five big ">
							<a href='/home/index/introduction/{{$Phone[2]->goods_id or ""}}'>
								<img src="/uploads/{{$Phone[2]->goods_img or ''}}"  alt="商品暂无图片" width="194" height="194" />
								<div class="outer-con ">
									<div class="title ">
										{{$Phone[2]->gname or '暂无商品'}}
									</div>		
									<div class="sub-title ">
										¥{{$Phone[2]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>						
						<div class="am-u-sm-6 am-u-md-3 text-five ">
							<a href='/home/index/introduction/{{$Phone[3]->goods_id or ""}}'>
								<img src="/uploads/{{$Phone[3]->goods_img or ''}}" alt="商品暂无图片" width="180" height="180" />
								<div class="outer-con ">
									<div class="title ">
										{{$Phone[3]->gname or '暂无商品'}}
									</div>	
									<div class="sub-title ">
										¥{{$Phone[3]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>						
						<div class="am-u-sm-6 am-u-md-3 text-five sug">
							<a href='/home/index/introduction/{{$Phone[4]->goods_id or ""}}'>
								<img src="/uploads/{{$Phone[4]->goods_img or ''}}" alt="商品暂无图片" />
								<div class="outer-con ">
									<div class="title ">
										{{$Phone[4]->gname or '暂无商品'}}
									</div>
									<div class="sub-title ">
										¥{{$Phone[4]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						<div class="am-u-sm-6 am-u-md-3 text-five big ">
							<a href='/home/index/introduction/{{$Phone[5]->goods_id or ""}}'>
								<img src="/uploads/{{$Phone[5]->goods_img or '111'}}"  alt="商品暂无图片" width="194" height="194" />
								<div class="outer-con ">
									<div class="title ">
										{{$Phone[5]->gname or '暂无商品'}}
									</div>		
									<div class="sub-title ">
										¥{{$Phone[5]->sales_grice or '暂无报价'}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
							
					</div>
					<div class="clear "></div>
</div>  
   


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>

		</div>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>

		<script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="basic/js/quick_links.js "></script>
	</body>

</html>