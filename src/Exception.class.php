<?php
/**
 * Exception.class.php
 * 异常
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Exception extends \Exception
{

    /**
     * 请求ID
     *
     * @type string
     */
    protected $_request_id = '';

    /**
     * SDK 错误码
     *
     * @type string
     */
    protected $_sdk_code = '';

    /**
     * 异常构造方法
     *
     * @param array|string $message
     *            异常详情
     * @param string $code
     *            异常错误号
     * @param string $previous
     *            前一个异常
     */
    public function __construct($message = null, $code = null, $previous = null)
    {
        if (is_array($message)) {
            $this->_request_id = $message['requestId'];
            $code = $message['code'];
            $message = $message['msg'];
        }
        
        // 判断是否有错误编号
        if (preg_match('/^(\s*\d+\s*):/', $message)) {
            $pos = stripos($message, ':');
            $ncode = substr($message, 0, $pos);
            $message = substr($message, $pos + 1);
            // 如果错误号为空, 则取详情中得编号
            if (empty($code)) {
                $code = $ncode;
            }
        }
        
        // 记录日志
        Logger::error([
            "requestId" => $this->_request_id,
            "sdkcode" => $this->getSdkCode(),
            "code" => $code,
            "message" => $message,
            "file" => $this->getFile(),
            "line" => $this->getLine()
        ]);
        
        $iCode = (int) $code;
        parent::__construct($message, $iCode, $previous);
        $this->_sdk_code = $code;
    }

    /**
     * 获取请求ID
     *
     * @return string
     */
    public function getRequestID()
    {
        return $this->_request_id;
    }

    /**
     * 获取SDK错误码
     *
     * @return string
     */
    public function getSdkCode()
    {
        return $this->_sdk_code;
    }
}
