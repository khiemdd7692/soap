<?php

return [
    
    // Service configurations.

    'services'          => [
        
        'api'              => [
            'name'              => 'doMessageSend',
            'class'             => 'KhiemDD\Soap\API\ApiService',
            'exceptions'        => [
                'Exception'
            ],
            'types'             => [
                'keyValue'          => 'KhiemDD\Soap\API\Types\KeyValue',
                'product'           => 'KhiemDD\Soap\API\Types\Service'
            ],
            'strategy'          => 'ArrayOfTypeComplex',
            'headers'           => [
                'Cache-Control'     => 'no-cache, no-store'
            ],
            'options'           => []
        ]
        
    ],

    
    // Log exception trace stack?

    'logging'       => true,

    
    // Mock credentials for demo.

    'mock'          => [
        'user'              => 'test@test.com',
        'password'          => 'tester',
        'token'             => 'tGSGYv8al1Ce6Rui8oa4Kjo8ADhYvR9x8KFZOeEGWgU1iscF7N2tUnI3t9bX'
    ],

    
];
