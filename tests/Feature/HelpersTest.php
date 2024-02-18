<?php

it('has the callable helpers', function () {
    expect('codebarista_path')->toBeCallable()
        ->and('pngcrush')->toBeCallable();
});

it('resolves the tools path', function () {
    expect(codebarista_path('tools'))
        ->toEndWith('laravel-echarts/tools');
});

it('finds the render js file', function () {
    expect(codebarista_path('tools/echarts/render.js'))
        ->toBeFile();
});

it('has pngcrush installed', function () {
    exec(' LC_ALL=C type pngcrush', $output, $result);
    expect($output)
        ->toBeArray()
        ->and($result)
        ->toBeInt()
        ->toBe(0);
});
