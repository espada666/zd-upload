<?php
/**
 * 阿里云oss
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\upload\core;

use Zd\upload\core\BaseUpload;

use Zd\upload\request\Curl;

use OSS\OssClient;

class Oss extends BaseUpload
{

    private $client = null;

    public function __construct($config)
    {
        parent::__construct($config);

        $this->client = new OssClient($this->config['app_key'], $this->config['app_secret'], $this->config['endpoint']);
    }

    /**
     * 将网络图片上传到oss
     *
     * @param string $url network url
     * @param string $path oss path
     * @return boole
     * @throws Exception
     */
    public function uploadByUrl($url, $path)
    {
        $fp = Curl::get($url);
        $path = $path . '/' . $this->createFileName() . '.' . $this->getExtName($url);
        var_dump($path);
        //$result = $this->client->putObject($this->config['bucket'], $path, $fp);
        //return $result ? true : false;
    }

    /**
     * 使用文件流上传
     *
     * @param buff $fp
     * @param string $path
     * @return boole
     */
    public function uploadByFileObject($fp, $path, $extName = 'jpg')
    {

    }

    /**
     * call method
     *
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public function __call($name, $arguments)
    {
        
    }
}
