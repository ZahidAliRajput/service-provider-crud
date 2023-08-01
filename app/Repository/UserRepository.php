<?php

namespace App\Repository;

use App\Models\Role;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    public function list(): LengthAwarePaginator
    {
        return User::paginate(10);
    }

    public function findbyid($id)
    {
        return User::find($id);
    }

    public function storeOrUpdate($id = null, $data = [])
    {
        if (is_null($id)) {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            return $user;
        }
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if (array_key_exists('password', $data)) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();
        return $user;
    }

    public function destroybyid($id)
    {
        return User::find($id)->delete();
    }
}
