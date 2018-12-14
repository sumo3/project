@extends("Admin.AdminPublic.public")
@section('admin')
<link rel="stylesheet" href="/static/admin/css/amazeui.min.css" />
<link rel="stylesheet" href="/static/admin/css/admin.css" />
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style type="text/css" media="screen">
  #tishi{
    width: 1000px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    color: red;
    /* background: red; */
    margin-left: 50px;
  }
</style>
<div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理员列表</strong><small></small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <a type="button" class="am-btn am-btn-default" href="/admin_user/create"><span class="am-icon-plus"></span> 新增</a>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">

        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <span class="am-input-group-btn">
            <form action="/admin_user" method="get">
               <div class="am-input-group am-input-group-sm">
                 <input type="text" class="am-form-field" name="key" value="{{$request['key'] or ''}}" placeholder="请输入关键字">
                 <span class="am-input-group-btn">
                 <input class="am-btn am-btn-default" type="submit" value="搜索">
               </span>
               </div>
         </form>
          </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form" action="" method="post">
            <table class="am-table am-table-striped am-table-hover table-main">
               <p id="tishi" onclick="tishi()">{{session('success')}}</p>
              <thead>
                <tr>
                  <th class="table-check"><input type="checkbox"></th>
                  <th class="table-id">ID</th>
                  <th class="table-title">用户名</th>
                  <th class="table-type">密码</th>
                  <th class="table-set">操作</th>
                </tr>
              </thead>
              <tbody>
         
                @foreach($user as $row)
                <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$row->id}}</td>
                  <td>
                    <a href="#">{{$row->name}}</a>
                  </td>
                  <td class="am-hide-sm-only">{{$row->password}}</td>
                  <td>
                    <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
                      <a class="btn btn-info" href="/adminrole/{{$row->id}}"> 分配角色</a><br>
                        <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="/admin_user/{{$row->id}}/edit"><span class="am-icon-pencil-square-o"></span> 编辑</a><br>
                        
                        
                              <form action="/admin_user/{{$row->id}}" method="post">
                              
                                 {{csrf_field()}}
                                 {{method_field('DELETE')}}
                                  <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" type="submit"><span class="am-icon-trash-o"></span> 删除</button>

                              </form>

                      
                    
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="am-cf">
              共<span style="color:red">{{$total}}</span>条记录
              <div class="am-fr">
               {{$user->appends($request)->render()}}
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
     <script type="text/javascript">
        function tishi(){
            //获取提示框
            var tishi = document.getElementById('tishi');
            //alert(tishi);
                tishi.style.display="none";
          }
     </script>
@endsection
@section('title','管理员列表')