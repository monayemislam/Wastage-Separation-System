<?php namespace App\Models;

use CodeIgniter\Model;

class Units extends Model
{
    protected $table = 'wastage_unit';
    protected $primaryKey = 'wastage_unit_id';
    protected $allowedFields = ['wastage_unit_id','wastage_unit_name','wastage_unit_description'];
}