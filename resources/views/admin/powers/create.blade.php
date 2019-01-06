@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>职位管理>>添加职位</h4></div>
	<div class="fill-info">		
    	<div class="info-box">
    	@if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
    	<form action="/admin/power" method="post">
        {{ csrf_field() }}
    		<ul>
        		<li class="zhiwei">
          			<label>职位名称：</label>
          			<a class="btn btn-info" onclick="jingli()">经理</a><span class="span"></span> &nbsp;
          			<a class="btn btn-info" onclick="kefu()">客服</a><span class="span"></span> &nbsp;
          			<a class="btn btn-info" onclick="dingdan()">订单管理员</a><span class="span"></span> &nbsp;
          			<a class="btn btn-info" onclick="shangpin()">商品管理员</a><span class="span"></span> &nbsp;
          			<span><input type="button" style="width:100px;height:34px" onclick="zidingyi()" class="btn btn-info" name="power_name" value="自定义"></span><span></span>&nbsp;
        		</li>
		        <li class="power">
		            <label>拥有权限：</label>
		            <input type="checkbox" value="0" class="checkbtn" name="power_usable0"> 用户管理
		            <input type="checkbox" value="1" class="checkbtn" name="power_usable1"> 订单管理
		            <input type="checkbox" value="2" class="checkbtn" name="power_usable2"> 单据管理
		            <input type="checkbox" value="3" class="checkbtn" name="power_usable3"> 商品管理 
		            <input type="checkbox" value="4" class="checkbtn" name="power_usable4"> 品牌管理 <br> 
		            <input type="checkbox" value="5" class="checkbtn" name="power_usable5"> 分类管理
		            <input type="checkbox" value="6" class="checkbtn" name="power_usable6"> 员工管理
		            <input type="checkbox" value="7" class="checkbtn" name="power_usable7"> 职位管理
		            <input type="checkbox" value="8" class="checkbtn" name="power_usable8"> 发货管理
		            <input type="checkbox" value="9" class="checkbtn" name="power_usable9"> 网站管理
		        </li>
		        <li class="text">
		          <label>职位描述：</label>
		          <b><textarea name="power_describe" style="font-size:16px;width:400px"></textarea></b>
		        </li>	       
	      	</ul>
	      	<p class="preview"> 
	      	<button class="preview-btn btn01">确定</button> 
	      	<a class="cancel-btn btn01" href="/admin/power">取消</a>
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
	
	function kefu()
	{
		$('.power input').prop('checked', false);
		$('.power input').eq(0).prop('checked', true);
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="客服" />');
		$('.text textarea').html('管理用户');

	}
	
	function dingdan()
	{
		$('.power input').prop('checked', false);
		$('.power input').eq(1).prop('checked', true);
		$('.power input').eq(2).prop('checked', true);
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="订单" />');
		$('.text textarea').html('管理单据和订单,方便检查');
	}

	function shangpin()
	{
		$('.power input').prop('checked', false);
		$('.power input').eq(3).prop('checked', true);
		$('.power input').eq(4).prop('checked', true);
		$('.power input').eq(5).prop('checked', true);
		$('.span').eq(0).html('<input name="power_name" type="hidden" value="商品" />');
		$('.text textarea').html('管理商品,品牌和分类，方便添加商品,库存等');
	}
	function zidingyi()
	{
		var input = $('.zhiwei span:eq(4) input').eq(0).val() == '自定义' ? '' : '';
		$('.power input').prop('checked', false);
		$('.text textarea').html('');

		$('.zhiwei span:eq(4) input').eq(0).attr('type', 'text');
		$('.zhiwei span:eq(4) input').eq(0).attr('value', input);
		
		$('.zhiwei span:eq(4) input').eq(0).blur(function(){
			var value = $('.zhiwei span:eq(4) input').eq(0).val();
			if(value.length == ''){
				value = '自定义';
			}
			// alert(value);
			$('.zhiwei span:eq(4) input').eq(0).attr('value', value);
			$('.span').eq(0).html('<input name="power_name" type="hidden" value='+value+' />');
			$('.zhiwei span:eq(4) input').eq(0).attr('type', 'button');
		})	
	}
</script>
@endsection