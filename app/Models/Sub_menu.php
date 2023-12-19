<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_menu extends Model
{
    use HasFactory;
    protected $table = 'sub_menu';
    protected $fillable = [
        'sub_id', 'name'
    ];
    public function setting()
    {
        return $this->hasOne(Setting::class, 'sub_id', 'id');
    }
}
