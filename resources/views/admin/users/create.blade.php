@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>会员管理>>添加会员</h4></div>
	<div class="fill-info">		
		<form action="/admin/user" method="post">
			{{ csrf_field() }}
	    	<div class="info-box">
	    		<ul>
	        		<li>
	          			<label>用户名：</label>
	          			<input type="text" name="user_name" class="w200 name" value="">
	        		</li>   
			        <li>
			          <label>密码：</label>
			          <input type="text" name="user_pwd" class="w200 name" value="">
			        </li>
			        <li>
			          <label>邮箱：</label>
			          <input type="text" name="user_name" class="w200 name" value="">
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