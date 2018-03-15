<?php namespace AspenDigital\Utilities\Console;

use Backend\Models\User;
use Backend\Models\UserThrottle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UserUnlock extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'user:unlock';

    /**
     * @var string The console command description.
     */
    protected $description = "Unlock a Backend User's account";

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        // Check args
        $email = $this->argument('email');

        $validator = Validator::make(compact('email'), [
            'email' =>  'email'
        ]);

        if ($validator->fails()) {
            foreach($validator->errors()->getMessages() as $field => $messages) {
                $this->output->error($messages[0]);
            }

            return;
        }

        $this->output->writeln('Looking up user...');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->errorQuit("There is no user associated with the email address '$email'.");
        }

        $this->unlockUser($user);

        $this->passwordReset($user);
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['email', InputArgument::REQUIRED, "The Backend User's email address"]
        ];
    }

    protected function unlockUser($user)
    {
        $this->output->writeln('Unlocking account...');

        try {
            $unlocked = $user->is_activated;

            if (!$unlocked) {
                $unlocked = $user->attemptActivation($user->getActivationCode());
            }

            if (!$unlocked) {
                $this->errorQuit("Could not unlock this user's account");
            }

            UserThrottle::where('user_id', $user->id)->where('is_suspended', true)->delete();
        }
        catch (\Exception $e) {
            $this->errorQuit($e->getMessage());
        }

        $this->info('Account unlocked!');
    }

    protected function passwordReset($user)
    {
        if ($this->confirm("Do you want to reset this user's password?"))
        {
            $typed_pw = $this->ask("Type new password, or press enter to auto-generate a new password", 'auto-generate');

            if ($typed_pw === 'auto-generate') {
                $pw = str_random(15);
            }
            else {
                $pw = $typed_pw;
            }

            $this->output->writeln('Resetting password...');

            $user->password = $pw;
            $user->forceSave();

            if ($typed_pw === 'auto-generate') {
                $this->output->write("User's password was changed to: ");
                $this->info($pw);
            }
            else {
                $this->info('Password reset!');
            }
        }
    }

    protected function errorQuit($message)
    {
        $this->output->error($message);

        exit;
    }
}
