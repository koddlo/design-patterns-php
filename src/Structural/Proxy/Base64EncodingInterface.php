<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

interface Base64EncodingInterface
{
    public function encodeBase64(string $path): string;
}
