<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

final class FileEncoderProxy implements Base64EncodingInterface
{
    private array $cache = [];

    public function __construct(
        private FileEncoder $fileEncoder
    ) {}

    public function encodeBase64(string $path): string
    {
        if (empty($this->cache[$path])) {
            $this->cache[$path] = $this->fileEncoder->encodeBase64($path);
        }

        return $this->cache[$path];
    }
}
