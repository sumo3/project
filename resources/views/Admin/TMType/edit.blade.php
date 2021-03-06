<?php //dd($info1); ?>
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
       
          <form class="am-form am-form-horizontal" method="post" action="/tmtype/{{$info->id}}" style="padding-top:30px;" data-am-validator>
            
            <div class="am-form-group">
             
              <label for="user-name" class="am-u-sm-3 am-form-label">
              类名</label>
              <div class="am-u-sm-9">
                <input type="text" id="doc-vld-pwd-1" required value="{{$info->name}}" 
                  name="name">
              </div>
             
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">父类</label>
              <div class="am-u-sm-9">
              <!-- <?php ($data) ?> -->

                  <select class="large" name="pid">
                  <option value="{{$info1->id}}">{{$info1->name}}</option>
                  @foreach($data as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                   @endforeach

                  </select>
                 
                  </div>
             </div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">是否显示</label>
              <div class="am-u-sm-9">
                <input type="text" id="doc-vld-pwd-2" required value="{{$info->status}}" 
                  name="status"  data-equal-to="#doc-vld-pwd-1"  required>
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
              {{csrf_field()}}
            {{method_field("PUT")}}
                <input type="submit" class="am-btn am-btn-success" value="提交修改" />
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
@section('title','分类修改')