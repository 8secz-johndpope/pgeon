<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

class ResetWeeklyQuestionCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ResetWeeklyQuestionCounter:resetcounter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'resetcounter';

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
     * @return mixed
     */
    public function handle()
    {
        //
        DB::table('question_counter')->truncate();
    }
}
