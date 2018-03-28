<?php namespace AspenDigital\Utilities\Console;

use Illuminate\Console\Command;

class ClearLog extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'log:clear';

    /**
     * @var string The console command description.
     */
    protected $description = 'Clear the contents of the log file';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        file_put_contents(storage_path('/logs/system.log'), '');

        $this->info('Log file was cleared successfully!');
    }
}
