<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Franqueado;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;


class UserController extends Controller
{

    function __construct()
    {
         //$this->middleware('permission:users-criar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request->search)){
            $search = $request->search;     

            $users = User::where('name','LIKE', '%'.$search.'%' )
            ->orWhere('email','LIKE', '%'.$search.'%' )
            ->orderBy('id','DESC')->paginate(10);

            return view('usuarios.index',compact(['users','search']))
                ->with('i', ($request->input('page', 1) - 1) * 20);
        }else{
            $search = "";
            $users = User::orderBy('id','DESC')->paginate(20);
            return view('usuarios.index',compact(['users','search']))
                ->with('i', ($request->input('page', 1) - 1) * 20);
        }


/*

        $data = User::orderBy('id','DESC')->paginate(5);
        return view('usuarios.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
            */
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        // dd($roles);

        return view('usuarios.create',compact('roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('usuarios.index')
                        ->with('success','Usuário criado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //dd($id);
        $usuario = User::where('id','=', $id)->first();
        //dd($usuario);

        return view('usuarios.show',compact('usuario'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        $usuario = User::where('id', '=',$id)->first();
        $roles = Role::pluck('name','name')->all();

        //dd($usuario);
       // $userRole = $user->roles->pluck('name','name')->all();
        //dd($userRole);


        return view('usuarios.edit',compact('usuario','roles'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = User::where('id','=',$id)->first()->password;
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));


        return redirect()->route('usuarios.index')
                        ->with('success','Usuário atualizado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        

        return redirect()->route('usuarios.index')
                        ->with('success','Usuário excluído com sucesso');
    }
}