<?php

/*
 * Реализация шаблона Декоратор в PHP обычно включает следующие элементы:

Интерфейс Компонента: определяет интерфейс, который должны реализовать все компоненты и их декораторы.

Конкретный компонент: представляет основной объект, к которому будут добавляться новые функции. Реализует интерфейс Компонента.

Базовый декоратор: представляет базовый класс для всех декораторов. Реализует интерфейс Компонента, но также содержит ссылку на объект типа Компонента, к которому будет добавлена новая функциональность.

Конкретные декораторы: расширяют функциональность базового декоратора, добавляя новые функции. Каждый конкретный декоратор имеет ссылку на объект типа Компонента и может выполнять дополнительную логику перед или после вызова методов объекта.
 */
interface MyInterface
{
    public function sendData(array $data);

    public function getData();
}

class MyService implements MyInterface
{
    public function sendData(array $data): void
    {
        echo 'Send data: ' . implode(',', $data) . PHP_EOL;
    }

    public function getData(): array
    {
        $data = [9, 8, 7];

        return $data;
    }
}

class MyServiceDecorator1 implements MyInterface
{
    public function __construct(private MyInterface $myService)
    {
    }

    public function sendData(array $data): void
    {
        $data[] = 99;
        $this->myService->sendData($data);
    }

    public function getData(): array
    {
        $data = $this->myService->getData();
        $data[] = "A";

        return $data;
    }
}

class MyServiceDecorator2 implements MyInterface
{
    public function __construct(private MyInterface $myService)
    {
    }

    public function sendData(array $data): void
    {
        $data[] = "Изменен декоратором MyServiceDecorator2";
        $this->myService->sendData($data);
    }

    public function getData(): array
    {
        $data = $this->myService->getData();
        $data[] = "Изменен декоратором MyServiceDecorator2";

        return $data;
    }
}

echo ' - Без декортора' . PHP_EOL;
$myService = new MyService;
$myService->sendData([1, 2, 3]);
$data = $myService->getData();
echo 'Get data: ' . implode(',', $data) . PHP_EOL;

echo ' - MyServiceDecorator1 ' . PHP_EOL;
$myService = new MyServiceDecorator1($myService);

$myService->sendData([1, 2, 3]);
$data = $myService->getData();
echo 'Get data: ' . implode(',', $data) . PHP_EOL;

echo ' - MyServiceDecorator2 ' . PHP_EOL;
$myService = new MyServiceDecorator2($myService);

$myService->sendData([1, 2, 3]);
$data = $myService->getData();
echo 'Get data: ' . implode(',', $data) . PHP_EOL;

echo ' - MyServiceDecorator2.... ' . PHP_EOL;
$myService = new MyServiceDecorator2(
    new MyServiceDecorator2(
        new MyServiceDecorator2(
            new MyServiceDecorator2(new MyService)
        )
    )
);

$myService->sendData([1, 2, 3]);
$data = $myService->getData();
echo 'Get data: ' . implode(',', $data) . PHP_EOL;