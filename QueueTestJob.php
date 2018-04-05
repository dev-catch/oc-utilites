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
    \Log::info('Aspen Digital Test Job queued and processed. ');
  }
}
