<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB 
use DB;//== Model类
class DbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //数据库的基本操作 操作表users
        //获取数据表数据
         $data=DB::select("select * from info");
         dd($data);
        // echo "<pre>";
        // var_dump($data);exit;
        //加载模板 分配数据
        // return view("Admin.Db.index",['data'=>$data]);
        //删除数据
        // DB::delete("delete from users where id=361");
        //一般语句只能删除表 和创建表
        // DB::statement("drop table stuss");

        //构造器(连贯方法) 使用更加灵活 满足需求多
        //获取所有数据
        // $alldata=DB::table('users')->get();
        //获取单条数据
        // $onlydata=DB::table("users")->where("id",'=',351)->first();
        //获取单条结果中某个字段
        // $username=DB::table("users")->where("id",'=',351)->value('username');
        //获取某一列数据
        // $data1=DB::table("users")->pluck('username');
        //插入单条数据
        // DB::table("users")->insert(['username'=>'sss','password'=>'123','email'=>'123@qq.com','status'=>1,'token'=>'sss','phone'=>'12312312']);
        // //多条数据
        // DB::table("users")->insert([
        // ['username'=>'sss11','password'=>'123','email'=>'123@qq.com','status'=>1,'token'=>'sss','phone'=>'12312312'],
        // ['username'=>'sss22','password'=>'123','email'=>'123@qq.com','status'=>1,'token'=>'sss','phone'=>'12312312']    
        //                             ]);
        //插入数据的同时获取id
        // $id=DB::table("users")->insertGetId(['username'=>'sss1111','password'=>'123','email'=>'123@qq.com','status'=>1,'token'=>'sss','phone'=>'12312312']);
        //删除数据
        // DB::table("users")->where("id",'=',377)->delete();
        //获取指定字段信息
        // $data=DB::table("users")->select("username",'email','phone as p')->get();
        //模糊搜索
        // $res=DB::table("users")->where("username",'like',"%s%")->get();
        //排序
        // $ress=DB::table("users")->orderBy('id','desc')->get();

        //获取搜索关键词
        // $k=$request->input('keywords');
        // echo $k;
        //分页+搜索 paginate 分页方法 3 每页显示的数据条数
        // $resus=DB::table("users")->where("username",'like',"%".$k."%")->paginate(3);
        // return view("Admin.Db.index",['data'=>$resus,'request'=>$request->all()]);

        //获取数据的总条数
        // $tot=DB::table("users")->count();
        //表关联普通
        // $data1=DB::select("select cates.id as cid,cates.name as cname,shops.id as sid,shops.name as sname from cates,shops where cates.id=shops.cate_id");
        //表关联的连贯方法
        // $data2=DB::table("cates")->join('shops','cates.id','=','shops.cate_id')->select('cates.id as cid','cates.name as cname','shops.id as sid','shops.name as sname')->get();

        // dd($data2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
