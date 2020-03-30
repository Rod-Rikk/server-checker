<?php

namespace App\Console\Commands;

use App\Server;
use Illuminate\Console\Command;

class CheckerCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checker:cron';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $servers = Server::all();

        foreach($servers as $server){
            $status = GetServerStatus($server->ip_address,80);
            if ($status == 'offline') {
                
            }
        }

        
    }


    // Custom checker function

    function GetServerStatus($site, $port)
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
