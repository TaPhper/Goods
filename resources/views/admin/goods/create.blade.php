@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>商品管理>>添加商品</h4></div>
	<div class="fill-info">
		
	<form action="/admin/goods" method="post" enctype="multipart/form-data">
		{{ csrf_field()}}
    	<div class="tab-con">
    		<div class="cur">
	      		<ul>
	        		<li>
	          			<label>商品名称：</label>
	          			<input type="text" name="gname" class="w200 name" value="" autocomplete="off">
	        		</li>
			        <li>
			          <label>所属分类：</label>

			          <select class="w200" name="type_id">
			            <option>请选择</option>
			              @foreach($cates as $k=>$v)
				            <option value="{{$v->type_id}}" {{ $id == $v->type_id ? 'selected' : ''}}>{{ $v->type_name}}</option>
				          @endforeach
			          </select>
			        </li>
			        <li>
			          <label>是否上架：</label>  
			          &nbsp;&nbsp;&nbsp;<input type="radio" name="gstatus" value="0" checked="checked">上架
			          &nbsp;&nbsp; <input type="radio" name="gstatus" value="1">下架
			        </li>
			        <li>
			          <label>是否热卖商品：</label>
                        &nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="ghot" class="checkbtn">&nbsp;&nbsp;&nbsp;是
                        &nbsp;&nbsp;&nbsp;<input type="radio" value="0" checked name="ghot" class="checkbtn">&nbsp;&nbsp;&nbsp;否
			        </li>
                    <li>
                        <label>是否特价商品：</label>
                        &nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="gspecial" class="checkbtn">&nbsp;&nbsp;&nbsp;是
                        &nbsp;&nbsp;&nbsp;<input type="radio" value="0" checked="" name="gspecial" class="checkbtn">&nbsp;&nbsp;&nbsp;否
                    </li>
                   
                    <li>
                        <label>商品原价：</label>
                        <input type="text" name="gprice" class="w200 name" value="" autocomplete="off">
                    </li>
                    <li>
                        <label>注销价格：</label>
                        <input type="text" name="gprice_money" class="w200 name" value="" autocomplete="off">
                    </li>
                    <li>
                        <label>商品库存：</label>
                        <input type="text" name="stock" class="w200 name" value="" autocomplete="off">
                    </li>
			        <li>
			          <label>商品品牌：</label>
			          <select class="w100" name="brand_id">
			            <option>请选择</option>
			            @foreach ($data as $K=>$v)
                            <option value="{{ $v->brand_id }}">{{ $v->brand_name }}</option>
			            @endforeach
			          </select>
			        </li>
			         <li>
			          <label>商品封面：</label>
			          <input type="file" name="profile" class="filebtn" value="" style="width:300px;">
			        </li>
	      		</ul>
	      		<p class="preview">
	      			<input type="submit" value="确定" class="preview-btn btn01">
	      			<a href="/admin/goods" class="preview-btn btn01">取消</a>
      		</div>    	  

      		<!-- 添加商品详情相册 -->
	    	<!-- <div class="">
	    		<ul>
	              <li>
                      <label>商品相册：</label><button href="#" class="jia">添加</button>
                  </li>
                      <li  id="box">
                      <input type="file" name="img_name[]"/>
                </li>
	            </ul>
	            <p class="preview"> <a class="preview-btn btn01">确定</a> <a class="cancel-btn btn01">取消</a> </p>
	    	</div> -->
           
         

        </div>
    </form>

  </div>
</div>
@endsection