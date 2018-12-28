@extends('.admin.layout.index')

@section('content')
<title>添加分类</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>修改类别</h4></div>
	<form action="/admin/cates/index/{{$data->type_id }}" method="post">
		{{ csrf_field()}}
    {{ method_field('PUT') }}
<div class="fill-info">
    <div class="info-box">
      <ul>
        <li>
          <label>分类名称：</label>
          <input type="text" name="type_name" class="w200 name" value="{{ $data->type_name}}" autocomplete="off">
        </li>
        <li>
          <label>所属分类：</label>
          <select class="w200" name="parent_id">
            <option value="0">--选择分类--</option>
            @foreach($cates as $k=>$v)
            <option value="{{$v->type_id}}" {{ $data->parent_id == $v->type_id ? 'selected' : ''}}>{{ $v->type_name}}</option>
            @endforeach
          </select>
        </li>
                 <br><br>
        <input type="submit" class=" preview-btn btn01" value="确定修改">
       
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