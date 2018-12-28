@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>职位管理>>添加职位</h4></div>
	<div class="fill-info">		
    	<div class="info-box">
    		<ul>
        		<li>
          			<label>职位名称：</label>
          			<input type="text" name="name" class="w200 name" value="">
        		</li>
        		<li>
		            <label>职位权限：</label>
		            <input type="checkbox" value="1" class="checkbtn"> 用户添加  
		            <input type="checkbox" value="1" class="checkbtn"> 用户列表  
		            <input type="checkbox" value="1" class="checkbtn"> 订单添加  
		            <input type="checkbox" value="1" class="checkbtn"> 订单列表 
		            <input type="checkbox" value="1" class="checkbtn"> 商品添加 
		            <input type="checkbox" value="2" class="checkbtn"> 商品列表  
		            <input type="checkbox" value="3" class="checkbtn"> 添加品牌  
		            <input type="checkbox" value="4" class="checkbtn"> 品牌列表  
		            <input type="checkbox" value="5" class="checkbtn"> 品牌删除  
		            <input type="checkbox" value="6" class="checkbtn"> 添加分类  
		            <input type="checkbox" value="7" class="checkbtn"> 分类列表  
		            <input type="checkbox" value="8" class="checkbtn"> 分类删除
		        </li>
		        <li>
		        	<label>职位描述：</label>
		        	<textarea></textarea>
		        </li>      
	      	</ul>
	      	<p class="preview"> <a class="preview-btn btn01">确定</a> <a class="cancel-btn btn01">取消</a> </p>
    	</div>
  	</div>
  </div>
</div>

@endsection