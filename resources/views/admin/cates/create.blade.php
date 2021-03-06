@extends('admin.layout.index')
@section('content')
<title>添加分类</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>分类管理>>添加分类</h4></div>
	<form action="/admin/cates/index" method="post">
		{{ csrf_field()}}
<div class="fill-info">
    <div class="info-box">
      <ul>
        <li>
          <label>分类名称：</label>
          <input type="text" name="type_name" class="w200 name" value="" autocomplete="off">
        </li>
        <li>
          <label>所属分类：</label>
          <select class="w200" name="parent_id">
            <option value="0">&nbsp;&nbsp;一级分类&nbsp;&nbsp;</option>
            @foreach($cates as $k=>$v)
            <option value="{{$v->type_id}}" {{ $id == $v->type_id ? 'selected' : ''}}>{{ $v->type_name}}</option>
            @endforeach
          </select>
        </li>
                 <br><br>
        <input type="submit" class=" preview-btn btn01" value="确定添加" style="margin-left:100px;">
       
      </ul>
    </div>
    <!-- <input type="submit" class=" preview-btn btn01" value="确定添加"> -->
  </div>
</div>
</div>
</form>
</body>
</html>



@endsection