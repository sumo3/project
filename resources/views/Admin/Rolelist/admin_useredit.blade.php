@extends("Admin.AdminPublic.public")
@section("admin")

<link rel="stylesheet" href="/static/admin/css/amazeui.min.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <link rel="stylesheet" href="/static/admin/css/app.css">
 <style>
      .admin-main{
        padding-top: 0px;
      }
    </style>
<div class="am-cf admin-main">
    <!-- content start -->
    <div class="admin-content">
      <div class="admin-content-body">
        <div class="am-g">
          <form class="am-form am-form-horizontal" method="post" style="padding-top:30px" action="/admin_user/{{$user->id}}" data-am-validator>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">
              管理员名 :</label>
              <div class="am-u-sm-9">
                <input type="text" id="doc-vld-pwd-1" required value="{{$user->name}}" 
                  name="name"> <small></small>
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">
                密码 :</label>
              <div class="am-u-sm-9">
                <input type="password" id="doc-vld-pwd-2" required placeholder="请输入..." 
                  name="password"  data-equal-to="#doc-vld-pwd-1"  required> <small></small>
              </div>
            </div>
            <div class="am-form-group">
            {{csrf_field()}}
            {{method_field('PUT')}}
              <div class="am-u-sm-9 am-u-sm-push-3">
                <input type="submit" class="am-btn am-btn-success" value="确认修改" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"
    src="assets/js/libs/jquery-1.10.2.min.js">
  </script>
  <script type="text/javascript" src="myplugs/js/plugs.js">
  </script>
@endsection
@section('title','添加管理员')