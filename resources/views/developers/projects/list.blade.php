@php
    $parameters = [
         [
            'name' => 'search',
            'type' => 0,
            'format' => 'string',
            'description' => __('The search query.')
        ], [
            'name' => 'search_by',
            'type' => 0,
            'format' => 'string',
            'description' => __('Search by') . '. ' . __('Possible values are: :values.', [
                'values' => implode(', ', [
                    __(':value for :name', ['value' => '<code>project</code>', 'name' => '<span class="font-weight-medium">'.__('Name').'</span>'])
                    ])
                ]) .' ' . __('Defaults to: :value.', ['value' => '<code>project</code>'])
        ], [
            'name' => 'sort_by',
            'type' => 0,
            'format' => 'string',
            'description' => __('Sort by') . '. ' . __('Possible values are: :values.', [
                'values' => implode(', ', [
                    __(':value for :name', ['value' => '<code>created_at</code>', 'name' => '<span class="font-weight-medium">'.__('Date created').'</span>']),
                    __(':value for :name', ['value' => '<code>project</code>', 'name' => '<span class="font-weight-medium">'.__('Name').'</span>'])
                    ])
                ]) .' ' . __('Defaults to: :value.', ['value' => '<code>created_at</code>'])
        ], [
            'name' => 'sort',
            'type' => 0,
            'format' => 'string',
            'description' => __('Sort') . '. ' . __('Possible values are: :values.', [
                'values' => implode(', ', [
                    __(':value for :name', ['value' => '<code>desc</code>', 'name' => '<span class="font-weight-medium">'.__('Descending').'</span>']),
                    __(':value for :name', ['value' => '<code>asc</code>', 'name' => '<span class="font-weight-medium">'.__('Ascending').'</span>'])
                    ])
                ]) .' ' . __('Defaults to: :value.', ['value' => '<code>desc</code>'])
        ], [
            'name' => 'per_page',
            'type' => 0,
            'format' => 'integer',
            'description' => __('Results per page') . '. '. __('Possible values are: :values.', [
                'values' => '<code>' . implode('</code>, <code>', [10, 25, 50, 100]) . '</code>'
                ]) .' ' . __('Defaults to: :value.', ['value' => '<code>'.config('settings.paginate').'</code>'])
        ]
    ];
@endphp

@include('developers.parameters')
