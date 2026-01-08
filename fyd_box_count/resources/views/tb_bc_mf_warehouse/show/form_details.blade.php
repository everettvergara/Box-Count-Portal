<div class="card no-shadow mt-3 mb-3 overflow-hidden rounded-3 bg-white">
    <div class="card-body rounded-3 p-3 p-lg-4">
        @php
            $tabs = [
                [
                    'title' => 'Portals',
                    'content' => view('components.detail-index', [
                        'title' => '',
                        'route' => 'warehouse-portals',
                        'detail_var' => 'warehouse_portal',
                        'header_var' => $route_var,
                        'header_pk' => $route_val,
                        'is_edit' => 1,
                        'columns' => [['name' => 'code', 'label' => 'Code'], ['name' => 'name', 'label' => 'Name']],
                        'details' => $warehouse_portals,
                        'status_id' => 1,
                        'is_delete' => 1,
                    ]),
                ],
            ];
        @endphp
        <div class="mb-3 mb-md-4">
            <x-tabs :tabs="$tabs" />
        </div>
    </div>
</div>
