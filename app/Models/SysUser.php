<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysUser extends Model
{
    use HasFactory;

    protected $table = 'sys_user';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'level'
    ];
}
