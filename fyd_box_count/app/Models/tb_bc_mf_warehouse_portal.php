<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_bc_mf_warehouse_portal extends Model
{
    use HasFactory;

    protected $table = 'tb_bc_mf_warehouse_portal';

    protected $fillable = [
        'warehouse_id',
        'code',
        'name',
        'remarks',
        'is_active',
    ];
}
