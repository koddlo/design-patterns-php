<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

class FileEncoder implements Base64EncodingInterface
{
    /**
     * @throws FileNotFoundException
     */
    public function encodeBase64(string $path): string
    {
        $file = file_get_contents($path);

        if (false === $file) {
            throw new FileNotFoundException(sprintf('File does not exist, path: %s', $path));
        }

        return base64_encode($file);
    }
}
