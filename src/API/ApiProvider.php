<?php

namespace KhiemDD\Soap\API;


use KhiemDD\Soap\API\Types\Service;

/**
 * Methods used by API service class.
 */
class ApiProvider
{
    /**
     * Returns boolean status flag for given user and password.
     *
     * @param string $user
     * @param string $password
     * @return bool
     */
    public static function validateUser($user, $password)
    {
        return (($user == config('app.account')) && ($password == config('app.secret_key'))) ? true : false;
    }

    /**
     * Returns true if a user exists with given token or user and password.
     *
     * @param string $user
     * @param string $password
     * @return bool
     */
    public static function authenticate($user = '', $password = '')
    {
        $result = false;

        if ($user && $password) {
            $result = self::validateUser($user, $password);
        }

        return $result;
    }

    /**
     * Returns status message.
     *
     * @param int $result
     * @return \KhiemDD\Soap\API\Types\Service
     */
    public static function SendSMS($PhoneNumber, $FullMsg, $Brandname)
    {
        $connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_LOGIN'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST')
        );
        $channel = $connection->channel();
        $channel->queue_declare(env('API_QUEUE'), false, true, false, false);
        $data = json_encode([
            'Phone' => $PhoneNumber,
            'BrandName'  => $Brandname,
            'Message' => $FullMsg
        ]);
        $msg = new \PhpAmqpLib\Message\AMQPMessage($data, array('delivery_mode' => 2));
        $channel->basic_publish($msg, '', env('API_QUEUE'));
        \Log::info('[INPUT]:: Received message and push to API Queue '.$data);

        return new Service(1);
    }
    /**
     * Returns status message.
     *
     * @param int $result
     * @return \KhiemDD\Soap\API\Types\Service
     */
    public static function FailResponse()
    {
        return new Service(0);
    }

}
