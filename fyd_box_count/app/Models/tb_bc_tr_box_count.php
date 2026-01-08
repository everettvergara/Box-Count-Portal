<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_bc_tr_box_count extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_bc_tr_box_count';

    protected $fillable = [
        'warehouse_portal_id',
        'trans_id',
        'customer',
        'doc_type',
        'doc_no',
        'doc_date',
        'start_date_time',
        'end_date_time',
        'remarks',
        'box_count',
        'reject_conveyor_count',
        'reject_truck_count',
    ];

    public $sortable = [
        'id',
        'warehouse_portal_id',
        'trans_id',
        'customer',
        'doc_type',
        'doc_no',
        'doc_date',
        'start_date_time',
        'end_date_time',
        'remarks',
        'box_count',
        'reject_conveyor_count',
        'reject_truck_count',
    ];

    public $sortableAs = [
        'warehouse_portal',
    ];
}
