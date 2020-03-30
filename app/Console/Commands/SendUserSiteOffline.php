<?php

namespace App\Console\Commands;

use App\Notifications\SiteOffline;
use App\Server;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SendUserSiteOffline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:siteoffline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the user a notification that the site is offline';

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
        $servers = Server::all();
        $users = User::all();

        foreach ($servers as $server) {
            $status = self::GetServerStatus($server->ip_address, 80);
            if ($status == 'offline') {
                Notification::send($users,new SiteOffline($server->name,$status));
            }
        }
    }

  public function GetServerStatus($site, $port)
    {
        $status = array("offline", "online");
        $fp = @fsockopen($site, $port, $errno, $errstr, 2);

        if (!$fp) {
            return $status[0];
        } else {
            return $status[1];
        }
    }
}
