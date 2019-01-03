@extends("admin/layout/index")

@section('content')
  <div class="chuda_co" id="container">
	    	<div class="title">
	      		<h4>首页</h4>
	      		<!-- {{session()->get('login_admin')}} -->
	    	</div>
	        <div class="right">
			<div class="welinfo">
	    		<span><img src="images/sun.png" alt="天气"></span>
	    		<b>Admin早上好，欢迎使用信息管理系统</b>(admin@uimaker.com)
	    		<a href="#">帐号设置</a>
	    	</div>
	        <div class="welinfo">
	    		<span><img src="images/time.png" alt="时间"></span>
	    		<i>您上次登录的时间：2013-10-09 15:22</i> （不是您登录的？<a href="#">请点这里</a>）
	    	</div>
	        <div class="content">
	        <div class="co-detail clearfix">
	            <div class="tjinfo">
	                <span class="tjtit">统计信息</span>
	                <ul class="tjcon">
	                    <li><b>销售总额</b><span>100000元</span></li>
	                    <li><b>注册用户</b><span>100000元</span></li>
	                    <li><b>产品数量</b><span>100000元</span></li>
	                    <li><b>品牌数量</b><span>100000元</span></li>
	                    <li><b>订单数量</b><span>100000元</span></li>                    
	                </ul>
	            </div> 
	            <div class="tjinfo2">
	                <span class="tjtit">统计信息</span>
	                <ul class="tjcon">
	                    <li><b>销售总额</b><span>100000元</span></li>
	                    <li><b>注册用户</b><span>100000元</span></li>
	                    <li><b>产品数量</b><span>100000元</span></li>
	                    <li><b>品牌数量</b><span>100000元</span></li>
	                    <li><b>订单数量</b><span>100000元</span></li>                    
	                </ul>
	            </div> 
	            <div class="zxdd">最新订单</div>
	            <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
	    		<thead>
	                <tr>
	                <th>订单号</th>
	                <th>收货人</th>
	                <th>支付状态</th>
	                <th>金额</th>
	                <th>下单时间</th>
	                <th>操作</th>
	                </tr>
	                </thead>
	                <tbody>
	                <tr>
	                <td> </td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                </tr> 
	                <tr class="odd">
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                </tr>
	        	</tbody>
	    	    </table>
	        </div>
	     </div>     
	    </div>
@endsection