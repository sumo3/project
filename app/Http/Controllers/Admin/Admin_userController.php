<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use DB;

class Admin_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $k=$request->input('key');

        //获取总条数
        $total=DB::table('admin_user')->count();
        // var_dump($total);

        // var_dump($k);

        // $data = DB::table('admin_user')->where("name",'like',"%".$k."%")->paginate(3);
        // dd($data);

        $user = DB::table('admin_user')->where("name",'like',"%".$k."%")->paginate(3);

        //传递遍历数据
        return view('Admin.Admin_user.admin_user',['user'=>$user,'request'=>$request->all(),'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Admin_user.admin_useradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->all());
        $data=$request->except('_token');
        // var_dump($data);
        $data['password']=Hash::make($data['password']);
        if (DB::table('admin_user')->insert($data)) {
            return redirect('/admin_user')->with('success','数据添加成功');
        }
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

        $user = DB::table('admin_user')->where('id','=',$id)->first();

        return view('Admin.Admin_user.admin_useredit',['user'=>$user]);
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
        // var_dump($request->all());
        $data=$request->except(['_token','_method']);
        // var_dump($data);

        $data['password']=Hash::make($data['password']);
        if (DB::table('admin_user')->where('id','=',$id)->update($data)) {
            return redirect('/admin_user')->with('success','数据修改成功');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        if (DB::table('admin_user')->where('id','=',$id)->delete()) {
            return redirect('/admin_user')->with('success','删除成功');
        }

        return view('Admin.Admin_user.admin_user');
        
    }

    //分配角色
    public function role($id){
        //获取当前管理员信息
        $user=DB::table('admin_user')->where('id','=',$id)->first();
        //获取所有的角色
        $role=DB::table('role')->get();
        //获取当前用户已有角色信息
        $data=DB::table('user_role')->where('uid','=',$id)->get();
        // dd($data);
        if(count($data)){
            //遍历
            foreach($data as $v){
                $rids[]=$v->rid;
            }

            //加载模版
            return view('Admin.Admin_user.role',['user'=>$user,'role'=>$role,'rids'=>$rids]);
        }else{
            //加载模版 当前用户没有角色信息
            return view('Admin.Admin_user.role',['user'=>$user,'role'=>$role,'rids'=>array()]);
        }
        
    }

    //保存角色
    public function saverole(Request $request){
        // echo 'zz';die;
        //把表单的数据入库到 user_role
        // dd($request->all());
        // 角色id
        $rid=$_POST['rid'];
        //管理员id
        $uid=$request->input('uid');
        //把当前用户已有的角色删除
        DB::table('user_role')->where('uid','=',$uid)->delete();
        foreach ($rid as $key => $v) {
            //封装要插入的数据
            $data['uid']=$uid;
            $data['rid']=$v;
            //插入
            DB::table('user_role')->insert($data);
        }
        return redirect('/admin_user')->with('success','分配成功');
    }
}
