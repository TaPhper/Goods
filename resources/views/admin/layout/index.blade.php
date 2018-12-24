<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Goods后台管理</title>
<link rel="stylesheet" type="text/css" href="/admin/css/erweima-style.css" />
  <script type="text/javascript" src="/admin/js/jquery.js"></script>
  <script type="text/javascript" src="/admin/js/js.js"></script>
</head>

<body>
<div class="wrap">
	<div class="whole-top">
    <p class="name"><img src="/admin/images/logobig.png" />Goods 后台管理系统</p>

    <div class="login">
    <!--登录后 start-->
    <div class="login-after">
      <span class="txt">欢迎admin登录，当前身份：超级管理员</span>
      <a class="exit">退出</a>      
    </div>
  </div>
  </div>
</div>
<div class="" style=" padding-top:10px" >

	<div class="left_slide_nav" style="width:18%">
    <div class="business">
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">用户管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/user/index" >用户列表</a></dd>
            <dd><a href="shangpin_list.html" >添加用户</a></dd>
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">商品管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/goods/create">添加商品</a></dd>
            <dd><a href="/admin/goods">商品列表</a></dd>
            <dd><a href="shangpinleixing_list.html">商品类型</a></dd>
            <dd><a href="tianjiashuxing.html">商品属性</a></dd>
            <dd><a href="shangpinhuishouzhan.html">商品回收站</a></dd>
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
        <dl class="dl_list">
          <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">品牌管理</a ></dt><!--打开状态替换close为open-->
          <dd><a href="/admin/brand/create">添加品牌</a></dd>
         <dd><a href="/admin/brand">品牌列表</a></dd>
      <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
    </div>
	</div>
	<div style="float:right; width:82%; height:1000px;" >
	    
		@section('content')
			
			
		@show
	</div>
</div>
</body>
</html>
