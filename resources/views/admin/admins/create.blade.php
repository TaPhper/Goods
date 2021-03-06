@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
  <div class="title"><h4>员工管理>>添加员工</h4></div>
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
        <form action="/admin/admins" method="post">
        {{ csrf_field() }}
        <ul>
            <li>
                <label>员工姓名：</label>
                <input type="text" name="admin_name" autocomplete=off class="w200 name" value="">
            </li>   
            <li>
              <label>员工密码：</label>
              <input type="password" name="admin_pwd" autocomplete=off class="w200 name" value="">
            </li>
            <span style="font-size:10px;margin-left:100px;">请输入6-18位数字字母下划线</span>
            <li>
              <label>确认密码：</label>
              <input type="password" name="admin_repwd" autocomplete=off class="w200 name" value="">
            </li>
            <li>
              <label>员工性别：</label>
              <input type="radio" name="admin_sex" value="2" checked="checked">男   
              <input type="radio" name="admin_sex" value="1">女
            </li>
            <li>
              <label>邮箱：</label>
              <input type="text" name="admin_email" autocomplete=off class="w200 name" value="">
            </li>
            <li>
              <label>联系电话：</label>
              <input type="text" name="admin_phone" autocomplete=off class="w200 name" value="">
            </li>
            <li>
              <label>员工职位：</label>
              <select class="w100" name="admin_post">
                <option >请选择</option>
                @foreach($power as $k=>$v)
                <option value="{{ $v->power_id }}" >{{ $v->power_name }}</option>
                @endforeach
              </select>
            </li>         
          </ul>
          <p class="preview"> 
            <button class="preview-btn btn01">确定</button>
            <a class="cancel-btn btn01" href="/admin/admins">取消</a> 
          </p>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection