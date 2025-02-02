<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Fiber;
use Illuminate\Support\Facades\Http;

class FiberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'FiberCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hosts = [
            'http://127.0.0.1:8002',
            'http://127.0.0.1:8001',
            'http://127.0.0.1:8001',
            'http://127.0.0.1:8001',
            'http://127.0.0.1:8001',
            'http://127.0.0.1:8001',
        ];

        $time_start = microtime(true);

        $fiber = new Fiber(function(array $hosts): void {
            foreach($hosts as $host) {
                $response = Http::get($host);
               Fiber::suspend($response->body());
            }
        });
        $total_count  = count($hosts);
        $this->line($total_count);
        // Pass the files list into Fiber.
        $copied = $fiber->start($hosts);
        $copied_count = 1;

        while(!$fiber->isTerminated()) {
            $percentage = round($copied_count / $total_count, 2) * 100;
            $this->line("[{$percentage}%]:  '{$copied}'");
            $copied = $fiber->resume();
            ++$copied_count;
        }
        $time_end = microtime(true);

        //dividing with 60 will give the execution time in minutes otherwise seconds
        $execution_time = ($time_end - $time_start);

        //execution time of the script
        $this->line( '<b>Total Execution Time:</b> '.$execution_time.' sec');
        return 0;

    }
}
