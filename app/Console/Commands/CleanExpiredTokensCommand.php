<?php

namespace App\Console\Commands;

use App\Actions\CleanExpiredTokensAction;
use Illuminate\Console\Command;

class CleanExpiredTokensCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired access tokens';

    /**
     * Execute the console command.
     */

    public function handle(CleanExpiredTokensAction $action)
    {
        $action->execute();

        $this->info('Expired access tokens have been deleted.');
    }
}
