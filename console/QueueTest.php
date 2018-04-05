<?php namespace AspenDigital\Utilities\Console;

use Illuminate\Console\Command;
use Queue;

class QueueTest extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'queue:test';

    /**
     * @var string The console command description.
     */
    protected $description = 'Submit a test job to the queue';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $id = Queue::push(new \AspenDigital\Utilities\QueueTestJob);
        $this->info("Test job submitted to the queue: $id");
    }
}
