<?php

namespace sana\image\interfaces;

/**
 * Interface ValidateInterface
 * @package sana\imageByUrl\src
 */
interface ValidateMimeInterface
{
    /**
     * @param string $data
     * @return bool
     */
    public function validateMime(string $mime):bool;
}