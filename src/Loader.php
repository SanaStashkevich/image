<?php
/**
 * Created by PhpStorm.
 * User: aleksandr
 * Date: 1/16/19
 * Time: 4:18 PM
 */

namespace sana\image;


class Loader extends LoaderBase
{
    public function __construct()
    {
        parent::__construct(new Validator());
    }

}