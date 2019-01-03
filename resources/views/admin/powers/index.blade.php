@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>职位管理>>职位列表</h4>
    </div>
      <a href="/admin/power/create" id="xg_btn" class="btn03">添加职位</a>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>职位名称</th>
                <th>拥有权限</th>
                <th>职位描述</th>                        
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
              <tr>
              	<td>{{ $v->power_name }}</td>
                <td>{{ $v->power_usable }}</td>
                <td>{{ $v->power_describe }}</td>
                <td style="width:13%">
        					<!-- <a class="btn btn-warning" href="/admin/power/{{ $v->power_id }}/edit">修改密码</a> -->
        					<form action="/admin/power/{{ $v->power_id }}" method="post" style="display: inline-block;">
        						{{ csrf_field() }}
        						{{ method_field('DELETE') }}
        						<button class="btn btn-danger" >删除</button>
        					</form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <b><p class="cur_num">当前数据中{{$count}}条!</b>
          
          <!--分页 start-->
          <div class="pages ">
              {{ $data->links() }}              	
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    </div>
</div>


@endsection