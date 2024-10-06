<?php

declare(strict_types=1);

namespace App\Request;

class TestRequest
{
    public function __construct()
    {
        echo 'TestRequest created' . PHP_EOL;
    }

    public function logGetParams(): void
    {
        echo 'GET params: ' . PHP_EOL;
        foreach ($_GET as $key => $value) {
            echo "$key: $value" . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function logPostParams(): void
    {
        echo 'POST params: ' . PHP_EOL;
        foreach ($_POST as $key => $value) {
            echo "$key: $value" . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function logFiles(): void
    {
        echo 'FILES: ' . PHP_EOL;
        foreach ($_FILES as $key => $value) {
            echo "$key:" . PHP_EOL
                . " name: {$value['name']}" . PHP_EOL
                . " type: {$value['type']}" . PHP_EOL
                . " size: {$value['size']}" . PHP_EOL
                . " tmp_name: {$value['tmp_name']}" . PHP_EOL
                . " error: {$value['error']}"
                . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function logServerParams(): void
    {
        echo 'SERVER params: ' . PHP_EOL;
        foreach ($_SERVER as $key => $value) {
            echo "$key: $value" . PHP_EOL;
        }
        echo PHP_EOL;
    }
}
