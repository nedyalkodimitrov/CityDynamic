<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use parallel\Runtime;


class import_file extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = [
            ['A', 12],
            ['B', 22],
            ['C', 33],
            ['D', 1],
            ['E', 22],
            ['F', 100],
            ['G', 4],
        ];

        $runtimes = [];
        $futures = [];

        foreach ($tasks as [$name, $duration]) {
            $runtime = new Runtime();
            $futures[] = $runtime->run(function() use ($name, $duration) {
                echo "Task {$name} started...\n";
                sleep($duration); // simulate some workload
                echo "Task {$name} done after {$duration} seconds.\n";
                return "Result from task {$name}";
            });
            $runtimes[] = $runtime;
        }

// Collect results
        foreach ($futures as $i => $future) {
            echo "Returned: " . $future->value() . "\n";
        }

    }

}
