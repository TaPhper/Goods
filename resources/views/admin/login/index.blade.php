<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wopop</title>

<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="login">
<div class="login_logo"><img src="images/logobig.png"></div>
<div class="login_m">
	<form action="/admin/logining" method="post">
	{{ csrf_field() }}
	<div class="login_boder">
		<div class="login_padding">
			<h2>用户名</h2>
			<label>
				<input type="text" name="admin_name" id="admin_name" class="txt_input txt_input2" value="" autocomplete="off">
			</label>
			<h2>密码</h2>
			<label>
				<input type="password" name="admin_pwd" id="userpwd" class="txt_input" autocomplete="off">
			</label>
            <h2>验证码</h2>
			<label>
				<input type="text" id="yzm" class="txt_input3" autocomplete=off class="form-control {{$errors->has('captcha')?'parsley-error':''}}" name="captcha" >
				<img src="{{captcha_src()}}"  onclick="this.src='{{captcha_src()}}'+Math.random()" style=" vertical-align:middle">
			    @if($errors->has('captcha'))
			        <div class="col-md-12">
			            <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
			        </div>
			    @endif
			    @if (session('error'))
			        <p class="text-danger text-left"><strong>{{ session('error') }}</strong></p>

			    @endif
			</label>
			<div class="rem_sub">
				<label>
					<input type="submit" class="sub_button" name="button" id="button" value="登录" style="opacity: 0.7;">
				</label>
			</div>
		</div>
	</div><!--login_boder end-->
	</form>
</div><!--login_m end-->

<br />
<br />


</body>
</html>