@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">

	<div class="title">
		<h4>品牌管理>>修改品牌</h4>
  	</div>
    <a href="/admin/brand" id="xg_btn" class="btn03" style="margin:auto">品牌列表</a>

  <form action="/admin/brand/{{$data->brand_id}}" method="post" enctype="multipart/form-data">
  	{{csrf_field()}}
    {{method_field('PUT')}}
  <div class="fill-info">
    <div class="info-box">
      <ul>
        <li>
          <label>品牌名称：</label>
          <input type="text" name="bname" class="w200 name" value="{{$data->brand_name}}" autocomplete="off">
        </li>
       
        <li>
          <label>是否显示：</label>
          <input type="radio" name="bstatus" {{$data->brand_is_show == 0 ?'checked':''}} value="0">是
          <input type="radio" name="bstatus" {{$data->brand_is_show == 1 ?'checked':''}}
          value="1">否
        </li>
      
        <li>
          <label>品牌Logo：</label>
          <input type="file" class="filebtn" name="blogo" value="" style="width:200px;">
        </li>
        <li>
          <label>品牌描述：</label>
          <textarea name="bcontent">{{$data->brand_describlle}}</textarea>
        </li>
      </ul>
    </div>
    <div class="preview">
    	<input type="submit" name=""  value="确定" class="preview-btn btn01">
    	<input type="reset" name="" value="取消" class="preview-btn btn01">
    </div>
  </div>
</form>
</div>

</div>
@endsection