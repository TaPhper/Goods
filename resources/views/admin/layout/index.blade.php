<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$common_data['net_key'] or 'lamp'}}</title>
<link rel="stylesheet" type="text/css" href="/admin/css/erweima-style.css" />
<script type="text/javascript" src="/admin/js/jquery.js"></script>
<script type="text/javascript" src="/admin/js/js.js"></script>
<script type="text/javascript" src="/admin/js/area.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/custom.js"></script>
<script src="/admin/js/bootstrap-datetimepicker.min.js"></script>
<script src="/admin/js/bootstrap-datetimepicker.zh-CN.js"></script>
</head>

</head>

<body>
<div class="wrap">
	<div class="whole-top">  
    <p class="name"><img src="/uploads/{{$common_data['net_logo']}}" style="margin-top:-10px;border-radius:20px 200px;" width="235" height="90" onerror="this.src='/admin/images/logobig.png'" />{{$common_data['net_name']}}后台管理系统</p>

    <div class="login">
    <!--登录后 start-->
    <div class="login-after">
      <span class="txt">欢迎admin登录，当前身份：超级管理员</span>
      <a class="exit">退出</a>      
    </div>
    <p class="time"><b id="time"></b></p>
      <script type="text/javascript">
    
    function run(){
      var d = new Date;
      var n = d.getFullYear();
      var y = d.getMonth()+1;
      var r = d.getDate();
      var s = d.getHours();
      var f = d.getMinutes();
      var m = d.getSeconds();
      if(m < 10){
        m = '0'+m;
      }
      if(s < 10){
        s = '0'+s;
      }
      var str = n+'-'+y+'-'+r+'&nbsp;&nbsp;'+s+':'+f+':'+m;
      var content = document.getElementById('time');
      content.innerHTML = str;
    }
    run();

    setInterval("run()",1000);
    
  </script>
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
<<<<<<< HEAD
        <dl class="dl_list">

            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">网站管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/net" >网站配置</a></dd>
           

            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">员工管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/admins/create" >添加员工</a></dd>
            <dd><a href="/admin/admins" >员工列表</a></dd>
            <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
        </dl>
        <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">职位管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/character/create" >添加职位</a></dd>
            <dd><a href="/admin/character" >职位列表</a></dd>

=======

         <dl class="dl_list">
            <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">信息管理</a></dt><!--打开状态替换close为open-->
            <dd><a href="/admin/comment">评价列表</a></dd>
           
>>>>>>> laravel/jian
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
