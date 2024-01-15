<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;

class Logger extends BaseConfig
{
    public $threshold = (ENVIRONMENT === 'production') ? 4 : 9;

    public string $dateFormat = 'Y-m-d H:i:s';

    public array $handlers = [
        FileHandler::class => [
            'handles' => [
                'critical',
                'alert',
                'emergency',
                'debug',
                'error',
                'info',
                'notice',
                'warning',
            ],
            'fileExtension' => '',
            'filePermissions' => 0644,
            'path' => WRITEPATH . 'logs/',
        ],

        // Uncomment if you want to use ChromeLoggerHandler
        // 'CodeIgniter\Log\Handlers\ChromeLoggerHandler' => [
        //     'handles' => ['critical', 'alert', 'emergency', 'debug', 'error', 'info', 'notice', 'warning'],
        // ],

        // Uncomment if you want to use ErrorlogHandler
        // 'CodeIgniter\Log\Handlers\ErrorlogHandler' => [
        //     'handles' => ['critical', 'alert', 'emergency', 'debug', 'error', 'info', 'notice', 'warning'],
        //     'messageType' => 0,
        // ],
    ];
}
