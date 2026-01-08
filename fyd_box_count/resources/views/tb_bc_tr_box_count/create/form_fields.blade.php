@hidden([
'name' => 'id',
'value' => old('id')
])@endhidden()

@select([
'name' => 'warehouse_portal_id',
'label' => 'Warehouse Portal',
'elements' => $warehouse_portals,
'value' => old('warehouse_portal_id'),
'col' => 'col-12 col-md-6 col-lg-4 col-xl-3 mb-3',
'input_class' => '',
'default' => 'Enter the Warehouse Portal',
])@endselect()

@text([
'name' => 'trans_id',
'label' => 'Trans ID',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('trans_id'),
'placeholder' => 'Enter the Trans ID',
])@endtext()

@text([
'name' => 'customer',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('customer'),
'placeholder' => 'Enter the Customer',
])@endtext()

@text([
'name' => 'doc_type',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('doc_type'),
'placeholder' => 'Enter the Doc type',
])@endtext()

@text([
'name' => 'doc_no',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('doc_no'),
'placeholder' => 'Enter the Doc No',
])@endtext()

@text([
'name' => 'doc_date',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('doc_date'),
'placeholder' => 'Enter the Doc Date',
])@endtext()

@text([
'name' => 'start_date_time',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('start_date_time'),
'placeholder' => 'Enter the Start Date Time',
])@endtext()

@text([
'name' => 'end_date_time',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('end_date_time'),
'placeholder' => 'Enter the End Date Time',
])@endtext()

@textarea([
'name' => 'remarks',
'label' => 'Remarks',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('remarks'),
'placeholder' => 'Enter your remarks',
])@endtextarea()

@text([
'name' => 'box_count',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('box_count'),
'placeholder' => 'Enter the Box Count',
'type' => 'number',
])@endtext()

@text([
'name' => 'reject_conveyor_count',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('reject_conveyor_count'),
'placeholder' => 'Enter the Reject Conveyor Count',
'type' => 'number',
])@endtext()

@text([
'name' => 'reject_truck_count',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('reject_truck_count'),
'placeholder' => 'Enter the Rejec Truck Count',
'type' => 'number',
])@endtext()
