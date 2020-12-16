<?php

/**
 * Model configuration options for settings model.
 */

return [ 
    'form' => [
        'toolbar' => [
            'buttons' => [
                'save' => ['label' => 'lang:admin::lang.button_save', 'class' => 'btn btn-primary', 'data-request' => 'onSave'],
                'saveClose' => [
                    'label' => 'lang:admin::lang.button_save_close',
                    'class' => 'btn btn-default',
                    'data-request' => 'onSave',
                    'data-request-data' => 'close:1',
                ],
            ],
        ],
        'fields' => [
            'status' => [
                'label' => 'Status',
                'type' => 'switch',
                'span' => 'left',
                'default' => FALSE,
            ],
            'error_image' => [
                'label' => 'lang:babel.notfound::default.image_label',
                'type' => 'mediafinder',
                'mode' => 'grid',                
                'isMulti' => FALSE,                          
            ],             
            'title' => [
                'label' => 'lang:babel.notfound::default.main_title',
                'type' => 'text',
                'default' => '404'
            ],
            'content_text' => [
                'label' => 'lang:babel.notfound::default.content_text',
                'type' => 'richeditor',
                'cssClass' => 'richeditor-fluid',  
                'default' => 'lang:babel.notfound::default.default.content',
            ],
            'button_text' => [
                'label' => 'lang:babel.notfound::default.button_text',
                'type' => 'text',
                'span' => 'left',
                'default' => 'Back to homepage'
            ],
            'button_text_color' => [
                'label' => 'Button text color',
                'type' => 'colorpicker',
                'span' => 'right',
                'default' => '#F5F5F5',
                'rules' => 'required',
            ],
            'button_color' => [
                'label' => 'Button color',
                'type' => 'colorpicker',
                'span' => 'left',
                'default' => '#000',
                'rules' => 'required',
            ],
            'button_url' => [
                'label' => 'Button URL',
                'type' => 'text',
                'span' => 'left',
                'default' => '/',
                'rules' => 'required',
            ],
        ],
    ],
];