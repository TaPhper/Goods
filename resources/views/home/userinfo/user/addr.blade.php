@extends('home.userinfo.layout.layout')
@section('content')
<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
                           @foreach ($data as $k=>$v)
							<li class="user-addresslist defaultAddr">
								<span class="new-option-r"><i class="am-icon-check-circle"></i></span>
								<p class="new-tit new-p-re">
									<span class="new-txt">{{$v->order_name}}</span>
									<span class="new-txt-rd2">{{$v->tel}}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province">{{$v->addr}}</span>
										
										<span class="street">{{$v->detail}}</span></p>
								</div>
								<div class="new-addr-btn">
									<a href="#"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="/user_addr/delete/{{$v->id}}" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@endforeach

							
							
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="/home/saveaddr" method="post">
										 {{csrf_field()}}

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="收货人" name="order_name">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="text" name="tel">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<!-- <div class="am-form-content address">
												<select data-am-selected>
													<option value="a">浙江省</option>
													<option value="b" selected>湖北省</option>
												</select>
												<select data-am-selected>
													<option value="a">温州市</option>
													<option value="b" selected>武汉市</option>
												</select>
												<select data-am-selected>
													<option value="a">瑞安区</option>
													<option value="b" selected>洪山区</option>
												</select>
											</div> -->
								<div class="am-form-content address">
											<div>
											<select id="s_province" name="province" ></select>
										    <select id="s_city" name="city" ></select>
										    <select id="s_county" name="county"></select>
										    <script class="resources library" src="/admin/js/area.js" type="text/javascript"></script>
										    
										    <script type="text/javascript">_init_area();</script>
										    </div>
										    <div id="show"></div>
								</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="detail"></textarea>
												
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input class="am-btn am-btn-danger" type="submit" value="保存">
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>
@endsection