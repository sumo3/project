
@extends("Admin.AdminPublic.public")
@section("admin")
<html>
 <head></head>
<link rel="stylesheet" href="/static/admin/css/amazeui.min.css" />
<link rel="stylesheet" href="/static/admin/css/admin.css" />
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style type="text/css" media="screen">
  #tishi{
    width: 500px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    color: blue;
    /* background: yellow; */
     position: absolute;
    top: 90px;
    left: 150px;
  }
  #tishi1{
    width: 500px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    color: red;
    /* background: red; */
    position: absolute;
    top: 90px;
    left: 650px;
  }
</style>
 <body>
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">留言展示</strong><small></small></div>
      </div>

      <hr>
      

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
        </div>
        <div class="am-u-sm-12 am-u-md-3">



      <form action="/liuyan" method="get">
         <div class="am-input-group am-input-group-sm">
           <input type="text" class="am-form-field" name="keywords" value="{{$request['keywords'] or ''}}" placeholder="请输入关键字">
           <span class="am-input-group-btn">
           <input class="am-btn am-btn-default" type="submit" value="搜索">
         </span>
         </div>
         </form>

         <!--  <form action="/type" method="get">
              <div class="am-input-group am-input-group-sm">
             <input type="text" name="keywords" value="{{$request['keywords'] or ''}}"/><input type="submit" value="搜索">
              </div>
          </form> -->

        </div>
      </div>
      <p id="tishi" onclick="tishi()">{{session('success')}}</p>
      <p id="tishi1" onclick="tishi1()">{{session('error')}}</p>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox"></th>
                  <th class="table-id">ID</th>
                  <th class="table-title">uid</th>
                  <th class="table-type">评论人</th>
                  <th class="table-author am-hide-sm-only">内容</th>
                  <th class="table-author am-hide-sm-only">时间</th>
                  <th class="table-set">操作</th>
                </tr>
              </thead>
              <tbody>
             @foreach($data as $row)
                <tr>
                  <td><input type="checkbox"></td>
                 
                  <td>{{$row->id}}</td>
                  <td>
                    <a href="#">{{$row->uid}}</a>
                  </td>
                  <td class="am-hide-sm-only">{{$row->name}}</td>
                  <td class="am-hide-sm-only">{{$row->content}}</td>
                 <td class="am-hide-sm-only">{{$row->time}}</td>
                  <td>
                    <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
 
                        <form action="/liuyan/{{$row->id}}" method="post"> 
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
               @endforeach
              
              </tbody>
            </table>
            <div class="am-cf">
              共 {{$total}} 条记录
              <div class="am-fr">
               {{$data->appends($request)->render()}}
              </div>
            </div>

            <hr>
          </form>
        </div>
      </div>
    </div>
     </body>
     <script type="text/javascript">
        function tishi(){
            //获取提示框
            var tishi = document.getElementById('tishi');
            //alert(tishi);
                tishi.style.display="none";
          }
          function tishi1(){
            //获取提示框
            var tishi1 = document.getElementById('tishi1');
            //alert(tishi);
                tishi1.style.display="none";
          }
     </script>
</html>
@endsection
@section('title','留言展示')