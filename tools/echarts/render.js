'use strict';

import {createCanvas} from 'canvas';
import {writeFile} from 'node:fs';
// import echarts from 'echarts';
import echarts from 'echarts/dist/echarts.js';
import yargs from 'yargs';

echarts.setPlatformAPI(createCanvas);

const argv = yargs(process.argv.slice(2)).argv;

const type = argv.type.includes('svg') ? 'svg' : argv.type.split('/').pop();
const canvas = createCanvas(argv.width, argv.height, type);
const chart = echarts.init(canvas);

const options = JSON.parse(argv.options);
const defaults = {
    animation: false,
    tooltip: {},
    xAxis: {
        type: 'category',
    },
    yAxis: {
        type: 'value'
    },
    series: {}
};

chart.setOption({
    ...defaults,
    ...options
});

const buffer = canvas.toBuffer(argv.type);

writeFile(argv.path, buffer, (err) => {
    if (err) throw err;
});
