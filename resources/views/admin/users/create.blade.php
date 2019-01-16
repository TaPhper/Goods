@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>用户管理>>添加用户</h4></div>
	<div class="fill-info">		
		<form action="/admin/user" method="post">
			{{ csrf_field() }}
	    	<div class="info-box">
	    		<ul>
	        		<li>
	          			<label>用户名：</label>
	          			<input type="text" name="user_name" class="w200 name" autocomplete=off value=""><span></span>
	        		</li>   
			        <li>
			          <label>密码：</label>
			          <input type="password" name="user_pwd" class="w200 name" autocomplete=off value="">
			        </li>
			        <li>
			          <label>邮箱：</label>
			          <input type="text" name="user_email" class="w200 name" autocomplete=off value="">
			        </li>
					<li>
			          <label>真实姓名：</label>
			          <input type="text" name="true_name" class="w200 name" autocomplete=off value="">
			        </li>
			        <li>
			          <label>性别：</label>
			          <input type="radio" name="user_sex" value="2" autocomplete=off checked="checked">男   
			          <input type="radio" name="user_sex" value="1">女
			        </li>	
			        <li>
			          <label>联系电话：</label>
			          <input type="text" name="user_tel" class="w200 name" autocomplete=off value="">
			        </li>	 
			        <li>
			          <label>状态：</label>
			          <input type="checkbox" value="1" checked class="checkbtn" name="user_status"> 正常  
			          <input type="checkbox" value="2" class="checkbtn" name="user_status"> 锁定  
			        </li>		        
		      	</ul>
		      	<p class="preview"> 
			      	<button class="preview-btn btn01" type="submit">确定</button> 
			      	<a href="/admin/user" class="cancel-btn btn01" type="submit">取消</a> 
		      	</p>
	    	</div>
    	</form>
    	<div class="hidden">
    		{{ csrf_field() }}
    	</div>
    	<script type="text/javascript">
       		$('.info-box ul li input').eq(0).blur(function(){
    			var name = $('.info-box ul li input').eq(0).val();
    			
    			$.get('/admin/user/index',{'name':name},function(msg){
    				// alert(msg);
    				if(msg == 'success'){
    					$('.info-box ul li input').next().html('<font style="color:red">用户名已经存在</font>');    					
    				}else if(msg == 'error'){
    					$('.info-box ul li input').next().html('<font style="color:green">用户名可用</font>');
    				}else{
    					$('.info-box ul li input').next().html('<font style="color:red">用户名不能为空</font>');
    				}
    			},'html')
    		})
    	</script>
  	</div>
  </div>
</div>
@endsection