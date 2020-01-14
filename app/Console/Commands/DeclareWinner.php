<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Hashtags;

class DeclareWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pick-winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pick a winner at the end of the day and update db rows';

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
        echo('Declaring Winner' . PHP_EOL);
        // Get data 
        $highestSCore = Hashtags::max('daily');
        $winningTag = Hashtags::where('daily', $highestSCore)->first();
        echo('Winning Tag is: ' . $winningTag->name . ' with ' . $winningTag->daily . ' tweets :)' . PHP_EOL);

        $winningTag->wins = $winningTag->wins +1;
        $winningTag->save();

        $tags = Hashtags::all();
        foreach( $tags as $tag ){
            $tag->daily = 0;
            $tag->save();
        }
    }
}
