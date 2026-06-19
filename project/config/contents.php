<?php
return [
    'why-chose-us' => [
        'field_name' => [
            'title' => 'text',
            'information' => 'textarea',
            'image' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'information.*' => 'required|max:300',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ]
    ],
    'testimonial' => [
        'field_name' => [
            'name' => 'text',
            'designation' => 'text',
            'review' => 'text',
            'description' => 'textarea',
            'image' => 'file'
        ],
        'validation' => [
            'name.*' => 'required|max:100',
            'designation.*' => 'required|max:2000',
            'review.*' => 'required|integer|between:1,5',
            'description.*' => 'required|max:2000',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '70x70'
        ]
    ],
    'blog' => [
        'field_name' => [
            'title' => 'text',
            'author' => 'text',
            'description' => 'textarea',
            'image' => 'file'
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'author.*' => 'required|max:30',
            'description.*' => 'required|max:20000',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '730x515',
            'thumb' => '350x240'
        ]
    ],
    'statistics' => [
        'field_name' => [
            'title' => 'text',
            'number' => 'text'
        ],
        'validation' => [
            'title.*' => 'required|max:190',
            'number.*' => 'required|integer'
        ]
    ],
    'skills' => [
        'field_name' => [
            'name' => 'text',
            'percentage' => 'text'
        ],
        'validation' => [
            'name.*' => 'required|max:190',
            'percentage.*' => 'required|integer'
        ]
    ],
    'equipment' => [
        'field_name' => [
            'item' => 'text',
        ],
        'validation' => [
            'item.*' => 'required|max:1000',
        ]
    ],
    'services' => [
        'field_name' => [
            'name' => 'text',
            'image' => 'file'
        ],
        'validation' => [
            'name.*' => 'required|max:500',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '316x402'
        ]
    ],
    'team' => [
        'field_name' => [
            'name' => 'text',
            'designation' => 'text',
            'dribbble' => 'text',
            'behance' => 'text',
            'instagram' => 'text',
            'flikr' => 'text',
            'facebook' => 'text',
            'image' => 'file'
        ],
        'validation' => [
            'name.*' => 'required|max:500',
            'designation.*' => 'required|max:500',
            'dribbble.*' => 'url',
            'behance.*' => 'url',
            'instagram.*' => 'url',
            'flikr.*' => 'url',
            'facebook.*' => 'url',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '316x402'
        ]
    ],
    'social' => [
        'field_name' => [
            'name' => 'text',
            'icon' => 'icon',
            'link' => 'url',
        ],
        'validation' => [
            'name.*' => 'required|max:100',
            'icon.*' => 'required|max:100',
            'link.*' => 'required|max:100'
        ],
    ],

    'message' => [
        'required' => 'This field is required.',
        'min' => 'This field must be at least :min characters.',
        'max' => 'This field may not be greater than :max characters.',
        'image' => 'This field must be image.',
        'mimes' => 'This image must be a file of type: jpg, jpeg, png.',
        'between' => 'This field only contain a digit between 1 to 5',
        'integer' => 'This field must be an integer value',
    ],

    'content_media' => [
        'image' => 'file',
        'thumbnail' => 'file',
        'youtube_link' => 'url',
        'link' => 'url',
        'icon' => 'icon'
    ]
];
