<?php
return [
    'hero' => [
        'field_name' => [
            'title' => 'text',
            'short_description' => 'textarea',
            'button_name' => 'text',
			'button_link' => 'url',
            'image_top' => 'file',
            'image_bottom' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'short_description.*' => 'required|max:2000',
            'button_name.*' => 'required|max:2000',
			'button_link.*' => 'required|max:100',
            'image_top.*' => 'nullable|max:10240|mimes:jpg,jpeg,png',
            'image_bottom.*' => 'nullable|max:10240|mimes:jpg,jpeg,png',
        ],
        'size' => [
            'image_top' => '611x266',
            'image_bottom' => '569x534'
        ]
    ],
    'about-us' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
            'short_description' => 'textarea',
            'image' => 'file'
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:200',
            'short_description.*' => 'required|max:2000',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png',
        ]
    ],
    'why-chose-us' => [
        'field_name' => [
            'title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
        ]
    ],
    'testimonial' => [
        'field_name' => [
            'image' => 'file'
        ],
        'validation' => [
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ]
    ],
    'blog' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:2000',
        ]
    ],
    'skills' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
        ]
    ],
    'equipment' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
        ]
    ],
    'services' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
        ]
    ],
    'behind-the-scene' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
            'short_details' => 'text',
            'video' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
            'short_details.*' => 'required|max:900',
            'video.*' => 'mimetypes:video/mp4|max:20000',
        ]
    ],
    'team' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
        ]
    ],
    'gallery' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
        ]
    ],
    'instagram' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
            'button_name' => 'text',
            'button_icon' => 'icon',
            'button_link' => 'url',
            'image_one' => 'file',
            'image_two' => 'file',
            'image_three' => 'file',
            'image_four' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:100',
            'button_name.*' => 'required|max:100',
            'button_icon.*' => 'required|max:100',
            'button_link.*' => 'required|max:100',
            'image_one.*' => 'nullable|max:10240|mimes:jpg,jpeg,png',
            'image_two.*' => 'nullable|max:10240|mimes:jpg,jpeg,png',
            'image_three.*' => 'nullable|max:10240|mimes:jpg,jpeg,png',
            'image_four.*' => 'nullable|max:10240|mimes:jpg,jpeg,png',
        ],
        'size' => [
            'image_one' => '240x240',
            'image_two' => '240x240',
            'image_three' => '240x240',
            'image_four' => '240x240'
        ]
    ],
    'contact-us' => [
        'field_name' => [
            'heading' => 'text',
            'sub_heading' => 'text',
            'title' => 'text',
            'address' => 'text',
            'email' => 'text',
            'phone' => 'text',
            'map_embed_link' => 'text',
            'footer_short_details' => 'textarea'
        ],
        'validation' => [
            'heading.*' => 'required|max:100',
            'sub_heading.*' => 'required|max:100',
            'title.*' => 'required|max:100',
            'address.*' => 'required|max:2000',
            'email.*' => 'required|max:2000',
            'phone.*' => 'required|max:2000',
            'map_embed_link.*' => 'required',
        ]
    ],
    'login' => [
        'field_name' => [
            'image' => 'file',
        ],
        'validation' => [
            'image.*' => 'max:10240|mimes:jpg,jpeg,png',
        ],
        'size' => [
            'image' => '558x500',
        ]
    ],
    'message' => [
        'required' => 'This field is required.',
        'min' => 'This field must be at least :min characters.',
        'max' => 'This field may not be greater than :max characters.',
        'image' => 'This field must be image.',
        'mimes' => 'This image must be a file of type: jpg, jpeg, png.',
        'mimetypes' => 'This video must be a file of type: mp4.',
    ],
    'template_media' => [
        'image' => 'file',
        'image_top' => 'file',
        'image_bottom' => 'file',
        'image_one' => 'file',
        'image_two' => 'file',
        'image_three' => 'file',
        'image_four' => 'file',
        'thumbnail' => 'file',
        'youtube_link' => 'url',
        'button_link' => 'url',
        'button_icon' => 'icon',
        'video' => 'file',
    ]
];
