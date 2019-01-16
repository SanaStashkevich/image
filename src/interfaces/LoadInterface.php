<?php

namespace sana\image\interfaces;

/**
 * Interface LoadInterface
 * @package sana\imageByUrl\src
 */
interface LoadInterface
{
    /**
     * @param string $from
     * @param string $to
     * @return mixed
     */
    public function load(string $from, string $to);
}
