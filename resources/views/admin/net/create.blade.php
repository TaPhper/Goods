@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>网站管理>>添加网站配置</h4></div>
	<div class="fill-info">		
		<form action="/admin/net" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
	    	<div class="info-box">
	    		<ul>
	        		<li>
	          			<label>网站名称：</label>
	          			<input type="text" name="net_name" class="w200 name" value=""><span></span>
	        		</li>   
			        <li>
			          <label>网站标题：</label>
			          <input type="text" name="net_key" class="w200 name" value="">
			        </li>
			        <li>
			          <label>网站联系电话：</label>
			          <input type="text" name="net_phone" class="w200 name" value="">
			        </li>
					<li>
			          <label>网站Logo：</label>
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