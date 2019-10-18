<?php

namespace Zd\upload\core;

/**
 * @since 1.0.0
 */
abstract class AbstractUpload {

    public function __construct($config)
    {
        
    }

    /**
     * 上传url的图片到目标存储
     *
     * @param string $url
     * @param string $path
     * @return boole
     */
    public function uploadByUrl($url, $path)
    {

    }

    /**
     * 使用文件流上传到目标存储
     *
     * @param string $fp
     * @param string $path
     * @param string $extName
     * @return boole
     */
    public function uploadByFileObject($fp, $path, $extName = 'jpg')
    {

    }

}