<?php

namespace sana\image\tests;


use \PHPUnit\Framework\TestCase;
use sana\image\Loader;
use sana\image\Validator;
use yii\base\Exception;

/**
 * Class LoaderTest
 * @package sana\image\tests
 */
class LoaderTest extends TestCase
{
    const  FROM = 'https://resheto.net/images/mater/0-rompic/romantic_pic_37.jpeg.pagespeed.ce.aMUWZo55th.png';
    private $validatorMock;
    private $loader;

    /**
     *
     */
    protected function setUp():void
    {
        $this->validatorMock = $this->getMockBuilder(Validator::class)
            ->setMethods(['validateUrl','validatePath','validateMime'])
            ->getMock();

        $this->loader = new Loader($this->validatorMock);
    }

    /**
     *
     */
    public function testThrowExceptionNotValidUrl()
    {
        $this->validatorMock->expects($this->once())
            ->method('validateUrl')
            ->with(self::FROM)
            ->will($this->returnValue(false));

        $this->expectExceptionMessage('Not valid URL for download');

        $this->loader->load(self::FROM, getcwd());
    }

    /**
     *
     */
    public function testThrowExceptionNotValidPath()
    {
        $this->validatorMock->expects($this->once())
            ->method('validateUrl')
            ->with(self::FROM)
            ->will($this->returnValue(true));

        $this->validatorMock->expects($this->once())
            ->method('validatePath')
            ->with(getcwd())
            ->will($this->returnValue(false));

        $this->expectExceptionMessage('Not valid Path to save');

        $this->loader->load(self::FROM, getcwd());
    }

    /**
     *
     */
    public function testThrowExceptionNotValidMime()
    {
        $this->validatorMock->expects($this->once())
            ->method('validateUrl')
            ->with(self::FROM)
            ->will($this->returnValue(true));

        $this->validatorMock->expects($this->once())
            ->method('validatePath')
            ->with(getcwd())
            ->will($this->returnValue(true));

        $this->validatorMock->expects($this->once())
            ->method('validateMime')
            ->with(self::FROM)
            ->will($this->returnValue(false));

        $this->expectExceptionMessage('Not valid Mime file');

        $this->loader->load(self::FROM, getcwd());
    }

    /**
     *
     */
    public function testSuccessLoad()
    {
        $this->validatorMock->expects($this->once())
            ->method('validateUrl')
            ->with(self::FROM)
            ->will($this->returnValue(true));

        $this->validatorMock->expects($this->once())
            ->method('validatePath')
            ->with(getcwd())
            ->will($this->returnValue(true));

        $this->validatorMock->expects($this->once())
            ->method('validateMime')
            ->with(self::FROM)
            ->will($this->returnValue(true));

        $this->loader->load(self::FROM, getcwd());
    }
}