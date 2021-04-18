<?php namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id','user_name','user_email','user_password','user_role','contact','address'];
}