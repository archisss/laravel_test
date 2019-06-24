<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['APIUsergetAll'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return $this->list();
  
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
        if($request->status==1){
            $new_status = 0;
        }else{
            $new_status = 1;
        }
        DB::table('users')->where('id', $id)->update([
            'status' => $new_status,
        ]);
        return redirect()->route('user.index');
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

    public function list()
    {
        $users = User::with('Services')->get();
        if($users->isempty()){
            $users = '0';
        }
        return view('user.show', compact('users'));
    }

    public function APIUsergetAll(){
       $all = User::select('id','name')->with('Services:id,name,user_id')->get();
        
        /*$all = DB::table('users')
        ->select('users.id','users.name','services.id','services.name')
        ->join('services', 'services.user_id', '=', 'users.id')
        ->get();*/

         /*$all = DB::table('users')
           ->join('services', 'users.id', '=', 'services.user_id')
           ->select('users.name', 'services.name')
           ->get();

       foreach($all as $cu){
            foreach($all->Services as $service_all){
                
            }
        }*/

        

        if(count($all)==0){
            return response()->json([
                'message' => 'Not Users found',
            ], 404);
        }else{
            return response()->json([
                'status' => 'OK',
                'data' => [ 'users' => $all],
            ], 200); 
        }


    }
}