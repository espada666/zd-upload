<?php
/**
 * @author espadas 369850596@qq.com
 * @license MIT
 */

namespace Zd\upload;

class App
{
    
    public static function init($config = [])
    {
        return new \Zd\upload\Engine($config);
    }
}
