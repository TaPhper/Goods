@extends('home.userinfo.layout.layout')
@section('content')
<div class="user-address">
						<!--标题 -->
						
						
					
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="/home/update/{{$addr['id']}}" method="get">
										
										

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="收货人" name="order_name" value="{{$addr['order_name']}}">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="text" name="tel" value="{{$addr['tel']}}">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											
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
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="detail">{{$addr['detail']}}</textarea>
												
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input class="am-btn am-btn-danger" type="submit" value="保存">
												<input type="reset" class="am-close am-btn am-btn-danger" name="" value="取消">
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