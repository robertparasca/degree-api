<?php

namespace App\Console\Commands;

use App\Institute;
use Illuminate\Console\Command;

class InsertInstituteDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:institute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds default info after deploy.';

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
        $institute = new Institute;
        $institute->university_name = 'Universitatea Tehnică "Gheorghe Asachi" Iași';
        $institute->faculty_name = 'Facultatea de Automatică și Calculatoare';
        $institute->active_year = '2019/2020';
        $institute->active_semester = 'I';
        $institute->dean_name = 'John Doe';
        $institute->chief_secretary = 'Bob';
        $institute->save();
    }
}
