<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_bc_mf_warehouse extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_bc_mf_warehouse';

    protected $fillable = [
        'code',
        'name',
        'remarks',
        'is_active',
    ];

    public $sortable = [
        'id',
        'code',
        'name',
        'remarks',
        'is_active',
    ];
}
