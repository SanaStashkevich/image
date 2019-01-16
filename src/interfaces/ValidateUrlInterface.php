<?php

namespace sana\image\interfaces;

/**
 * Interface ValidateInterface
 * @package sana\imageByUrl\src
 */
interface ValidateUrlInterface
{
    /**
     * @param string $data
     * @return bool
     */
    public function validateUrl(string $url):bool;
}