@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>网站管理>>修改网站</h4></div>
	<div class="fill-info">		
		<form action="/admin/net/{{$data['net_id']}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('PUT')}}
	    	<div class="info-box">
	    		<ul>
	        		<li>
	          			<label>网站名称：</label>
	          			<input type="text" name="net_name" class="w200 name" value="{{$data['net_name']}}" autocomplete="off"><span></span>
	        		</li>   
			        <li>
			          <label>网站标题：</label>
			          <input type="text" name="net_key" class="w200 name" value="{{$data['net_key']}}" autocomplete="off">
			        </li>
			        <li>
			          <label>网站联系电话：</label>
			          <input type="text" name="net_phone" class="w200 name" value="{{$data['net_phone']}}" autocomplete="off">
			        </li>
					<li>
			          <label>网站Logo：</label>
			          <img src="/uploads/{{$data['net_logo']}}" width="50">
			        </li>    
			        <li>
			          <label>更改Logo：</label>
			          <input type="file" name="logo" class="w200 file" value="">
			        </li>   
		      	</ul>
		      	<p class="preview"> 
			      	<button class="preview-btn btn01" type="submit">确定</button> 
			      	<button class="cancel-btn btn01" type="reset">取消</button> 
		      	</p>
	    	</div>
    	</form>
  	</div>
  </div>
</div>
@endsection