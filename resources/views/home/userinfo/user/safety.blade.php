@extends('home.userinfo.layout.layout')
@section('content')
<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<img class="am-circle am-img-thumbnail" src="images/getAvatar.do.jpg" alt="" />
							</div>

							

							<div class="info-m">
								<div><b>用户名：<i>小叮当</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>

						<div class="check">
							<ul>
								<li>
									<i class="i-safety-lock"></i>
									<div class="m-left">
										<div class="fore1">登录密码</div>
										<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
									</div>
									<div class="fore3">
										<a href="/home/password">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								</li>
								<!--<li>-->
									<!--<i class="i-safety-wallet"></i>-->
									<!--<div class="m-left">-->
										<!--<div class="fore1">支付密码</div>-->
										<!--<div class="fore2"><small>启用支付密码功能，为您资产账户安全加把锁。</small></div>-->
									<!--</div>-->
									<!--<div class="fore3">-->
										<!--<a href="setpay.html">-->
											<!--<div class="am-btn am-btn-secondary">立即启用</div>-->
										<!--</a>-->
									<!--</div>-->
								<!--</li>-->
								<li>
									<i class="i-safety-iphone"></i>
									<div class="m-left">
										<div class="fore1">手机验证</div>
										<div class="fore2"><small>您验证的手机：186XXXXXXXX 若已丢失或停用，请立即更换</small></div>
									</div>
									<div class="fore3">
										<a href="/home/phone">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-mail"></i>
									<div class="m-left">
										<div class="fore1">邮箱验证</div>
										<div class="fore2"><small>您验证的邮箱：5831XXX@qq.com 可用于快速找回登录密码</small></div>
									</div>
									<div class="fore3">
										<a href="/home/email">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								
								
							</ul>
						</div>

					</div>
@endsection