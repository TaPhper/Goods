<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
	</head>
	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="images/big.jpg" /></div>
				<div class="login-box">
					<div class="am-tabs" id="doc-my-tabs">
						<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
							<li class="am-active"><a href="">邮箱注册</a></li>
							<li><a href="">手机号注册</a></li>
						</ul>
					<div class="am-tabs-bd">
				<div class="am-tab-panel am-active">
				@if (count($errors) > 0)
			      	<div class="alert alert-danger">
			          	<ul>
			              	@foreach ($errors->all() as $error)
			                 	<li>{{ $error }}</li>
			             	 @endforeach
			          	</ul>
			      	</div>
			    @endif
					<form method="post" action="/home/registering">
						{{ csrf_field() }}
					   	<div class="user-email">
							<label for="email"><i class="am-icon-envelope-o"></i></label>
							<input type="email" name="user_email" id="email"  placeholder="请输入邮箱账号">
			            </div>										
			            <div class="user-pass">
						    <label for="password"><i class="am-icon-lock"></i></label>
						    <input type="password" name="user_pwd" id="password" autocomplete=off placeholder="设置密码">
			            </div>										
			            <div class="user-pass">
						    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
						    <input type="password" name="user_repwd" id="passwordRepeat" autocomplete=off placeholder="确认密码">
			            </div>	
			            @if($errors->has('captcha'))
					        <div class="col-md-12">
					            <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
					        </div>
					    @endif
					    @if (session('error'))
					        <p class="text-danger text-left"><strong>{{ session('error') }}</strong></p>

					    @endif
						<div class="am-cf">
							<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
						</div>
		            </form>
		            <div class="login-links">
						<label for="reader-me">
							<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
						</label>
					</div>
                 
					
				</div>

				<div class="am-tab-panel">
					<form method="post" action="/home/insert">
					{{ csrf_field() }}
			            <div class="user-phone">
						    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
						    <input type="text" name="user_phone" id="phone" placeholder="请输入手机号">
			            </div>																			
						<div class="verification">
							<label for="code"><i class="am-icon-code-fork"></i></label>
							<input type="text" name="phone_code" id="code" placeholder="请输入验证码">
							<a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
							<span id="dyMobileButton">获取</span></a>
						</div>
			            <div class="user-pass">
						    <label for="password"><i class="am-icon-lock"></i></label>
						    <input type="password" name="user_pwd" id="user_pwd" placeholder="设置密码">
			            </div>										
			            <div class="user-pass">
						    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
						    <input type="password" name="user_repwd" id="user_repwd" placeholder="确认密码">
			            </div>
			            <div class="am-cf">
							<input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
						</div>
						<script type="text/javascript">
							// 发送验证码
							function sendMobileCode()
							{
								// 获取
								var phone = $('#phone').val();
								// 验证
								var phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
								if(!phone_preg.test(phone)){
									alert('手机格式不正确');
								}
								// alert(phone);
								$.get('/home/insert/sendMobileCode',{'phone':phone},function(data){
									console.log(data);
									if(data == false){
										alert('手机号已经注册');
									}
									if(data.code == 2){
										alert('短信发送成功');
									}
									
								},'json')

							}
							// 验证密码
							$('#user_pwd').blur(function(){
								var user_pwd = $('#user_pwd').val();
								// 验证
								var user_pwd_preg = /^[\w]{6,18}$/;
								if(!user_pwd_preg.test(user_pwd)){
									alert('请输入6-18位的数字字母组合');
								}
							});
							// 重复密码验证

						</script>
					</form>
					 	<div class="login-links">
							<label for="reader-me">
								<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
							</label>
				  		</div>
						
					
						<hr>
				</div>

					<script>
						$(function() {
						    $('#doc-my-tabs').tabs();
						  })
					</script>

					</div>
				</div>

				</div>
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
	</body>

</html>