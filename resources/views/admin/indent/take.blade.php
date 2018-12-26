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
            <ul class="ul-datetime">
              <li>
                <label>订单号：</label>
                <input type="text" class="w100">
              </li>                            
              <li><a class="btn01">查询</a></li>
            </ul>
          </div>
        </div>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>订单号</th>
                <th>收款金额</th>
                <th>付款人</th>
                <th>支付方式</th>
                <th>支付状态</th>
                <th>完成时间</th>                
              </tr>
            </thead>
            <tbody>
              @foreach($data as $k=>$v)
              <tr>
                <td>{{ $v->indent_id }}</td>
                <td>{{ $v->indent_money }}</td>
                <td>{{ $v->consignee }}</td>
                <td>
                @if($v->payway == 1 )
                微信
                @elseif($v->payway == 2)
                支付宝
                @endif
                </td>
                <td>
                  @if($v->indent_state == 1)
                  完成交易
                  @elseif($v->indent_state == 2)
                  确认收货
                  @elseif($v->indent_state == 3)
                  待付款
                  @endif
                </td>
                <td>{{ $v->updated_at }}</td> 
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