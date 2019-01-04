@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>权限管理>>添加权限</h4></div>
	<div class="fill-info">		
    	<div class="info-box">
    	<form action="/admin/power" method="post">
        {{ csrf_field() }}
    		<ul>
        		<li>
          			<label>职位名称：</label>
          			<a class="btn btn-info" onclick="jingli()">经理</a><span class="span"></span> &nbsp;
          			<a class="btn btn-info" onclick="kefu()">客服</a><span class="span"></span> &nbsp;
          			<a class="btn btn-info" onclick="dingdan()">订单管理员</a><span class="span"></span> &nbsp;
          			<a class="btn btn-info" onclick="shangpin()">商品管理员</a><span class="span"></span> &nbsp;
        		</li>
		        <li class="power">
		            <label>拥有权限：</label>
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 用户管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 订单管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 单据管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 商品管理 
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 品牌管理 <br> 
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 分类管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 员工管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 职位管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 发货管理
		            <input type="checkbox" value="1" class="checkbtn" name="check"> 网站管理
		        </li>
		        <li class="text">
		          <label>职位描述：</label>
		          <b><textarea name="power_describe" style="font-size:16px;width:400px"></textarea></b>
		        </li>	       
	      	</ul>
	      	<p class="preview"> 
	      	<button class="preview-btn btn01">确定</button> 
	      	<button class="cancel-btn btn01">取消</button>
	      	</form>
    	</div>
  	</div>
  </div>
</div>
<script type="text/javascript">
	function jingli(){
		$('.power input').prop('checked', false);
		$('.power input').prop('checked', true);
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="经理" />');
		$('.text textarea').html('最高权限');
	}
	
	function kefu(){
		$('.power input').prop('checked', false);
		$('.power input').eq(0).prop('checked', true);
		$(this).prop('value','客服');
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="客服" />');
		$('.text textarea').html('管理用户');

	}
	
	function dingdan(){
		$('.power input').prop('checked', false);
		$('.power input').eq(1).prop('checked', true);
		$('.power input').eq(2).prop('checked', true);
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="订单" />');
		$('.text textarea').html('管理单据和订单,方便检查');
	}

	function shangpin(){
		$('.power input').prop('checked', false);
		$('.power input').eq(3).prop('checked', true);
		$('.power input').eq(4).prop('checked', true);
		$('.power input').eq(5).prop('checked', true);
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="商品" />');
		$('.text textarea').html('管理商品,品牌和分类，方便添加商品,库存等');
	}

</script>
@endsection