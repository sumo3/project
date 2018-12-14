<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RolelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=DB::table('role')->get();

        return view('Admin.Rolelist.index',['role'=>$role]);
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

    //分配权限操作
    public function auth($id){
        // echo $id;
        // 获取当前对应的角色信息
        $role = DB::table('role')->where('id','=',$id)->first();
        //获取所有的权限
        $auth=DB::table('node')->get();
        //获取当前角色已有的权限信息
        $data=DB::table('role_node')->where('rid','=',$id)->get();
        //判断
        if (count($data)) {
            //当前角色有角色信息
            //遍历
            foreach($data as $v){
                $nid[]=$v->nid;
            }

            //加载分配权限模版
            return view('Admin.Rolelist.auth',['role'=>$role,'auth'=>$auth,'nid'=>$nid]);
        }else{
            //当前角色没有权限信息
            //加载分配权限模版
        return view('Admin.Rolelist.auth',['role'=>$role,'auth'=>$auth,'nid'=>array()]);
        }
        
    }

    //保存权限
    public function saveauth(Request $request){
        // echo '1';
        //获取角色id
        $id = $request->input('rid');
        //获取分配的权限信息
        $nid = $_POST['nid'];
        //把当前角色已有的权限信息删除
        DB::table('role_node')->where('rid','=',$id)->delete();
        //遍历
        foreach($nid as $key=>$value){
            //封装需要插入的数据
            $data['rid']=$id;
            $data['nid']=$value;

            DB::table('role_node')->insert($data);
        }

        return redirect('/rolelist')->with('success','权限分配成功');

    }

}
