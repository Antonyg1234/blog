<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=admin::all();
        return view('admin.user.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=role::all();
        return view('admin.user.user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'status'=>'required',

        ]);
       // $request['password']=bcrypt('$request->password');
        //admin::create($request->all());
        if($request->satus==1)
        {
            $status=1;
        }else{
            $status=0;
        }
        $admin=new admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=bcrypt($request->password);
        $admin->contact=$request->contact;
        $admin->status=$status;

        $admin->save();
        $admin->roles()->sync($request->role);
        
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roles=role::all();
        $user=admin::where('id',$id)->first();
        return view('admin/user/edit',compact('user','roles'));
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
       // return $request->status;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'contact'=>'required|numeric',
        ]);

        //$user=admin::where('id',$id)->update($request->except('_token','method'));
        //$request->status? :$request['status']=0;
        if($request->status==1)
        {
         $status=1;
        }else{
         $status=0;
        }
        $admin=admin::find($id);
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->contact=$request->contact;
        $admin->status=$status;

        $admin->save();
        $admin->roles()->sync($request->role);

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id',$id)->delete();
        return redirect()->back();
    }
}
