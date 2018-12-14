<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/static/admin/css/layui.css">
    </head>

    <body class="layui-layout-body">
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header">
                <div class="layui-logo">南京兄弟连</div>
                <!-- 头部区域（可配合layui已有的水平导航） -->

                <ul class="layui-nav layui-layout-right">
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <img src="/static/admin/images/1.gif" class="layui-nav-img"> 管理员
                        </a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="">基本资料</a>
                            </dd>
                            <dd>
                                <a href="">安全设置</a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="">退了</a>
                    </li>
                </ul>
            </div>

            <div class="layui-side layui-bg-black">
                <div class="layui-side-scroll">
                    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                    <ul class="layui-nav layui-nav-tree" lay-filter="test">
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">用户管理</a>
                            <dl class="layui-nav-child">
                                <dd>
                                    <a href="/user">用户管理</a>
                                </dd>
                                <dd>
                                    <a href="/product">产品管理</a>
                                </dd>
                                <dd>
                                    <a href="/link">友情链接</a>
                                </dd>
                                <dd>
                                    <a href="/liuyan">留言管理</a>
                                </dd>
                            </dl>
                        </li>    
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">资料分类</a>
                            <dl class="layui-nav-child">
                                <dd>
                                    <a href="/type">分类展示</a>
                                </dd>
                                <dd>
                                    <a href="/type/create">添加分类</a>
                                </dd>
                            </dl>
                        </li> 
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">资料</a>
                            <dl class="layui-nav-child">
                                <dd>
                                    <a href="/study">展示</a>
                                </dd>
                                <dd>
                                    <a href="/study/create">资料添加</a>
                                </dd>
                            </dl>
                        </li> 
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">题目分类</a>
                            <dl class="layui-nav-child">
                                <dd>
                                    <a href="/tmtype">分类展示</a>
                                </dd>
                                <dd>
                                    <a href="/tmtype/create">添加分类</a>
                                </dd>
                            </dl>
                        </li>   
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">留言专区</a>
                            <dl class="layui-nav-child">
                                <dd>
                                    <a href="/liuyan">留言展示</a>
                                </dd>
                            </dl>
                        </li>                     
                    </ul>
                </div>
            </div>

            <div class="layui-body" style="z-index: 0;">
                <!-- 内容主体区域 -->
                @section('admin')
                    @show
            </div>

           
        </div>
        
        <script type="text/javascript" src="/static/admin/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/static/admin/myplugs/js/plugs.js">
        </script>
        <script type="text/javascript">
            //添加编辑弹出层
            function updatePwd(title, id) {
                $.jq_Panel({
                    title: title,
                    iframeWidth: 500,
                    iframeHeight: 300,
                    url: "updatePwd.html"
                });
            }
        </script>
        <script src="/static/admin/js/layui.js"></script>
        <script>
            //JavaScript代码区域
            layui.use('element', function() {
                var element = layui.element;

            });
        </script>
    </body>

</html>