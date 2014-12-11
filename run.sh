#!/bin/sh

for pattern in AbstractFactory Adapter/Ext Adapter/Impl Bridge Builder ChainOfResponsibility Command Composite Decorator Facade FactoryMethod Flyweight Interpreter Iterator Mediator Memento Observer Prototype Proxy Singleton State Strategy TemplateMethod Visitor
do
    echo $pattern
    php $pattern/client.php
done
