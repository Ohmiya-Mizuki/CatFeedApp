<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleNotification;
use App\User;
use App\Cat;
use Carbon\Carbon;

class MailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mail_notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $cats = Cat::all();

        foreach ($cats as $cat) {
            $now = new Carbon();

            //if ($cat->food_time !== $now) continue;
            $user = $cat->user;
            $text = $cat->name . 'の餌の時間です。';

            Mail::to($user->email)->send(new SampleNotification($user->name, $text));
            echo "メールを送信しました\n";    
        }

        return 0;
    }
}
