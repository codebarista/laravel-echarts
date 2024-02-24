'use strict';

import {createCanvas} from 'canvas';
import * as echarts from 'echarts';
import {writeFile} from 'node:fs';
import yargs from 'yargs';
import _ from 'lodash';

const argv = yargs(process.argv.slice(2)).argv;

const type = argv.type.includes('svg') ? 'svg' : argv.type.split('/').pop();
const canvas = createCanvas(argv.width, argv.height, type);
const chart = echarts.init(canvas);

const {option} = await import(argv.baseOptionPath)
const params = JSON.parse(argv.option);

chart.setOption(_.merge(option, params));

const buffer = canvas.toBuffer(argv.type);

echarts.setPlatformAPI(canvas);

writeFile(argv.path, buffer, (err) => {
    if (err) throw err;
});
