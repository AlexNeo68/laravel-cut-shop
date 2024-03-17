<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotAPI;
use JetBrains\PhpStorm\NoReturn;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    private mixed $chatId;
    private mixed $token;

    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
        $this->chatId = $config['chat_id'];
        $this->token = $config['token'];
    }

    protected function write(LogRecord $record): void
    {
        app(TelegramBotAPI::class)::sendMessage(
            $this->token,
            $this->chatId,
            $record->formatted
        );
    }
}
