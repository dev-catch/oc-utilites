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
        $queue_driver = strtoupper(config('queue.default'));
        $cache_store = strtoupper(config('cache.default'));

        if ($id)
          $this->info("Submitted queue test job | cache: $cache_store, queue: $queue_driver | $id");
        else
          $this->error("Queue test failed. Check your queue configuration | queue: $queue_driver, cache: $cache_store");
    }
}
