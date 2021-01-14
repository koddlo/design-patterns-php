<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy\Test;

use DesignPatterns\Structural\Proxy\FileEncoder;
use DesignPatterns\Structural\Proxy\FileEncoderProxy;
use PHPUnit\Framework\TestCase;

final class FileEncoderProxyTest extends TestCase
{
    public function testProxyDoesNotChangeResult(): void
    {
        $fileTestPath = 'https://koddlo.pl/images/test.png';
        $base64example = 'S29kZGxv';

        $fileEncoder = $this->createMock(FileEncoder::class);
        $fileEncoder
            ->expects($this->any())
            ->method('encodeBase64')
            ->with($fileTestPath)
            ->willReturn($base64example);

        $fileEncoderProxy = new FileEncoderProxy($fileEncoder);

        $this->assertSame($base64example, $fileEncoderProxy->encodeBase64($fileTestPath));
    }

    public function testProxyCacheResult(): void
    {
        $fileTestPath = 'https://koddlo.pl/images/test.png';
        $base64example = 'S29kZGxv';

        $fileEncoder = $this->createMock(FileEncoder::class);
        $fileEncoder
            ->expects($this->once())
            ->method('encodeBase64')
            ->with($fileTestPath)
            ->willReturn($base64example);

        $fileEncoderProxy = new FileEncoderProxy($fileEncoder);

        $fileEncoderProxy->encodeBase64($fileTestPath);
        $fileEncoderProxy->encodeBase64($fileTestPath);
        $fileEncoderProxy->encodeBase64($fileTestPath);
    }
}
