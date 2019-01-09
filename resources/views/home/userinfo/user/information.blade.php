@extends('home.userinfo.layout.layout')
@section('content')
<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">
					     <form action="/home/uploads" id="forms" enctype="multipart/form-data" method="post">
					     	
							<div class="filePic">
								<input type="file" name="profile" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" style="width:100px;height:110px;" id="touxiang" src="/uploads/{{$user->uface}}" alt="" />
							</div>
						</form>   
						 

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{$user->user_name }}</i></b></div>
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
					

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" method="post" action="/home/saveinfo/{{$user->user_id}}">
								{{csrf_field()}}

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="nickname" name="user_name" value="{{$user->user_name }}">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="" value="{{$user->true_name }}" name="true_name">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" @if($user->user_sex == 2)checked @endif name="sex" value="2" data-am-ucheck > 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" @if($user->user_sex == 1)checked @endif name="sex" value="1" data-am-ucheck> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" @if($user->user_sex == 0)checked @endif name="sex" value="0" data-am-ucheck> 保密
										</label>
									</div>
								</div>

							
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" placeholder="" type="text" value="{{$user->user_tel}}" name="user_tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" type="email" name="email"value="{{$user->user_email }}">

									</div>
								</div>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<!-- <div class="am-btn am-btn-danger"> -->
										<input type="submit" value="修改" class="am-btn am-btn-danger">

								   <!-- </div> -->
								   </div>

							</form>
						</div>

					</div>
	<script>
	$(function(){
		$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

		$('#forms input:file').eq(0).change(function(){
			// alert($);
			$.ajax({
				url:'/home/uploads',
				type:'post',
				data:new FormData($('#forms')[0]), //创建表单数据
				processData:false, //不限定格式
				contentType:false, //不进行特定格式编码
				dataType:'html',
				success:function(msg){

					// console.log(msg);
					if(msg){
						$('#touxiang').attr('src','/uploads/'+msg);
					}else{
						alert('头像修改失败');
					}
				}

			});
		});


	});


</script>	
@endsection