<?php

namespace sana\image\interfaces;

/**
 * Interface ValidateInterface
 * @package sana\imageByUrl\src
 */
interface ValidatePathInterface
{
    /**
     * @param string $data
     * @return bool
     */
    public function validatePath(string $path):bool;
}