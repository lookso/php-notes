<?php
/**
 * Created by PhpStorm.
 * User: @kunlu
 * Date: 2019/7/25
 * Time: 6:31 PM
 */

//观察者模式(Observer),当一个对象的状态发生改变时，依赖他的对象会全部收到通知，并自动更新。
//场景:一个事件发生后,要执行一连串更新操作.传统的编程方式,就是在事件的代码之后直接加入处理逻辑,当更新得逻辑增多之后,代码会变得难以维护.
//这种方式是耦合的,侵入式的,增加新的逻辑需要改变事件主题的代码,观察者模式实现了低耦合,非侵入式的通知与更新机制
/**
 * 事件产生类
 * Class EventGenerator
 */
// https://www.php.net/manual/zh/language.oop5.interfaces.php

abstract class EventGenerator
{
    private $ObServers = [];

    //增加观察者
    public function add(ObServer $ObServer)
    {
        $this->ObServers[] = $ObServer;
    }

    //事件通知
    public function notify()
    {
        foreach ($this->ObServers as $ObServer) {
            $ObServer->update();
        }
    }

}

/**
 * 观察者接口类
 * Interface ObServer
 */
interface ObServer
{
    public function update($event_info = null);
}
/**
 * 观察者1
 */
class ObServer1 implements ObServer
{
    public function update($event_info = null)
    {
        echo "观察者1 收到执行通知 执行完毕！\n";
    }
}

/**
 * 观察者1
 */
class ObServer2 implements ObServer
{
    public function update($event_info = null)
    {
        echo "观察者2 收到执行通知 执行完毕！\n";
    }
}

/**
 * 事件
 * Class Event
 */
class Event extends EventGenerator
{
    /**
     * 触发事件
     */
    public function trigger()
    {
        //通知观察者
        $this->notify();
    }
}
//创建一个事件
$event = new Event();
//为事件增加旁观者
$event->add(new ObServer1());
$event->add(new ObServer2());
//执行事件 通知旁观者
$event->trigger();