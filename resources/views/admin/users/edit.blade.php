@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>用户管理>>修改用户</h4></div>
	<div class="fill-info">		
		<form action="/admin/user/{{ $id }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
	    	<div class="info-box">
	    		<ul>
	        		<li>
	          			<label>用户名：</label>
	          			<input type="text" name="user_name" disabled class="w200 name" value="{{ $data->user_name }}">
	        		</li>   
			        <li>
			          <label>密码：</label>
			          <input type="text" name="user_pwd" class="w200 name" value="">
			        </li>
				<!--<li>
			          <label>会员组：</label>
			          <select class="w100">
			            <option>请选择</option>
			          </select>
			        </li> -->   
			        <li>
			          <label>状态：</label>
			          <input type="checkbox" value="1" checked class="checkbtn" name="user_status"> 正常  
			          <input type="checkbox" value="2" class="checkbtn" name="user_status"> 锁定  
			        </li>		        
		      	</ul>
		      	<p class="preview"> 
			      	<button class="preview-btn btn01" type="submit">确定</button> 
			      	<button class="cancel-btn btn01" type="submit">取消</button> 
		      	</p>
	    	</div>
    	</form>
  	</div>
  </div>
</div>
@endsection