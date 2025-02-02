<?php

/*
 * Привести нестандартный или неудобный интерфейс какого-то класса в интерфейс,
 * совместимый с вашим кодом. Адаптер позволяет классам работать вместе стандартным
 * образом, что обычно не получается из-за несовместимых интерфейсов, предоставляя
 * для этого прослойку с интерфейсом, удобным для клиентов, самостоятельно используя
 * оригинальный интерфейс.
 */
interface ApiConfiguration
{
    public function getHost(): string;
}

final class ApiService implements ApiConfiguration
{
    private string $host = 'host';

    public function getHost(): string
    {
        return $this->host;
    }
}
/*
 * Старый класс который надо адаптировать под новый интерфейс. Класс редактировать нельзя!
 */
class SomeOldService
{
    public function getHostData(): array
    {
        return [
            'app' => [
                'x-host' => 'host'
            ]
        ];
    }
}
/*
 * Адаптер
 */
final class SomeOldServiceAdapter implements ApiConfiguration
{
    public function __construct(protected SomeOldService $someOldService)
    {
    }

    public function getHost(): string
    {
        $arr = $this->someOldService->getHostData();

        return $arr['app']['x-host'];
    }
}

$service = new ApiService;
$host = $service->getHost();
echo $host.PHP_EOL;

$service = new SomeOldServiceAdapter(new SomeOldService);
$host = $service->getHost();
echo $host.PHP_EOL;