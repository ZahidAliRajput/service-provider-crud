<?php

namespace App\Http\Controllers;

use App\Repository\IUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(IUserRepository $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->list();
        return view('user.manage', get_defined_vars());
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
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $this->user->storeOrUpdate($id = null, $data);

        return redirect()->route('user.index')->with([
            'message' => 'User added successfully!',
            'status' => 'success'
        ]);
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
        $user = $this->user->findbyid($id);
        return view('user.edit', get_defined_vars());
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
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        if ($request->password != null ) {
            $data = array_merge($data, $request->validate([
                'password' => 'required|min:6',
            ]));
        }
        $this->user->storeOrUpdate($id, $data);

        return redirect()->route('user.index')->with([
            'message' => 'User updated successfully!',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroybyid($id);
        return redirect()->route('user.index')->with([
            'message' => 'User deleted successfully!',
            'status' => 'success'
        ]);
    }
}
