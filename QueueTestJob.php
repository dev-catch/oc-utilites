<?php
# Queue::push(new \AspenDigital\Utilities\QueueTestJob);

namespace AspenDigital\Utilities;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueTestJob implements ShouldQueue
{
  use InteractsWithQueue;

  public function handle()
  {
    $queue_driver = strtoupper(config('queue.default'));
    $cache_store = strtoupper(config('cache.default'));

    \Log::info("Queue test processed | cache: $cache_store, queue: $queue_driver");
  }
}
