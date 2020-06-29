<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $users = User::where('name','LIKE','%'.$request->cari.'%')->orderby('id');
        }else{
            $users = User::orderby('id');
        }
        $users = $users->paginate(5);
        $users->appends($request->only('cari'));
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required','same:password']
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong, minimal 8 karakter',
            'password_confirmation.required' => 'Password tidak sama',
        ]);

        if ($validator->fails()) {
            return redirect('user/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //request semua data form yang diinputkan
        $input = $request->all();
        //encrypt password
        $input['password'] = bcrypt($input['password']);
        //create hasil imput ke database
        User::create($input);
        return redirect('/user')->with('Success','Data berhasil disimpan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.profil',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
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

        //validate
         $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required'],
         ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect('user')
                        ->withErrors($validator)
                        ->withInput();
        }
        //temukan id user
        $user = User::find($id);

        //ubah role
        if($user->role == 'user'){
            $user->role = $user->assignRole('admin');
        }else if($user->role == 'admin'){
            $user->role = $user->assignRole('user');
        }
        
        //update
        $user->update($request->all());
        return redirect('/user')->with('Success','Data berhasil diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('Success','Data berhasil dihapus!!');
    }


}
