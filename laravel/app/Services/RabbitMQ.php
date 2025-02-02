<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQ
{

    public function handle()
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        //Не будем создавать новый обменник
        // $channel->queue_declare('hello', false, false, false, false);

        $arr = [
            "email"=>"test@mail.ru",
        ];
        $msg = new AMQPMessage('Hello World!');
        $channel->basic_publish($msg,  'rabbit');

        $channel->close();
        $connection->close();
        echo " [x] Sent 'Hello World!'\n";

        return 'RabbitMQ';
    }
}