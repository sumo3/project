<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//路径匹配到路由规则  /  就会自动执行function 匿名函数
//Route 底层路由类  get请求方式   /路由规则
// Route::get('/', function () {
//     //加载前台首页
//     echo "这是前台首页";
// });


// //限制参数路由
// Route::get("/order/{name}",function($name){
//     echo "订单名字为:".$name;
// })->where("name",'[a-z]+');

// //传递多个参数
// Route::get("/user/{name}-{id}",function($name,$id){
//     echo "这是用户名字为:".$name;
//     echo "这是用户id为:".$id;

// });

// //路由规则设置
// Route::get("/list",['as'=>'ll',function(){
//     echo "this is list";
// }]);

// //利用路由别名获取原有路由规则
// Route::get("/b",function(){
//     //route 路由函数 功能:通过路由别名获取原有路由规则
//     echo route('ll');
// });

// //前台路由组（项目里）
// Route::group([],function(){
//     //子路由(前台个人中心)
//     Route::get("/homeperson",function(){
//         echo "这是前台个人中心";
//     });

//     //子路由(前台订单中心)
//     Route::get("/homeorder",function(){
//         echo "这是前台订单中心";
//     });
// });

// //后台路由组
// Route::group([],function(){
//     //子路由(后台会员中心)
//     Route::get("/adminuser",function(){
//         echo "这是后台会员中心";
//     });

//     //子路由(后台评价模块)
//     Route::get("/admincom",function(){
//         echo "这是后台的评价模块";
//     }); 
// });

// //加载表单
// Route::get("/add",function(){
//     //加载添加表单
//     return view("form");
// });

// //执行添加
// Route::post("/doadd",function(){
//     echo "this is doadd";
// });

// //Ajax get请求
// Route::get("/getajax",function(){
//     //加载模板
//     return view("ajax");
// });

// Route::get("/doajax",function(){
//     echo "this is get ajax data";
// });

// //Ajax post请求
// Route::get("/getajax1",function(){
//     //加载模板
//     return view("ajax1");
// });

// Route::post("/doajaxs",function(){
//     echo "this is post ajax data";
// });


// //后台商品模块
// Route::get("/adminshop",function(){
//     echo "这是后台商品模块";
// })->middleware("login");

// //后台的登录模板
// Route::get("/login",function(){
//     //加载模板
//     return view("login");
// });

// //中间件结合路由组（项目里推荐使用方法）
// Route::group(["middleware"=>"login"],function(){
//     //后台类别模块
//     Route::get("/admincate",function(){
//         echo "这是后台的类别模块";
//     });

//     //后台订单模块
//     Route::get("/adminorder",function(){
//         echo "这是后台的订单模块";
//     });
// });

// //控制器访问  /adminuser/index 路由规则   Admin\UserController 访问控制器  @ 访问  index 控制器里的方法
// Route::get("/adminuser/index","Admin\UserController@index");
// Route::get("/adminuseradd","Admin\UserController@add");
// Route::post("/adminuserinsert","Admin\UserController@insert");
// //携带参数
// Route::get("/adminuserdelete/{id}","Admin\UserController@delete");

// //控制器结合中间件一
// Route::get("/adminshop/index","Admin\ShopController@index")->middleware('login');

// //控制器结合路由组使用中间件二(项目推荐用法)
// Route::group(["middleware"=>'login'],function(){
//     Route::get("/adminorder/index","Admin\OrderController@index");
//     Route::get("/admincate/index","Admin\CateController@index");
// });

//资源控制器(项目里推荐用法)
//把控制器的所有方法统统交给同一个路由去处理(简化代码)
//Route::resource("/ads","Admin\AdsController");

//文件操作
//Route::resource("/file","Admin\FileController");


//数据库操作
Route::resource("/db","Admin\DbController");

//加载后台首页
Route::resource("/admin","Admin\AdminController");

//用户模块
Route::resource("/user","Admin\UserController");

//产品管理
Route::resource("/product","Admin\ProductController");

//友情链接
Route::resource("/link","Admin\LinkController");

//留言管理
Route::resource("/liuyan","Admin\LiuyanController");

//前台首页
Route::resource("/","Home\IndexController");

//后台学习资料分类模块
Route::resource("/type","Admin\TypeController");

//学习资料模块
Route::resource("/study","Admin\StudyController");

//后台题目分类模块
Route::resource("/tmtype","Admin\TMTypeController");

//后台音乐模块
Route::resource("/liuyan","Admin\LiuyanController");