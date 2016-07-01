<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use LaravelAnalytics;
use Carbon\Carbon;
use App\Post;
use Mail;

class FetchAnalytics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analytics:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the most recent Google Analytics data';

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
        $date = Carbon::now()->subDays(1);

        Mail::send('command-before', array('date' => $date), function($message)
            {
                $message->subject("Analytics To Run")
                        ->to('meyer.ej@gmail.com', 'WebMaster Meyer');
            });

        $analyticsData = LaravelAnalytics::getMostVisitedPagesForPeriod($date, $date, 200);

        $viewTotal = 0;
        foreach($analyticsData as $key => $page)
        {
            $viewTotal += $page['pageViews'];
            if(substr($page['url'],0,7) == "/posts/")
            {
                $slug = substr($page['url'],7);
                $post = Post::where('slug', $slug)->first();
                if($post)
                {
                    $post->page_views += $page['pageViews'];
                    $post->save();
                }
            }
        }

        Mail::send('command-after', array('pageViews' => $viewTotal, 'urlCount' => $analyticsData->count()), function($message)
            {
                $message->subject("Analytics Were Fetched!")
                        ->to('meyer.ej@gmail.com', 'WebMaster Meyer');
            });
    }
}
