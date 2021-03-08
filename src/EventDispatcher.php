<?php


namespace App;


use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class EventDispatcher implements EventDispatcherInterface
{
    public function dispatch(object $event, string $eventName = null): object
    {
        echo sprintf('Event name "%s"'.PHP_EOL, $eventName ?? '[null]');

        return $event;
    }
}