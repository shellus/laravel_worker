<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Workerman\Connection\TcpConnection;
use Workerman\Lib\Timer;
use Workerman\Worker;

class WsServerStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wss:start';

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

        $ws_worker = new Worker("websocket://0.0.0.0:2346");

        $ws_worker->onConnect = function($connection)
        {
            echo "New connection\n";
        };

        $ws_worker->onMessage = function(TcpConnection $connection, $data)
        {

            // 转发数据给所有客户端
            foreach ($connection -> worker -> connections as $connection){
                /** @var TcpConnection $connection */
                $connection -> send($data);
            }

        };

        $ws_worker->onClose = function($connection)
        {
            echo "Connection closed\n";
        };

        // Hack Run worker
        global $argv;
        $argv = [null,'start'];
        $ws_worker -> runAll();
    }
}
