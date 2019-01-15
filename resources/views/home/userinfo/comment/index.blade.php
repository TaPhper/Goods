@extends('home.userinfo.layout.layout')

@section('content')	

		

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有评价</a></li>
							

							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">

									<div class="comment-main">
										<div class="container">

											<table class="table" style="width:800px;">
												  <tr>
												  	 <th>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 评价内容</th>
												  	  <th>商品</th>
												  	  <th>&nbsp;&nbsp;状态</th>
												  </tr>
												  @foreach($datas as $K=>$v)
												  <tr hieght="80px">
								         <td>
								         	
								         		<img src="/uploads/{{$v->goodscomment->goods_img}}" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;
								
										
											<span style="font-size: 15px;font-weight:bold;font-family:'微软雅黑';line-height: 80px">
												{{$v->content}}
											</span>
										
												
											
										</td>

										          <td style="font-size: 15px;font-weight:bold;font-family:'微软雅黑';">{{$v->goodscomment->gname}}</td>

										          <td>
										          	@if($v->status == 1)
										          	     已评论
										          	 @else
										          	     未评论
										          	 @endif

										          </td>

												  </tr>


												  @endforeach
												
											</table>

										</div>
									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">
									
									<div class="comment-main">
										<div class="comment-list">
											

										

										</div>
									</div>									
									
								</div>
							</div>
						</div>

					</div>

			
				<!--底部-->
		
@endsection