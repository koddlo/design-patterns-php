<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy\Test;

use DesignPatterns\Structural\Proxy\FileEncoder;
use DesignPatterns\Structural\Proxy\FileEncoderProxy;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

final class FileEncoderProxyTest extends TestCase
{
    use ProphecyTrait;

    public function testProxyDoesNotChangeResult(): void
    {
        $fileTestPath = 'https://koddlo.pl/images/test.png';
        $base64example = 'S29kZGxv';

        $fileEncoder = $this->prophesize(FileEncoder::class);
        $fileEncoder
            ->encodeBase64($fileTestPath)
            ->willReturn($base64example);
        $fileEncoderProxy = new FileEncoderProxy($fileEncoder->reveal());

        $this->assertSame($base64example, $fileEncoderProxy->encodeBase64($fileTestPath));
    }

    public function testProxyCacheResult(): void
    {
        $fileTestPath = 'https://koddlo.pl/images/test.png';
        $base64example = 'S29kZGxv';

        $fileEncoder = $this->prophesize(FileEncoder::class);
        $fileEncoder
            ->encodeBase64($fileTestPath)
            ->shouldBeCalledOnce()
            ->willReturn($base64example);
        $fileEncoderProxy = new FileEncoderProxy($fileEncoder->reveal());

        $fileEncoderProxy->encodeBase64($fileTestPath);
        $fileEncoderProxy->encodeBase64($fileTestPath);
        $fileEncoderProxy->encodeBase64($fileTestPath);
    }
}
