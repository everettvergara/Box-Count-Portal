@hidden([
'name' => 'id',
'value' => $datum->id,
])@endhidden()

@hidden([
'name' => 'box_count_id',
'col' => 'col-12 col-md-6 col-lg-3 mb-3',
'input_class' => '',
'value' => $datum->box_count_id,
])@endhidden()

@text([
'name' => 'filename',
'label' => 'Filename',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('filename') ?? $datum->filename,
'placeholder' => 'Enter the filename',
])@endtext()

@text([
'name' => 'type',
'label' => 'Type',
'col' => 'col-12 col-md-6 col-lg-4 mb-3',
'input_class' => '',
'value' => old('type') ?? $datum->type,
'placeholder' => 'Enter the type',
])@endtext()
