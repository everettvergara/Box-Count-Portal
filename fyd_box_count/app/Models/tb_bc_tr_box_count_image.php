<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_bc_tr_box_count_image extends Model
{
    use HasFactory;

    protected $table = 'tb_bc_tr_box_count_image';

    protected $fillable = [
        'box_count_id',
        'filename',
        'type'
    ];
}
