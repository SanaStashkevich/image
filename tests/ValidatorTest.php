<?php

namespace sana\image\tests;


use PHPUnit\Framework\TestCase;
use sana\image\Validator;

/**
 * Class ValidatorTest
 * @package sana\image\tests
 */
class ValidatorTest extends TestCase
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     *
     */
    protected function setUp():void
    {
        $this->validator = new Validator();
    }

    /**
     *
     */
    public function testValidateUrlTrue() {
        $this->assertTrue($this->validator->validateUrl('https://resheto.net/images/mater/0-rompic/romantic_pic_37.jpeg.pagespeed.ce.aMUWZo55th.png'));
    }

    /**
     *
     */
    public function testValidateUrlFalse() {
        $this->assertFalse($this->validator->validateUrl('ht:/ww.resheto.net/images/mater/0-rompic/romantic_pic_37.jpeg.pagespeed.ce.aMUWZo55th.png'));
    }

    /**
     *
     */
    public function testValidatePathTrue() {
        $this->assertTrue($this->validator->validatePath(getcwd()));
    }

    /**
     *
     */
    public function testValidatePathFalse() {
        $this->assertFalse($this->validator->validateUrl(getcwd().'/testss'));
    }

    /**
     *
     */
    public function testValidateMimeTrue() {
        $this->assertTrue($this->validator->validateMime('https://resheto.net/images/mater/0-rompic/romantic_pic_37.jpeg.pagespeed.ce.aMUWZo55th.png'));
    }

    /**
     *
     */
    public function testValidateMimeFalse() {
        $this->assertFalse($this->validator->validateMime('https://resheto.net/images/mater/0-rompic/romantic_pic_37.jpeg.pagespeed.ce.aMUWZo55th.pngsz'));
    }
}
