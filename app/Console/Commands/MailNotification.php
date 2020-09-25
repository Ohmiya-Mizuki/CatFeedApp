<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleNotification;
use App\User;
use App\Cat;

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
        $cats_infos = Cat::all();

        foreach ($cats_infos as $cats_info) {
            $food_time = $cats_info['food_time'];
            $now = time();

            //if ($food_time !== $now) continue;

            $user_id = $cats_info['user_id'];
            $user_info = User::find($user_id);
            $to = $user_info->email;

            $user_name = $user_info->name;
            $cat_name = $cats_info['name'];
            $text = $cat_name . 'の餌の時間です。';
            Mail::to($to)->send(new SampleNotification($user_name, $text));
            echo "メールを送信しました\n";
            //return 0;

        }

    }
}
