<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Migrations extends BaseConfig
{
    public bool $enabled = true;

    public string $type = 'timestamp';

    public string $timestampFormat = 'Y-m-d-His_';

    public string $table = 'migrations';

    public bool $autoMigrate = false;

    public string $namespace = 'App';

    public array $paths = [
        APPPATH . 'Database/Migrations',
    ];
}