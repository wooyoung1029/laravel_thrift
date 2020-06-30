# 基于 Thrift + Laravel 构建微服务 RPC 调用实现
Thrift 是由 Facebook 开源的轻量级、跨语言 RPC 框架，为数据传输、序列化以及应用级程序处理提供了清晰的抽象和实现

## 1.安装 Thrift 和项目初始化
### 创建一个 Thrift IDL 文件 user.thrift
```$xslt
namespace php App.Thrift.User

// 定义用户接口
service User {
    string getInfo(1:i32 id)
}
```

### 接着在项目根目录下运行如下命令，根据上述 IDL 文件生成相关的服务代码：
```$xslt
thrift -r --gen php:server -out ./ thrift/user.thrift
```

### 通过 Composer 安装 Thrift PHP 依赖包：
```$xslt
composer require apache/thrift
```

### 服务端/客户端代码  
[参照](https://xueyuanjun.com/post/21291)

### 测试 RPC 服务调用
1. 数据表初始化
```$xslt
php artisan migrate
```
2. 在项目根目录下启动 Thrift RPC 服务端
```$xslt
php artisan rpc:start
```

3.启动 Laravel 应用（RPC 客户端）
```$xslt
php artisan serve
[127.0.0.1:8888]

D:\projects\wooyoung\php\thrift\laravel_thrift>php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```

## 调用 getInfo
```$xslt
server
class UserService implements UserIf
{
    public function getInfo($id)
    {
        // TODO: Implement getInfo() method.
        return User::find($id);
    }
}
```
```$xslt
clinet 
$client = new UserClient($thriftProtocol);
            $transport->open();
            $result = $client->getInfo($id);
```