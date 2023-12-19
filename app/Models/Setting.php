<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $fillable = [
        'sub_id', 'table_name','id_name','field','keyword','upload_title','status'
    ];
    public function subMenu()
    {
        return $this->belongsTo(Sub_menu::class, 'sub_id', 'id');
    }
}
