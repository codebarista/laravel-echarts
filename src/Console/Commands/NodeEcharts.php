<?php

namespace Codebarista\LaravelEcharts\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Support\Facades\Process;
use Throwable;

class NodeEcharts extends Command implements Isolatable
{
    /***
     * @var string
     */
    protected $signature = 'codebarista:node-echarts {action}';

    /***
     * @var string
     */
    protected $description = 'Install or update Node canvas and echarts';

    /***
     * @throws Throwable
     */
    public function handle(): int
    {
        $action = $this->argument('action');

        $process = Process::path(codebarista_path('tools/echarts'))
            ->timeout(180)
            ->run(['npm', $action]);

        throw_if($process->failed(), $process->errorOutput());

        $this->components->info('Node echarts have been installed successfully.');

        return self::SUCCESS;
    }
}
