<?php
/**
 * curl库
 * 
 * @license MIT
 * @author espada 369850596@qq.com
 */
namespace Zd\upload\request;

class Curl
{

    /**
     * curl get
     *
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public static function get($url, $options = [])
    {
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时时间
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if ($options) {
            foreach ($options as $key => $value) {
                curl_setopt($ch, $key, $value);
            }
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /**
     * curl post
     *
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public static function post($url, $data, $options = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时时间
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($options) {
            foreach ($options as $key => $value) {
                curl_setopt($ch, $key, $value);
            }
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /**
     * post json
     *
     * @param string $url
     * @param string $data
     * @param array $options
     * @return object
     */
    public static function postJson($url, $data, $options = [])
    {
        $result = self::post($url, $data, [
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json', 
                'Content-Length:' . strlen($data)
            ]
        ]);

        return $result;
    }

    /**
     * post xml
     *
     * @param string $url
     * @param string $xml
     * @return array
     */
    public static function postXml($url, $xml, $options = [])
    {
        $options[CURLOPT_SSL_VERIFYPEER] = true;
        $options[CURLOPT_SSL_VERIFYHOST] = 2;
        $result = self::post($url, $xml, $options);
        $result = json_decode(json_encode(simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $result;
    }
}