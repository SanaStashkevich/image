<?php

namespace sana\image;


use sana\image\interfaces\LoadInterface;
use yii\base\Exception;

/**
 * Class LoadImageClass
 * @package sana\imageByUrl\src
 */
class Loader implements LoadInterface
{
    /**
     * @var Validator
     */
    private $validatorHandler;

    /**
     * Loader constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validatorHandler = $validator;
    }

    /**
     * @param string $from
     * @param string $to
     * @return void
     * @throws Exception
     */
    public function load(string $from, string $to):void
    {
        if (!$this->validatorHandler->validateUrl($from)) {
            throw new Exception('Not valid URL for download');
        }

        if (!$this->validatorHandler->validatePath($to)) {
            throw new Exception('Not valid Path to save');
        }

        if (!$this->validatorHandler->validateMime($from)) {
            throw new Exception('Not valid Mime file');
        }
        $filename = basename($from);
        $savePath = $to .'/'. $filename;

        $ch = curl_init($from);

        $fp = fopen($savePath, 'wb');

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}