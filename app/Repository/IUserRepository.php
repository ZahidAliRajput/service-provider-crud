<?php

namespace App\Repository;
use App\Models\User;

use Illuminate\Pagination\LengthAwarePaginator;

interface IUserRepository {
    //here all the functions of this user related crud goes here
    public function list() : LengthAwarePaginator;
    public function findbyid($id);
    public function storeOrUpdate($id = null, $data = []);
    public function destroybyid($id);
}
