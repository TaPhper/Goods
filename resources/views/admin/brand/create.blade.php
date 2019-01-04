@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">

	<div class="title">
		<h4>品牌管理>>添加品牌</h4>
  	</div>
  <form action="/admin/brand" method="post" enctype="multipart/form-data">
  	{{csrf_field()}}
  <div class="fill-info">
    <div class="info-box">
      <ul>
        <li>
          <label>品牌名称：</label>
          <input type="text" name="bname" class="w200 name" value="" autocomplete="off">
        </li>
       
        <li>
          <label>是否显示：</label>
          <input type="radio" name="bstatus" value="0" checked="checked">是
          <input type="radio" name="bstatus" value="1">否
        </li>
      
        <li>
          <label>品牌Logo：</label>
          <input type="file" class="filebtn" name="blogo" value="" style="width:200px;">
        </li>
        <li>
          <label>品牌描述：</label>
          <textarea name="bcontent" ></textarea>
        </li>
      </ul>
    </div>
    <div class="preview">
    	<input type="submit" name=""  value="确定" class="preview-btn btn01">
    	<a href="/admin/brand" class="preview-btn btn01">取消</a>
    </div>
  </div>
</form>
</div>

</div>
@endsection