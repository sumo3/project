<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->pull('name');
        $request->session()->pull('nodelist');
        return redirect("/login/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.AdminLogin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //获取管理员用户名
        // $data=$request->except('_token');
        // dd($data);
        
        $name = $request->input('name');
        $password = $request->input('password');

        // dd($name);
        // dd($password);

        $user = DB::table('admin_user')->where('name','=',$name)->first();
        // 检测用户名
        if ($user) {
                    
                //检测密码
                if (Hash::check($password,$user->password)) {

                    //把登陆信息写入session里
                    session(['name'=>$name]);

                    //1.获取登陆用户的所有权限列表
                    $list = DB::select("select n.name,n.mname,n.aname from user_role as ur,node as n,role_node as rn where ur.rid=rn.rid and rn.nid=n.id and uid={$user->id}");
                    // var_dump($list);die;
                    
                    //2.初始化权限列表
                    //写入所有管理员公共模块 - 后台首页
                    $nodelist['AdminController'][]='index';
                    //遍历
                    foreach ($list as $v) {
                        //把管理员所有权限写入$nodelist数组里
                        $nodelist[$v->mname][]=$v->aname;
                        //判断如果有create方法添加store
                        if ($v->aname=='create') {
                            $nodelist[$v->mname][]='store';
                        }

                        //判断如果有edit方法添加update
                        if ($v->aname=='edit') {
                            $nodelist[$v->mname][]='update';
                        }
                    }
                    // var_dump($nodelist);die;
                    
                    //3.将登陆用户所有权限列表存储在session里
                    session(['nodelist'=>$nodelist]);
                    


                    return redirect('/admin');
                }else{
                    return back()->with('error','用户名或密码不正确');
                }

            }else{
                return back()->with('error','用户名或密码不正确');
            

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
