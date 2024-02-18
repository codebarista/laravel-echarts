<?php

namespace Codebarista\LaravelEcharts\Enums;

enum MimeTypes: string
{
    case PDF = 'application/pdf';
    case SVG = 'image/svg+xml';
    case JPG = 'image/jpeg';
    case PNG = 'image/png';
}
