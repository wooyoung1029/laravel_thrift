<?php
/**
 * Created by PhpStorm.
 * User: ying.yu
 * Date: 2020/6/28
 * Time: 17:48
 */
namespace App\Swoole;

use Thrift\Factory\TTransportFactory;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\TTransport;

class TFramedTransportFactory extends TTransportFactory
{
    public static function getTransport(TTransport $transport)
    {
        return new TFramedTransport($transport);
    }
}