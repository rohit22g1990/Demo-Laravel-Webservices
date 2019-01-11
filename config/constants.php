<?php

return [
    'HTTP_CODES' => [
        'SUCCESS' => 200,
        'CREATED' => 201,
        'VALIDATION_ERROR' => 422,
        'UNAUTHORIZED' => 401,
        'BAD_REQUEST' => 400,
        'FORBIDDEN' => 403,
        'INTERNAL_SERVER_ERROR' => 500,
        'METHOD_NOT_ALLOWED' => 405,
        'NOT_FOUND' => 404,
        'SERVICE_NOT_AVAILABLE' => 503,
        'OBJECT_ALREADY_EXISTS' => 409,
    ],

    'PROFILE_PIC_PATH' => 'uploads/profiles/',
    'DOCUMENT_PATH' => 'uploads/documents/',

    'PIC_URLS' => env('APP_URL').'/public/',
];

