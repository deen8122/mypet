<?php
/*
 * Чтобы разделить стратегии и получить возможность быстрого переключения между ними.
 * Также этот паттерн является хорошей альтернативой наследованию (вместо расширения абстрактного класса).
 */
interface CheckElement
{
    public function check(string $item): bool;
}

final class TextCheck implements CheckElement
{
    public function check(string $item): bool
    {
        return !is_numeric($item);
    }
}

final class NumberCheck implements CheckElement
{
    public function check(string $item): bool
    {
        return is_numeric($item);
    }
}

final class FindSexCheck implements CheckElement
{
    public function check(string $item): bool
    {
        return $item === 'sex';
    }
}

class Context
{
    public function __construct(private CheckElement $check)
    {
    }

    public function setStrategy(CheckElement $check): void
    {
        $this->check = $check;
    }

    public function execute(array $elements): array
    {
        $result = [];
        foreach ($elements as $element) {
            if ($this->check->check($element)) {
                $result[] = $element;
            }
        }

        return $result;
    }
}

$arInput = [
    "42",
    123,
    "sex",
    "Just text",
    "Hello"
];

$obj = new Context(new TextCheck);
$elements = $obj->execute($arInput);
echo 'TextCheck: ' . implode(', ', $elements) . PHP_EOL;

$obj->setStrategy(new NumberCheck);
$elements = $obj->execute($arInput);
echo 'NumberCheck: ' . implode(', ', $elements) . PHP_EOL;

$obj->setStrategy(new FindSexCheck);
$elements = $obj->execute($arInput);
echo 'FindSexCheck: ' . implode(', ', $elements) . PHP_EOL;