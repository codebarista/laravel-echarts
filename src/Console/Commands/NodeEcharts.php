<?php

namespace Codebarista\LaravelEcharts\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;
use Throwable;

class NodeEcharts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codebarista:node-echarts {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install or update Node canvas and echarts';

    /**
     * Execute the console command.
     *
     * @throws Throwable
     */
    public function handle(): int
    {
        $action = $this->argument('action');

        $process = Process::path(codebarista_path('tools/echarts'))
            ->run(['npm', $action]);

        throw_if($process->failed(), $process->errorOutput());

        return self::SUCCESS;
    }
}
