# laravel_worker

### php实现websocket的双向即时通讯的最佳实践

基于此演示你可以：

1. 使用laravel的一切功能和正常升级
2. 使用workerman的一切功能和正常升级
3. 在workerman进程中使用Eloquent ORM
4. 轻松将诸如用户私信之类的数据推送到浏览器（或客户端）

--

 - 得益于composer的流行，本项目并没有创造什么，只是演示了一种结合laravel与workerman的方法

 - 如无意外，本项目基本可以随意执行composer update来更新laravel和workerman

--

```php
public function onMessage($connection,$data){
    if(json_decode($data)['route'] === "post.auth.login")
    $status = User::login($data);
    $connection -> send(json_encode(['status' => $status]));
}
```
