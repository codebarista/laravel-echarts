# Laravel Echarts

Server-side rendering of [Apache ECharts](https://echarts.apache.org/) with Laravel and Node.js. Render chart images as
png, jpg, pdf or svg to storage.

## Requirements

- Node.js and npm

## Installation

### Install package

```shell
composer require codebarista/laravel-echarts
```

### Install node modules

```shell
php artisan codebarista:node-echarts install
```

### Publish config (optional)

```shell
php artisan vendor:publish --tag="config" --provider="Codebarista\LaravelEcharts\EchartsServiceProvider"
```

### Install pngcrush (optional)

- https://pmt.sourceforge.io/pngcrush

```shell
apt install pngcrush
```

## Usage

### Store Chart Image

```php
use Codebarista\LaravelEcharts\Actions\StoreChartImage;

// ...

StoreChartImage::make()->handle([
    'title' => [
        'text' => 'Basic Bar Chart',
    ],
    'xAxis' => [
        'type' => 'category',
        'data' => ['Shirts', 'Cardigans', 'Chiffons', 'Pants', 'Heels', 'Socks'],
    ],
    'yAxis' => [
        'type' => 'value',
    ],
    'series' => [
        [
            'type' => 'bar',
            'data' => [5, 20, 36, 10, 10, 20],
        ],
    ],
]);
```

### Config

Overwrite the default attributes from config file:

```php
$action = StoreChartImage::make()
    ->baseOptionPath(resource_path('echarts/base-option.js')) // base chart to be merged
    ->mimeType(MimeTypes::PNG) // PNG, JPG, PDF, SVG
    ->optimize(true) // optimize with pngcrush
    ->filePath('app/public') // storage path
    ->fileName('simple-bar-chart') // w/o extension
    ->width(600) // image width
    ->height(600); // image height


$action->handle(options: [...]);
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
