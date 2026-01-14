<?php

namespace App\Http\Controllers;

use App\Models\tb_bc_tr_box_count;
use App\Models\tb_bc_tr_box_count_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class box_count_controller extends Controller
{
    public function create_transaction(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'warehouse_portal_id'   => 'required',
            'trans_id'              => 'required',
            'customer'              => 'required',
            'doc_type'              => 'required',
            'doc_no'                => 'required',
            'doc_date'              => 'required',
            'start_date_time'       => 'required',
            'end_date_time'         => 'required',
            'remarks'               => 'required',
            'box_count'             => 'required',
            'reject_conveyor_count' => 'required',
            'reject_truck_count'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => $validator->errors()->first(), // return first error message
                ]
            ], 422);
        }
        $validatedData = $validator->validated();
        try {
            $datum = new tb_bc_tr_box_count();
            $datum->fill([
                'warehouse_portal_id'   => $validatedData['warehouse_portal_id'],
                'trans_id'              => $validatedData['trans_id'],
                'customer'              => $validatedData['customer'],
                'doc_type'              => $validatedData['doc_type'],
                'doc_no'                => $validatedData['doc_no'],
                'doc_date'              => $validatedData['doc_date'],
                'start_date_time'       => $validatedData['start_date_time'],
                'end_date_time'         => $validatedData['end_date_time'],
                'remarks'               => $validatedData['remarks'],
                'box_count'             => $validatedData['box_count'],
                'reject_conveyor_count' => $validatedData['reject_conveyor_count'],
                'reject_truck_count'    => $validatedData['reject_truck_count'],
            ]);
            $datum->save();
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 'ERROR',
                    'message' => $th->getMessage(),
                ]
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data'    => $datum->id,
        ], 200);
    }

    public function update_count(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'box_count_id'          => 'required',
            'filename'              => 'required',
            'type'                  => 'required',
            'b64'                   => 'nullable',
            'qty'                   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => $validator->errors()->first(), // return first error message
                ]
            ], 422);
        }
        $validatedData = $validator->validated();
        try {
            $datum = new tb_bc_tr_box_count_image();
            $datum->fill([
                'box_count_id'          => $validatedData['box_count_id'],
                'filename'              => $validatedData['filename'],
                'type'                  => $validatedData['type'],
            ]);
            $datum->save();
            // Save Image
            if (isset($validatedData['b64'])) {
                Storage::disk('out')->put($validatedData['filename'], base64_decode($validatedData['b64']));
            }

            $box_count = tb_bc_tr_box_count::where('id', $datum->box_count_id)->first();
            switch (true) {
                case $datum->type == 'REJECT':
                    $box_count->update([
                        'box_count' => $box_count->reject_conveyor_count + $validatedData['qty']
                    ]);
                    break;
                case $datum->type == 'RETURN':
                    $box_count->update([
                        'box_count' => $box_count->reject_truck_count + $validatedData['qty']
                    ]);
                    break;
                case $datum->type == 'BOX_COUNT':
                    $box_count->update([
                        'box_count' => $box_count->box_count + $validatedData['qty']
                    ]);
                    break;
                default:
                    # code...
                    break;
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 'ERROR',
                    'message' => $th->getMessage(),
                ]
            ], 401);
        }

        return response()->json([
            'success' => true,
        ], 200);
    }
}
