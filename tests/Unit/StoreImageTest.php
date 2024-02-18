<?php

use Codebarista\LaravelEcharts\Enums\MimeTypes;

it('stores charts as svg', function (array $options) {
    $result = $this->storeChartImage()
        ->mimeType(MimeTypes::SVG)
        ->handle($options);

    expect($result)
        ->toBeString()
        ->toBeReadableFile()
        ->toEndWith('codebarista.svg')
        ->and(mime_content_type($result))
        ->toEqual(MimeTypes::SVG->value);

})->with([
    'line_chart' => [
        'xAxis' => [
            'type' => 'category',
            'data' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        ],
        'yAxis' => [
            'type' => 'value',
        ],
        'series' => [
            [
                'data' => [150, 230, 224, 218, 135, 147, 260],
                'type' => 'line',
            ],
        ],
    ],
]);

it('stores charts as png', function (array $options) {
    $result = $this->storeChartImage()
        ->mimeType(MimeTypes::PNG)
        ->handle($options);

    expect($result)
        ->toBeString()
        ->toBeReadableFile()
        ->toEndWith('codebarista.png')
        ->and(mime_content_type($result))
        ->toEqual(MimeTypes::PNG->value);

})->with([
    'pie_chart' => [
        'title' => [
            'text' => 'Referer of a Website',
            'subtext' => 'Fake Data',
            'left' => 'center',
        ],
        'legend' => [
            'orient' => 'vertical',
            'left' => 'left',
        ],
        'series' => [
            [
                'name' => 'Access From',
                'type' => 'pie',
                'radius' => '50%',
                'data' => [
                    ['value' => 1048, 'name' => 'Search Engine'],
                    ['value' => 735, 'name' => 'Direct'],
                    ['value' => 580, 'name' => 'Email'],
                    ['value' => 484, 'name' => 'Union Ads'],
                    ['value' => 300, 'name' => 'Video Ads'],
                ],
                'emphasis' => [
                    'itemStyle' => [
                        'shadowBlur' => 10,
                        'shadowOffsetX' => 0,
                        'shadowColor' => 'rgba(0, 0, 0, 0.5)',
                    ],
                ],
            ],
        ],
    ],
]);

it('stores charts as jpg', function (array $options) {
    $result = $this->storeChartImage()
        ->mimeType(MimeTypes::JPG)
        ->handle($options);

    expect($result)
        ->toBeString()
        ->toBeReadableFile()
        ->toEndWith('codebarista.jpg')
        ->and(mime_content_type($result))
        ->toEqual(MimeTypes::JPG->value);

})->with([
    'bar_chart' => [
        'title' => [
            'text' => 'Single Bar',
        ],
        'xAxis' => [
            'type' => 'category',
            'data' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        ],
        'yAxis' => [
            'type' => 'value',
        ],
        'series' => [
            [
                'type' => 'bar',
                'data' => [
                    120, [
                        'value' => 200,
                        'itemStyle' => [
                            'color' => '#a90000',
                        ],
                    ],
                    150,
                    80,
                    70,
                    110,
                    130,
                ],
            ],
        ],
    ],
]);

it('stores charts as pdf', function (array $options) {
    $result = $this->storeChartImage()
        ->mimeType(MimeTypes::PDF)
        ->handle($options);

    expect($result)
        ->toBeString()
        ->toBeReadableFile()
        ->toEndWith('codebarista.pdf')
        ->and(mime_content_type($result))
        ->toEqual(MimeTypes::PDF->value);

})->with([
    'line_chart' => [
        'xAxis' => [
            'type' => 'category',
            'data' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        ],
        'yAxis' => [
            'type' => 'value',
        ],
        'series' => [
            [
                'data' => [150, 230, 224, 218, 135, 147, 260],
                'type' => 'line',
            ],
        ],
    ],
]);
