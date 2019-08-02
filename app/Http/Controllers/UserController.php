<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Groupuser;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();   
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $users = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('status','El usuario <strong>'.$users->name.' </strong>se registro exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $groups = Group::all();
        $grupos_usuarios = $user->groups;
        return view('admin.users.edit',['user'=>$user,'groups'=>$groups,'grupos_usuarios'=>$grupos_usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $array_validation = ['name'=>'required'];
        $data = ['name'=>$request->name,'status'=>$request->status];
        $email_validation = ($request->email == $user->email) ? 'no' : 'si';        
        $password_validation = ($request->password == '') ? 'no':'si';

        if($email_validation=='si')
        {
            $array_validation['email']='required|unique:users,email';
            $data['email']=$request->email;
        }
        if($password_validation=='si')
        {
            $array_validation['password']='min:8';
            $data['password'] = Hash::make($request->password);
        }

        $request->validate($array_validation);
            
        $user->fill($data);
        $user->save();
        
        $groups = $user->groups;


        if($request->select_group_add){

            foreach($request->select_group_add as $group_s)
            {
                $existence = 'no';
                foreach($groups as $group)
                {
                    
                   if($group_s == $group->id)
                   {
                       $existence = 'si';
                   } 
                }

                if($existence == 'no')
                {
                    Groupuser::create(['user_id'=>$user->id,'group_id'=>$group_s]);
                }
            }


            foreach($groups as $group)
            {   
                $existence = 'no';
                foreach($request->select_group_add as $group_s)
                {
                    if($group_s == $group->id)
                    {
                        $existence = 'si';
                    }
                }
               

                if($existence == 'no')
                {                    
                    $g_deselected = Groupuser::where('user_id','=',$user->id)->where('group_id','=',$group->id)->get();
                    foreach($g_deselected as $g_d)
                    {
                        $g_eliminar = Groupuser::find($g_d->id);
                        $g_eliminar->delete();
                    }
                }
            }

        }else{
            $g_deselected = Groupuser::where('user_id','=',$user->id)->get();
            foreach($g_deselected as $g_d)
            {
                $g_eliminar = Groupuser::find($g_d->id);
                $g_eliminar->delete();
            }
        }


        return redirect()->route('admin.users.index')->with('status','Usuario actualizaco correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
