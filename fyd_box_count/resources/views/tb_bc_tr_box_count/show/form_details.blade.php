<div class="card no-shadow mt-3 mb-3 overflow-hidden rounded-3 bg-white">
    <div class="card-body rounded-3 p-3 p-lg-4">
        @php
            $tabs = [
                [
                    'title' => 'Images',
                    'content' => view('components.detail-index', [
                        'title' => '',
                        'route' => 'box-count-images',
                        'detail_var' => 'box_count_image',
                        'header_var' => $route_var,
                        'header_pk' => $route_val,
                        'is_edit' => 1,
                        'columns' => [
                            ['name' => 'filename', 'label' => 'Filename'],
                            ['name' => 'type', 'label' => 'Type'],
                        ],
                        'details' => $box_count_images,
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
