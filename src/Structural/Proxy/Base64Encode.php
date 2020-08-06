<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

interface Base64Encode
{
    public function encodeBase64(string $path): string;
}
