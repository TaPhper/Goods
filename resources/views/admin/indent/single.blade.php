@extends('admin.layout.index')

@section('content')
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>单据管理>>收款单</h4>
    </div>
    <div class="right container" style="width:83%;"> 
      
    <div class="custom-info">
          <div class="info-box">
          <form action="">
            <ul class="ul-datetime">
              <li>
                <label>订单号：</label>
                <input type="text" name="indent_number" class="w100">
              </li>                            
              <li><button class="btn01">查询</button></li>
            </ul>
          </form>
          </div>
        </div>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>订单号</th>
                <th>申请退款金额</th>
                <th>用户名</th>
                <th>支付状态</th>
                <th>完成时间</th>                    
                <th>审核状态</th>
                <th>退款</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $k=>$v)
              <tr>
                <td>{{ $v->indent_number }}</td>
                <td>{{ $v->indent_money }}</td>
                <td>{{ $v->indentusers->user_name }}</td>
                <td>
                @if($v->payway == 1 )
                微信
                @elseif($v->payway == 2)
                支付宝
                @endif
                </td>
                <td>{{ $v->updated_at }}</td> 
                <td>
                  @if($v->indent_state == 4)
                  审核中
                  @elseif($v->indent_state == 5)
                  审核完成
                  @endif
                </td>
                <td>
                  @if($v->indent_state == 4)
                  <a href="/admin/Order/tuikuan/{{ $v->indent_id }}" class="btn btn-danger" onclick="sales()">退款</a>
                  @elseif($v->indent_state == 5)
                  <a href="javascript:;" class="btn btn-success">退款成功</a>
                  @endif
                
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
</div>

@endsection