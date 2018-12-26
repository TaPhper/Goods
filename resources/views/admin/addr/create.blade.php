@extends('admin.layout.index')
@section('content')

<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>发货地址管理>>添加发货地址</h4></div>
	<form action="/admin/addr" method="post">
		{{csrf_field()}}
		<div class="fill-info">		
    	<div class="info-box" style="margin-left:70px;">
    		<ul>
        		<li>
          			<label>发货地点名称：</label>
          			<input type="text" name="ship_addr" class="w200 name" value="">
        		</li>   
		        <li>
		          <label>发货人姓名：</label>
		          <input type="text" name="ship_name" class="w200 name" value="">
		        </li>
		        <li>
		          <label>性别：</label>
		          <input type="radio" name="sex" value="1" checked="checked">&nbsp;<b>男</b>&nbsp;&nbsp;&nbsp;&nbsp;
		          <input type="radio" name="sex" value="0">&nbsp;<b>女</b>
		        </li>
		        <li >
		        <label>发往地区：</label>
				<div class="info">
					<div>
					<select id="s_province" name="province"></select>&nbsp;&nbsp;
				    <select id="s_city" name="city" ></select>&nbsp;&nbsp;
				    <select id="s_county" name="county"></select>
				    <script class="resources library" src="js/area.js" type="text/javascript"></script>
				    
				    <script type="text/javascript">_init_area();</script>
				    </div>
				    <div id="show"></div>
				</div>

		        </li>
		        <li>
		          <label>详细地址：</label>
		          <input type="text" name="detailed" class="w200 name" value="">
		        </li>
		        <li>
		          <label>邮箱：</label>
		          <input type="text" name="email" class="w200 name" value="">
		        </li>
		        
		        <li>
		          <label>手机号：</label>
		          <input type="text" name="phone" class="w200 name" value="">
		        </li>		             
		        <li>
		          <label>设为默认地址：</label>
		          <input type="radio" name="default" value="1" checked="checked">&nbsp;<b>是</b>&nbsp;&nbsp;&nbsp;&nbsp;
		          <input type="radio" name="default" value="0">&nbsp;<b>否</b> 
		        </li>		        
	      	</ul>
	      	<p class="preview">
	      		<input type="submit" class="preview-btn btn01" value="确定">
	      		<input type="reset" class="cancel-btn btn01" value="取消">
	      	</p>
    	</div>
  	</div>
	</form>
  </div>
</div>
<script type="text/javascript">
var Gid  = document.getElementById ;
var showArea = function(){
	Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" + 	
	Gid('s_city').value + " - 县/区" + 
	Gid('s_county').value + "</h3>"
							}
Gid('s_county').setAttribute('onchange','showArea()');
</script>
@endsection