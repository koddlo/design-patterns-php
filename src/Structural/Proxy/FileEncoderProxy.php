<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

class FileEncoderProxy implements Base64Encode
{
    private array $cache = [];

    private FileEncoder $fileEncoder;

    public function __construct(FileEncoder $fileEncoder)
    {
        $this->fileEncoder = $fileEncoder;
    }

    public function encodeBase64(string $path): string
    {
        if (empty($this->cache[$path])) {
            $this->cache[$path] = $this->fileEncoder->encodeBase64($path);
        }

        return $this->cache[$path];
    }
}
