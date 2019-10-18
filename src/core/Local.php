<?php
/**
 * 存放到本地
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\upload\core;

use Zd\upload\core\BaseUpload;

class Cos extends BaseUpload
{

    private $cos = null;

    public function __construct($config)
    {
        parent::__construct($config);

        //$this->oss = new OssClient($this->config['app_key'], $this->config['app_secret'], '');
    }

    /**
     * 将网络图片上传到oss
     *
     * @param string $url
     * @return void
     */
    public function uploadByUrl($url, $path)
    {

    }
}
