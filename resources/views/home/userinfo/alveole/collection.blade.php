@extends('home.userinfo.layout.layout')
@section('content')


					

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
								<!--<a class="am-badge am-badge-danger am-round">降价</a>-->
								<!--<a class="am-badge am-badge-danger am-round">下架</a>-->
							</div>
							<div class="s-content">
								@foreach($data as $k=>$v)
								<div class="s-item-wrap">
									<div class="s-item">

										<div class="s-pic">
											<a href="/home/index/introduction/{{$v->goods_id}}" class="s-pic-link">
												<img src="/uploads/{{$v->goods_img}}" alt="{{$v->gname}}" title="{{$v->gname}}" class="s-pic-img s-guess-item-img" width="186" height="186">
											</a>
										</div>
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$v->gname}}">{{$v->gname}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->sales_grice}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->market_price}}</em></span>
											</div>
											<div class="s-extra-box">
												
												<span class="s-sales">销量:{{$v->sales}}</span>
											</div>
										</div>
										<div class="s-tp">
											<a href="/home/uncollect/{{$v->goods_id}}"><span class="ui-btn-loading-before">取消收藏</span></a>
											<i class="am-icon-shopping-cart"></i>
											<a href="/home/shopcart?id={{$v->goods_id}}"><span class="ui-btn-loading-before buy">加入购物车</span></a>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					
				
@endsection