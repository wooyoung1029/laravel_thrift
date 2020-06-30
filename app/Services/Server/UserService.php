<?php
/**
 * Created by PhpStorm.
 * User: ying.yu
 * Date: 2020/6/28
 * Time: 16:53
 */
namespace App\Services\Server;

use App\Thrift\User\UserIf as UserIf;
use App\User;

class UserService implements UserIf
{
    public function getInfo($id)
    {
        // TODO: Implement getInfo() method.
        return User::find($id);
    }
}

//class UserService
//{
//    public function getUserInfoViaRpc(int $id)
//    {
//        try {
//            // 建立与 RpcServer 的连接
//            $socket = new TSocket("127.0.0.1", 8888);
//            $socket->setRecvTimeout(30000);  // 超时时间
//            $socket->setDebug(true);
//            $transport = new TBufferedTransport($socket, 1024, 1024);
//            $protocol = new TBinaryProtocol($transport);
//            $thriftProtocol = new TMultiplexedProtocol($protocol, 'UserService');
//            $client = new UserClient($thriftProtocol);
//            $transport->open();
//            $result = $client->getInfo($id);
//            $transport->close();
//            return $result;
//        } catch (TException $TException) {
//            dd($TException);
//        }
//    }
//
//    public function getUserInfoViaSwoole(int $id)
//    {
//        try {
//            // 建立与 SwooleServer 的连接
//            $socket = new ClientTransport("127.0.0.1", 9999);
//            $transport = new TFramedTransport($socket);
//            $protocol = new TBinaryProtocol($transport);
//            $client = new UserClient($protocol);
//            $transport->open();
//            $result = $client->getInfo($id);
//            $transport->close();
//            return $result;
//        } catch (TException $TException) {
//            dd($TException);
//        }
//    }
//}