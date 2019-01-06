@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>轮播图管理>>修改轮播图配置</h4></div>
	<div class="fill-info">		
		<form action="/admin/slide/{{$slide['slide_id']}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('PUT')}}
	    	<div class="info-box">
	    		<ul>
					<li>
			          <label>轮播图：</label>
			          <input type="file" name="slide_img" class="w200 file" style="float:left" value="">
			          <img src="/uploads/{{ $slide->slide_img }}" alt="" style="width:100px;">
			        </li> 
			        <li>
			          <label>轮播图状态：</label>
		              <input type="radio" name="slide_status" value="2" {{ $slide->slide_status == 2 ? 'checked' : '' }}>显示   
		              <input type="radio" name="slide_status" value="1" {{ $slide->slide_status == 1 ? 'checked' : '' }}>隐藏
			        </li>
			        <li>
	          			<label>轮播图地址：</label>
	          			<input type="text" name="slide_url" class="w200 name" value="{{ $slide->slide_url }}"><span></span>
	        		</li>
		      	</ul>
		      	<p class="preview"> 
			      	<button class="preview-btn btn01" type="submit">修改</button> 
			      	<a href="/admin/slide" class="cancel-btn btn01" type="reset">取消</a> 
		      	</p>
	    	</div>
    	</form>
  	</div>
  </div>
</div>
@endsection