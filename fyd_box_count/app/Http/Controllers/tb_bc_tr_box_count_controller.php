<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_bc_tr_box_count_request;
use App\Models\tb_bc_mf_warehouse_portal;
use App\Models\tb_bc_tr_box_count;
use App\Models\tb_bc_tr_box_count_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tb_bc_tr_box_count_controller extends Controller
{
    protected $route;
    protected $route_var;
    protected $title;
    protected $view_path;

    public function __construct()
    {
        $this->route = 'box-counts';
        $this->route_var = 'box_count';
        $this->title = 'Box Count';
        $this->view_path = 'tb_bc_tr_box_count';
    }

    public function index(Request $r)
    {
        store_audit(Auth::user()->id, $this->title);
        $customer = $r['customer'];
        $data = tb_bc_tr_box_count::select('tb_bc_tr_box_count.*', 'b.name as warehouse_portal')
            ->leftJoin('tb_bc_mf_warehouse_portal as b', 'b.id', 'tb_bc_tr_box_count.warehouse_portal_id')
            ->when(isset($customer), function ($q) use ($customer) {
                return $q->where('tb_bc_tr_box_count.customer', 'like', '%' . $customer . '%');
            })
            ->sortable()
            ->paginate(config('services.row_manager.row_count'));
        $filters    = view($this->view_path . '.index.filters', [
            'customer' => $customer
        ])->render();
        $tr_header  = view($this->view_path . '.index.tr_header')->render();
        $tr_body    = view($this->view_path . '.index.tr_body', [
            'data'      => $data,
            'route'     => $this->route,
            'route_var' => $this->route_var,
        ]);
        return view('base.header.index', [
            'route'         => $this->route,
            'filters'       => $filters,
            'title'         => $this->title,
            'tr_header'     => $tr_header,
            'tr_body'       => $tr_body,
            'data'          => $data,
        ]);
    }

    public function create()
    {
        $dropdowns = $this->get_dropdowns();
        $form_fields = view($this->view_path . '.create.form_fields', [
            'warehouse_portals' => $dropdowns['warehouse_portals'],
        ])->render();
        return view('base.header.create', [
            'route'         => $this->route,
            'title'         => $this->title,
            'form_fields'   => $form_fields,
        ]);
    }

    public function store(tb_bc_tr_box_count_request $r)
    {
        $validatedData = $r->validated();
        $datum = new tb_bc_tr_box_count();
        $datum->fill($validatedData);
        $datum->save();
        return redirect()->route($this->route . '.show', [$this->route_var => $datum->id])->with('status', 'Success!');
    }

    public function show($id)
    {
        $datum = tb_bc_tr_box_count::findOrFail($id);
        $dropdowns = $this->get_dropdowns();
        $form_fields = view($this->view_path . '.show.form_fields', [
            'datum'             => $datum,
            'warehouse_portals' => $dropdowns['warehouse_portals'],
        ])->render();
        $details = $this->get_details($datum->id);
        $form_details = view($this->view_path . '.show.form_details', [
            'route_var'                 => $this->route_var,
            'route_val'                 => $datum->id,
            'box_count_images'          => $details['box_count_images'],
        ])->render();
        return view('base.header.show', [
            'route'         => $this->route,
            'route_var'     => $this->route_var,
            'route_val'     => $datum->id,
            'title'         => $this->title,
            'form_fields'   => $form_fields,
            'form_details'  => $form_details,
        ]);
    }

    public function edit($id)
    {
        $datum = tb_bc_tr_box_count::findOrFail($id);
        $dropdowns = $this->get_dropdowns();
        $form_fields = view($this->view_path . '.edit.form_fields', [
            'datum'             => $datum,
            'warehouse_portals' => $dropdowns['warehouse_portals'],
        ])->render();
        return view('base.header.edit', [
            'route'         => $this->route,
            'route_var'     => $this->route_var,
            'route_val'     => $datum->id,
            'title'         => $this->title,
            'form_fields'   => $form_fields,
        ]);
    }

    public function update(tb_bc_tr_box_count_request $r, $id)
    {
        $datum = tb_bc_tr_box_count::findOrFail($id);
        $validatedData = $r->validated();
        $datum->fill($validatedData);
        $datum->update();
        return redirect()->route($this->route . '.show', [$this->route_var => $datum->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id)
    {
        $datum = tb_bc_tr_box_count::findOrFail($id);
        tb_bc_tr_box_count_image::where('box_count_id', $datum->id)->delete();
        $datum->delete();
        return redirect()->route($this->route . '.index')->with('status', 'Success!');
    }

    private function get_dropdowns()
    {
        return [
            'warehouse_portals' =>  tb_bc_mf_warehouse_portal::get(),
        ];
    }

    private function get_details($fk)
    {
        return [
            'box_count_images' => tb_bc_tr_box_count_image::where('box_count_id', $fk)->get(),
        ];
    }
}
