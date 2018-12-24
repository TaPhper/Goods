@extends('admin.layout.index')

@section('content')


    <title>分类列表</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/erweima-style.css" />



<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="title">
            <h4>分类管理>>分类列表</h4>
        </div>
        <div class="right container">
            <a href="javascript:;" id="xg_btn" class="btn03">添加分类</a>
            <!--detail start-->
            <div class="co-detail clearfix" style="width:700px;margin-left: 200px">
                <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>所属分类PID</th>
                        <th>所属路径</th>
                 
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($data as $k=>$v)
                    <tr>

                        <td>{{ $v->type_id }}</td>
                        <td>{{ $v->type_name }}</td>
                        <td>{{ $v->parent_id }} </td>
                        <td>{{ $v->p_path }} </td>
                        <td>
                             <form style="display: inline-block;" method="post" action="/admin/cates/index/{{ $v->type_id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除"  >
            </form>
                              <a href="/admin/cates/index/{{$v->type_id}}/edit">修改</a>
                              <a href="/admin/cates/index/create/{{ $v->type_id}}">添加子分类</a>

                         </td>
                       
                    </tr>
                    
                    </tbody>
                    @endforeach
                </table>
      <!--   !--分页 start-->
         

    
               
     </div>
    
        </div>
    </div>
</div>

</body>

@endsection -->