@hidden([
'name' => 'id',
'value' => $datum->id,
])@endhidden()

@select([
'name' => 'warehouse_portal_id',
'label' => 'Warehouse Portal',
'elements' => $warehouse_portals,
'value' => old('warehouse_portal_id') ?? $datum->warehouse_portal_id,
'col' => 'col-12 col-md-6 col-lg-4 col-xl-3 mb-3',
'input_class' => '',
'default' => 'Enter the Warehouse Portal',
'disabled' => 1,
])@endselect()

@text([
'name' => 'trans_id',
'label' => 'Trans ID',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('trans_id') ?? $datum->trans_id,
'placeholder' => 'Enter the Trans ID',
'disabled' => 1,
])@endtext()

@text([
'name' => 'customer',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('customer') ?? $datum->customer,
'placeholder' => 'Enter the Customer',
'disabled' => 1,
])@endtext()

@text([
'name' => 'doc_type',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('doc_type') ?? $datum->doc_type,
'placeholder' => 'Enter the Doc type',
'disabled' => 1,
])@endtext()

@text([
'name' => 'doc_no',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('doc_no') ?? $datum->doc_no,
'placeholder' => 'Enter the Doc No',
'disabled' => 1,
])@endtext()

@text([
'name' => 'doc_date',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('doc_date') ?? $datum->doc_date,
'placeholder' => 'Enter the Doc Date',
'disabled' => 1,
])@endtext()

@text([
'name' => 'start_date_time',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('start_date_time') ?? $datum->start_date_time,
'placeholder' => 'Enter the Start Date Time',
'disabled' => 1,
])@endtext()

@text([
'name' => 'end_date_time',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('end_date_time') ?? $datum->end_date_time,
'placeholder' => 'Enter the End Date Time',
'disabled' => 1,
])@endtext()

@textarea([
'name' => 'remarks',
'label' => 'Remarks',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('remarks') ?? $datum->remarks,
'placeholder' => 'Enter your remarks',
'disabled' => 1,
])@endtextarea()

@text([
'name' => 'box_count',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('box_count') ?? $datum->box_count,
'placeholder' => 'Enter the Box Count',
'type' => 'number',
'disabled' => 1,
])@endtext()

@text([
'name' => 'reject_conveyor_count',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('reject_conveyor_count') ?? $datum->reject_conveyor_count,
'placeholder' => 'Enter the Reject Conveyor Count',
'type' => 'number',
'disabled' => 1,
])@endtext()

@text([
'name' => 'reject_truck_count',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('reject_truck_count') ?? $datum->reject_truck_count,
'placeholder' => 'Enter the Rejec Truck Count',
'type' => 'number',
'disabled' => 1,
])@endtext()
