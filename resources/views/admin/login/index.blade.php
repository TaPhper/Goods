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
				<input type="text" id="yzm" class="txt_input3" onfocus="if (value ==&#39;******&#39;){value =&#39;&#39;}" onblur="if (value ==&#39;&#39;){value=&#39;******&#39;}"><img src="images/YZM.png" width="100" height="30" style=" vertical-align:middle" autocomplete="off"/>
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