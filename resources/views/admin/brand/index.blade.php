@extends('admin.layout.index')
@section('content')
<div class="chuda_co" id="container" style="width:100%">
  <div class="co-box">
    <div class="title">
      <h4>品牌管理>>品牌列表</h4>
    </div>
   
      <a href="javascript:;" id="xg_btn" class="btn03">添加品牌</a>
      <!--detail start-->
      <div class="co-detail clearfix" style="width:83%;margin-left:235px;"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>品牌Logo</th>
                <th>品牌名称</th>            
                <th>品牌描述</th>
                <th>是否显示</th>                            
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td> 
                <td class="operation"><a class="edit">确认</a></td>
              </tr>
              <tr class="odd">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
          <p class="cur_num">当前数据中1900条，每页显示<select class="w100">
                  <option>5</option>
                </select>条数据</p>

          <!--分页 start-->
          <div class="pages">
            <div class="pages-btn">
              <a class="pre">上一页</a>
              <div class="num-btn"><a class="pages-current">1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a></div>
              <a class="after">下一页</a>
            </div>
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    
  </div>
</div>


@endsection