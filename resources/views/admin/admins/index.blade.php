@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>员工管理>>员工列表</h4>
    </div>
      <a href="/admin/admins/create" id="xg_btn" class="btn03">添加员工</a>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>员工姓名</th>
                <th>员工性别</th>
                <th>职位</th>
                <th>联系方式</th>
                <th>账号状态</th>        
                <th style="width:250px">操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
              <tr>
                <td>{{ $v->admin_name }}</td>
                <td>
                {{ $v->admin_sex == 1 ? '女' : '男' }}
                </td>
                <td>
                {{ $v->adminpower['power_name']  }}
                </td>
                <td>{{ $v->admin_phone }}</td>
                <td>{{ $v->admin_status == 1 ? '正常' : '冻结' }}</td>
                <td>
                  @if($v->admin_status == 1)
                  <a class="btn btn-info" href="/admin/admins/{{ $v->admin_id }}">冻结</a>
                  @elseif($v->admin_status == 2)
                  <a class="btn btn-info" href="/admin/admins/{{ $v->admin_id }}">启用</a>
                  @endif
                  <form action="/admin/admins/{{ $v->admin_id }}" method="post" style="display: inline-block;">
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
          <!--分页 end-->
      <!--detail end--> 
    </div>
  </div>
</div>

@endsection