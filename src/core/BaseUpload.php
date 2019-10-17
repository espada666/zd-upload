<?php
/**
 * 基础类
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\upload\core;

use Zd\upload\core\AbstractUpload;

/**
 * class factory
 * 
 */
class BaseUpload extends AbstractUpload
{

    protected $config = [];
    
    private static $instance = null;

    /**
     * 禁止实例化的类
     *
     * @var array
     */
    protected $illegalClass = [];

    /**
     * 构造函数
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * 获取文件的扩展名
     *
     * @param string $file
     * @return string
     */
    public function getExtName($file, $default = 'jpg')
    {
        $extName = pathinfo($file, PATHINFO_EXTENSION);
        return !empty($extName) ? strtolower($extName) : $default;
    }

    /**
     * 创建文件名
     *
     * @return string
     */
    public function createFileName()
    {
        return time() . '_' . uniqid();
    }

    /**
     * magic
     *
     * @param string $name
     * @return void
     */
    public function __get($name)
    {
        if (in_array($name, $this->illegalClass)) {
            throw new \Exception('invalid class', 0);
        }

        $className = '\\' . ucfirst(strtolower(get_class($this))) . '\\' . ucwords($name);
        if (self::$instance == null) {
            self::$instance = new $className($this->config);
        }

        return self::$instance;
    }

    /**
     * 禁止clone
     *
     * @return void
     */
    private function __clone()
    {
        
    }

    

  
}