@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>用户管理>>用户列表</h4>
    </div>
      <a href="/admin/user/create" id="xg_btn" class="btn03">添加用户</a>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>ID</th>
              	<th>用户名</th>
                <th>邮箱</th>
                <th>真实姓名</th>
                <th>联系方式</th>
                <th>用户性别</th>
                <th>家庭住址</th>                           
                <th>邮编</th>                                                  
                <th>用户状态</th>                           
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
              <tr>
              	<td>{{ $v->user_id }}</td>
                <td>{{ $v->user_name }}</td>
                <td>{{ $v->user_email }}</td>
                <td>{{ $v->true_name }}</td>
                <td>{{ $v->user_tel }}</td>
                <td>{{ $v->user_sex == 1 ? '女' : '男' }}</td> 
                <td>{{ $v->user_address }}</td>
                <td>{{ $v->postcode }}</td>
                @if($v->user_status == 1)
                <td>正常</td>
                @elseif($v->user_status == 2)
                <td>冻结</td>
                @endif
                <td style="width:13%">
        					<a class="btn btn-warning" href="/admin/user/{{ $v->user_id }}/edit">修改密码</a>
        					<form action="/admin/user/{{ $v->user_id }}" method="post" style="display: inline-block;">
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