<?php
namespace App\Services\Client;

use App\Thrift\User\UserClient;
use Thrift\Protocol\TMultiplexedProtocol;
use Thrift\Exception\TException;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;

class UserService
{
    public function getUserInfo(int $id)
    {
        try {
            // 建立与 RpcServer 的连接
            $socket = new TSocket("127.0.0.1", "8888");
            $socket->setRecvTimeout(30000);  // 超时时间
            $socket->setDebug(true);
            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $thriftProtocol = new TMultiplexedProtocol($protocol, 'UserService');
            $client = new UserClient($thriftProtocol);
            $transport->open();
            $result = $client->getInfo($id);
            $transport->close();
            return $result;
        } catch (TException $TException) {
            dd($TException);
        }
    }
}