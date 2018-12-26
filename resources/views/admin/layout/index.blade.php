
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Goods后台管理</title>
<link rel="stylesheet" type="text/css" href="/admin/css/erweima-style.css" />

  <script type="text/javascript" src="/admin/js/jquery.js"></script>
  <script type="text/javascript" src="/admin/js/js.js"></script>
  <script type="text/javascript" src="/admin/js/area.js"></script>
 

<script type="text/javascript" src="/admin/js/jquery.js"></script>
<script type="text/javascript" src="/admin/js/js.js"></script>
<link rel="stylesheet" type="text/css" href="/admin/css/erweima-style.css" />
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/custom.js"></script>
<script src="/admin/js/bootstrap-datetimepicker.min.js"></script>
<script src="/admin/js/bootstrap-datetimepicker.zh-CN.js"></script>
</head>>

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
   @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{ session('success') }}</strong> 
      </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{ session('error') }}</strong> 
      </div>
    @endif

	<div class="left_slide_nav" style="width:18%">
    <div class="business">
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">用户管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/user" >用户列表</a></dd>
            <dd><a href="/admin/user/create" >添加用户</a></dd>
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">订单管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/indent" >订单列表</a></dd>
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">商品管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/goods/create">添加商品</a></dd>
            <dd><a href="/admin/goods">商品列表</a></dd>
            <dd><a href="shangpinleixing_list.html">商品类型</a></dd>
            <dd><a href="tianjiashuxing.html">商品属性</a></dd>
            <dd><a href="/admin/goods_show">商品回收站</a></dd>
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>

        <dl class="dl_list">
          <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">品牌管理</a ></dt><!--打开状态替换close为open-->
          <dd><a href="/admin/brand/create">添加品牌</a></dd>
         <dd><a href="/admin/brand">品牌列表</a></dd>
      <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->

         <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">类别管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/cates/index/create">添加类别</a></dd>
            <dd><a href="/admin/cates/index" >浏览类别</a></dd>
            
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
         <dl class="dl_list dl_3">
          <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">发货地址管理</a></dt><!--打开状态替换close为open-->
          <dd><a href="/admin/addr/create" >添加发货地址</a></dd>
          <dd><a href="/admin/addr" >发货地址列表</a></dd>
        </dl>
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">单据管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/Order/take" >收货单</a></dd>
            <dd><a href="/admin/Order/sales" >退款单</a></dd>
            <dd><a href="/admin/Order/single" >退款申请列表</a></dd>
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
