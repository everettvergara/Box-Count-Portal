<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_bc_mf_warehouse_request;
use App\Models\tb_bc_mf_warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tb_bc_mf_warehouse_controller extends Controller
{
    protected $route;
    protected $route_var;
    protected $title;
    protected $view_path;

    public function __construct()
    {
        $this->route = 'warehouses';
        $this->route_var = 'warehouse';
        $this->title = 'Warehouse';
        $this->view_path = 'tb_bc_mf_warehouse';
    }

    public function index(Request $r)
    {
        store_audit(Auth::user()->id, $this->title);
        $name = $r['name'];
        $data = tb_bc_mf_warehouse::select('tb_bc_mf_warehouse.*')
            ->when(isset($name), function ($q) use ($name) {
                return $q->where('tb_bc_mf_warehouse.name', 'like', '%' . $name . '%');
            })
            ->sortable()
            ->paginate(config('services.row_manager.row_count'));
        $filters    = view($this->view_path . '.index.filters', [
            'name' => $name
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
        $form_fields = view($this->view_path . '.create.form_fields', [])->render();
        return view('base.header.create', [
            'route'         => $this->route,
            'title'         => $this->title,
            'form_fields'   => $form_fields,
        ]);
    }

    public function store(tb_bc_mf_warehouse_request $r)
    {
        $validatedData = $r->validated();
        $datum = new tb_bc_mf_warehouse();
        $datum->fill($validatedData);
        $datum->save();
        return redirect()->route($this->route . '.show', [$this->route_var => $datum->id])->with('status', 'Success!');
    }

    public function show($id)
    {
        $datum = tb_bc_mf_warehouse::findOrFail($id);
        $form_fields = view($this->view_path . '.show.form_fields', [
            'datum'             => $datum,
        ])->render();
        return view('base.header.show', [
            'route'         => $this->route,
            'route_var'     => $this->route_var,
            'route_val'     => $datum->id,
            'title'         => $this->title,
            'form_fields'   => $form_fields,
        ]);
    }

    public function edit($id)
    {
        $datum = tb_bc_mf_warehouse::findOrFail($id);
        $form_fields = view($this->view_path . '.edit.form_fields', [
            'datum'             => $datum,
        ])->render();
        return view('base.header.edit', [
            'route'         => $this->route,
            'route_var'     => $this->route_var,
            'route_val'     => $datum->id,
            'title'         => $this->title,
            'form_fields'   => $form_fields,
        ]);
    }

    public function update(tb_bc_mf_warehouse_request $r, $id)
    {
        $datum = tb_bc_mf_warehouse::findOrFail($id);
        $validatedData = $r->validated();
        $datum->fill($validatedData);
        $datum->update();
        return redirect()->route($this->route . '.show', [$this->route_var => $datum->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id)
    {
        $datum = tb_bc_mf_warehouse::findOrFail($id);
        $datum->delete();
        return redirect()->route($this->route . '.index')->with('status', 'Success!');
    }
}
