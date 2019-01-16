<?php
/**
 * Created by PhpStorm.
 * User: aleksandr
 * Date: 1/16/19
 * Time: 9:23 AM
 */

namespace sana\image;


use sana\image\interfaces\ValidateMimeInterface;
use sana\image\interfaces\ValidatePathInterface;
use sana\image\interfaces\ValidateUrlInterface;

/**
 * Class Validator
 * @package sana\image
 */
class Validator implements ValidateMimeInterface, ValidatePathInterface, ValidateUrlInterface
{
    /**
     * @const array
     */
    const VALID_MIME_FOR_PICTURES = ['.jpeg', '.png', '.gif', '.jpg'];
    /**
     * @param string $data
     * @return bool
     */
    public function validateMime(string $url): bool
    {
        return in_array(substr($url,strripos($url,'.')),self::VALID_MIME_FOR_PICTURES);

    }

    /**
     * @param string $data
     * @return bool
     */
    public function validatePath(string $path): bool
    {
        return is_dir($path) && is_writable($path);
    }

    /**
     * @param string $data
     * @return bool
     */
    public function validateUrl(string $url): bool
    {
        $headers = @get_headers($url);
        return (strpos( $headers[0], '200') != false)  && filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
    }
}