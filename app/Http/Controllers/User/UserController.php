<?php

namespace Siscor\Http\Controllers\User;

// use Siscor\User;
// use Illuminate\Http\Request;
// use Siscor\Http\Controllers\Controller;
// use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;
use Siscor\User;
use Siscor\Position;
use Siscor\Http\Controllers\Controller;
use Symfony\Component\Routing\Route;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'lastname', 'phone', 'username', 'email', 'status'])->get();
            return $this->getUserData($users);
        }
        return view('Users.index');
    }
    
    protected function getUserData($data)
    {
        return DataTables::of($data)
        ->addColumn('fullName', function ($user) {return $user->getFullName(); })
        ->addColumn('action', function($user){
            return '
            <a href="#" data-target="#myModal2" class="btn btn-xs btn-primary show" id="'.$user->id.'">
            <i class="fa fa-eye"></i> Ver</a>
            <a href="#" class="btn btn-xs btn-primary edit" id="'.$user->id.'">
            <i class="fa fa-edit"></i> Editar</a>
            <a href="#" class="btn btn-xs btn-primary delete" id="'.$user->id.'">
            <i class="fa fa-remove"></i> Eliminar</a>            
            ';
        })
        ->toJson();
    }

    // public function getPosition(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $allPositionsOfUnit = Position::unitidIs($request->unit_id)->get();
            
    //         $data = [
    //             'list_positions' => $allPositionsOfUnit
    //         ];
    //         return response()->json($data);
    //     }
    // }
    
    
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
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->position_id = $request->position;
        $user->save();
        return redirect()->route('User.index');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return response()->json($user);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        // $user = User::findOrFail($id);
        $user = User::where('id', $id)->select(['id', 'name', 'last_name', 'phone', 'username', 'email', 'status'])->first();
        return response()->json($user);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->save();
        return response()->json("succes");
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return response()->json('succes');
    }
}
