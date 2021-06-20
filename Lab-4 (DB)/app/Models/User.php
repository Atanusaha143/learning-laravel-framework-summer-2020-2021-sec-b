<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'all_users'; // when table name is not plural and model name is not singular
    protected $primaryKey = 'user_id'; // when primary key name is not Id
    public $timestamps = false; // won't search CREATED_AT & UPDATED_AT

    // when CREATED_AT & UPDATED_AT column name is different in table
    /*const UPDATED_AT = 'create_time';
    const CREATED_AT = 'update_time';*/
}
