<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TwitterStreamingApi;
use App\Hashtags;

class ListenForTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:listen-for-tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen for tags being used on Twitter';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Command started");
        $tagsToListenTo = array(
            '@MercedesAMGF1', '@redbullracing', '@ScuderiaFerrari', '@WilliamsRacing', '@McLarenF1', '@HaasF1Team', '@alfaromeoracing',  '@ToroRosso', 
            '@RacingPointF1', '@RenaultF1Team', 
        );

       


        TwitterStreamingApi::publicStream()
            ->whenHears($tagsToListenTo, function (array $tweet) {
               
                // Tweet Content to Uppercase To Avoid Missing Tweets With Wrong Uppercase Letters
                $strInput = strtoupper($tweet['text']);

                if ( strpos( $strInput, '@MERCEDESAMGF1' ) !== false ){
                    
                    $data = Hashtags::where('name', '@MercedesAMGF1')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for MercedesAMGF1: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();

                }
                elseif ( strpos( $strInput, '@REDBULLRACING' ) !== false ){
                    
                    $data = Hashtags::where('name', '@redbullracing')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for RedbullRacing: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@SCUDERIAFERRARI' ) !== false ){
                    
                    $data = Hashtags::where('name', '@ScuderiaFerrari')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for ScuderiaFerrari: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@WILLIAMSRACING' ) !== false ){
                    
                    $data = Hashtags::where('name', '@WilliamsRacing')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for WilliamsRacing: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@MCLARENF1' ) !== false ){
                    
                    $data = Hashtags::where('name', '@McLarenF1')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for McLarenF1: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@HAASF1TEAM' ) !== false ){
                    
                    $data = Hashtags::where('name', '@HaasF1Team')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for HaasF1Team: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@ALFAROMEORACING' ) !== false ){
                    
                    $data = Hashtags::where('name', '@alfaromeoracing')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for Alfaromeoracing: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@TOROROSSO' ) !== false ){
                    
                    $data = Hashtags::where('name', '@ToroRosso')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for ToroRosso: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@RACINGPOINTF1' ) !== false ){
                    
                    $data = Hashtags::where('name', '@RacingPointF1')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for RacingPointF1: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                elseif ( strpos( $strInput, '@RENAULTF1TEAM' ) !== false ){
                    
                    $data = Hashtags::where('name', '@RenaultF1Team')->first();
                    $current_score = $data->daily;
                    $current_score = $current_score +1;
                    $data->daily = $current_score;
                    echo('+1 for RenaultF1Team: ' . $data->daily . ' tweets today :)' . PHP_EOL);
                    $data->save();
                    
                }
                else { 
                    echo('+0 Something went wrong: showing tweet:' . PHP_EOL);
                    echo($strInput . PHP_EOL);
                    echo('End of missed tweet' . PHP_EOL);
                }

            })
            ->startListening();
    }
}

// php artisan twitter:listen-for-tags

