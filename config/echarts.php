<?php

use Codebarista\LaravelEcharts\Enums\MimeTypes;

return [

    /*
    |--------------------------------------------------------------------------
    | Node Canvas
    |--------------------------------------------------------------------------
    |
    | node-canvas is a Cairo-backed Canvas implementation for Node.js. Make
    | sure your server meets the requirements. For more information, visit:
    |
    | https://www.npmjs.com/package/canvas
    |
    */

    'storage' => [
        'path' => env('ECHARTS_STORAGE_PATH', 'app/public/vendor/echarts'),
    ],

    'canvas' => [
        'height' => env('ECHARTS_CANVAS_HEIGHT', 600),
        'width' => env('ECHARTS_CANVAS_WIDTH', 600),
        'mime_type' => MimeTypes::PNG,
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Optimizer
    |--------------------------------------------------------------------------
    |
    | PNG (pngcrush)
    | pngcrush is a free and open-source command-line utility for optimizing PNG
    | image files. It reduces the size of the file lossless – that is, the resulting
    | "crushed" image will have the same quality as the source image.
    |
    | To support PNG optimization, pngcrush must be installed on the server:
    |
    | https://pmt.sourceforge.io/pngcrush
    |
    */

    'optimize' => [
        'png' => env('ECHARTS_OPTIMIZE_PNG', false),
    ],
];
