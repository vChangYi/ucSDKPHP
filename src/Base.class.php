<?php
/**
 * Base.class.php
 * 基类
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

abstract class Base
{

    /**
     * 接口调用成功时的 code 值
     *
     * @var string
     */
    const SUCCESS_CODE = 'SUCCESS';

    /**
     * 全局 UC RequestId
     *
     * @param string $requestId
     * @return string
     */
    public function allRequestId($requestId = '')
    {
        static $ucRequestId;
        if (empty($ucRequestId) && !empty($requestId)) {
            $ucRequestId = $requestId;
        }

        return empty($ucRequestId) ? '' : $ucRequestId;
    }

    /**
     * 修改配置
     *
     * @param array $config
     *            配置数组
     *
     * @return boolean
     */
    public function setConfig($config = array())
    {
        return Config::instance()->setConfig($config);
    }

    /**
     * 返回业务所需数据
     *
     * @param array $data
     *            接口返回数据
     *
     * @throws Exception
     * @return mixed
     */
    public function returnData($data)
    {
        return isset($data['data']) ? $data['data'] : '';
    }

    /**
     * 创建一个支付 Api Url
     *
     * @param string $url
     *            Url地址
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlPay()
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个 Api Url
     *
     * @param array $params
     *            Url 相关参数, 第一个值为 Url 格式字串; 最后一个值为主 Url 部分
     *
     * @return boolean
     */
    public function generateApiUrl($params)
    {

        // 获取 format 字串
        $url = $params[0];
        $urlPath = array_pop($params);
        // 切出所有 sprintf 参数
        $params = array_slice($params, 1);
        array_unshift($params, $url, $urlPath);

        // 调用 sprintf 方法
        return call_user_func_array('sprintf', $params);
    }

    /**
     * 创建一个系统 Api Url
     *
     * @param string $url
     *            Url地址
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlS($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个系统 Api Url
     *
     * @param string $url
     *            Url地址
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlSP($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个企业 Api Url
     *
     * @param string $url
     *            Url地址
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlE($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个企业 Api Url
     *
     * @param string $url
     *            Url地址
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlB($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个应用渠道 Api Url
     *
     * @param string $url
     *            获取接口Url
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlA($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个资源类 Api Url
     *
     * @param
     *            $url
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function generateApiUrlAtt($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个文件换换类 Api Url
     *
     * @param
     *            $url
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function generateConvertUrl($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getConvertApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 创建一个企业 Api Url
     * 红包工程使用
     *
     * @param string $url
     *            Url地址
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function generateRedpacketApiUrlE($url)
    {

        // 获取参数数组
        $params = func_get_args();
        // 从配置中获取 Url 相关数据
        $paths = array();
        // 获取域名
        if (!$this->getApiUrl($paths[])) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        $params[] = implode('/', $paths);

        return $this->generateApiUrl($params);
    }

    /**
     * 获取第三方标识
     *
     * @param
     *            string &$thirdIdentifier 第三方标识
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function getThirdIdentifier(&$thirdIdentifier)
    {

        // 获取第三方标识
        $thirdIdentifier = Config::instance()->thirdIdentifier;
        if (empty($thirdIdentifier)) {
            throw new Exception(Error::THIRD_IDENTIFIER_EMPTY);
            return false;
        }

        return true;
    }

    /**
     * 获取应用标识
     *
     * @param
     *            string &$pluginIdentifier 应用标识
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function getPluginIdentifier(&$pluginIdentifier)
    {

        // 获取应用标识
        $pluginIdentifier = Config::instance()->pluginIdentifier;
        if (empty($pluginIdentifier)) {
            throw new Exception(Error::PLUGIN_IDENTIFIER_EMPTY);
            return false;
        }

        return true;
    }

    /**
     * 获取企业账号
     *
     * @param
     *            string &$enumber 企业账号配置
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function getEnumber(&$enumber)
    {

        // 获取企业账号
        $enumber = Config::instance()->enumber;
        if (empty($enumber)) {
            throw new Exception(Error::ENUMBER_EMPTY);
            return false;
        }

        return true;
    }

    /**
     * 获取域名
     *
     * @param
     *            string &$apiUrl 域名配置
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function getApiUrl(&$apiUrl)
    {

        // 获取域名
        $apiUrl = Config::instance()->apiUrl;
        if (empty($apiUrl)) {
            throw new Exception(Error::API_URL_EMPTY);
            return false;
        }

        return true;
    }

    /**
     * 获取文件转换接口域名
     *
     * @param
     *            string &$convertApiUrl 域名配置
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function getConvertApiUrl(&$convertApiUrl)
    {
        // 获取域名
        $convertApiUrl = Config::instance()->fileConvertApiUrl;

        if (empty($convertApiUrl)) {
            throw new Exception(Error::FILE_CONVERT_API_URL_EMPTY);
            return false;
        }

        return true;
    }

    /**
     * 构造列表请求参数
     *
     * @param array $condition
     *            查询参数
     * @param array $orders
     *            排序参数
     * @param int $page
     *            页码
     * @param int $perpage
     *            每页记录数
     *
     * @return array
     */
    public function mergeListApiParams($condition = array(), $orders = array(), $page = 1, $perpage = 30)
    {

        // 强制转换成数组
        $condition = (array) $condition;

        // 排序参数
        if (!empty($orders) && is_array($orders)) {
            $condition['orderList'] = array();
            // 遍历所有排序字段
            foreach ($orders as $field => $type) {
                $condition['orderList'][] = array(
                    'column' => $field,
                    'orderType' => $type
                );
            }
        }

        // 分页参数
        $condition['pageNum'] = $page;
        $condition['pageSize'] = $perpage;

        return $condition;
    }

    /**
     * 使用GET方式请求接口数据
     *
     * @param
     *            mixed &$data 返回值
     * @param string $url
     *            请求URL
     * @param string $reqData
     *            请求数据
     * @param mixed $headers
     *            请求头部
     * @param bool $retry
     *            是否重试
     *
     * @return boolean
     */
    public function get(&$data, $url, $reqData = null, $headers = array(), $retry = false)
    {
        return $this->request($data, $url, $reqData, $headers, 'GET', null, $retry);
    }

    /**
     * 使用POST方式请求接口数据
     *
     * @param
     *            mixed &$data 返回值
     * @param string $url
     *            请求URL
     * @param string $reqData
     *            请求数据
     * @param mixed $headers
     *            请求头部
     * @param mixed $files
     *            文件
     * @param bool $retry
     *            是否重试
     *
     * @return boolean
     */
    public function post(&$data, $url, $reqData = null, $headers = array(), $files = null, $retry = false)
    {
        return $this->request($data, $url, $reqData, $headers, 'POST', $files, $retry);
    }

    /**
     * 请求SDK接口
     *
     * @param string $url
     *            接口URL
     * @param array $reqData
     *            请求参数
     * @param string $urlFunc
     *            URL拼凑方法
     * @param array $urlParams
     *            URL参数
     * @param mixed $files
     *            文件
     * @param string $type
     *            请求方式
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function postSDK($url, $reqData, $urlFunc, $urlParams = array(), $files = null, $type = 'post')
    {
        // 拼凑URL
        $func = array(
            $this,
            $urlFunc
        );
        array_unshift($urlParams, $url);
        $apiUrl = call_user_func_array($func, $urlParams);
        if (!$apiUrl) {
            throw new Exception(Error::API_URL_ERROR);
            return false;
        }

        // 头信息
        if (null == $files) {
            $headers = array(
                'Content-Type' => 'application/json'
            );
        } else {
            $headers = array();
        }

        // 计算签名
        $sigSdk = &ApiSig::instance();
        $timestamp = round(microtime(true), 3) * 1000;
        $sig = $sigSdk->getSig($reqData, [
            'timestamp' => $timestamp,
            'key' => Config::instance()->enumber
        ]);
        $reqData['sign'] = $sig;
        $reqData['timestamp'] = $timestamp;
        $reqData['key'] = Config::instance()->enumber;

        // 发送请求
        $data = array();
        try {
            if (!$this->$type($data, $apiUrl, $reqData, $headers, $files)) {
                throw new Exception(Error::API_REQUEST_ERROR);
                return false;
            }
        } catch (Exception $e) {
            Logger::error([
                'type' => $type,
                'url' => $apiUrl,
                'data' => $reqData,
                'msg' => $e->getMessage(),
                'code' => $e->getCode(),
                'requestId' => $e->getRequestID(),
                'sdkCode' => $e->getSdkCode(),
                'config' => Config::instance(),
                'result' => $data
            ]);
            // 获取报错信息
            $msgs = array(
                'msg' => $e->getMessage(),
                'code' => $e->getSdkCode(),
                'requestId' => $e->getRequestID()
            );
            throw new Exception($msgs, $e->getCode());
        }

        // 记录 UC 请求 ID
        $this->allRequestId($data['requestId']);

        // 验证返回数据签名
        Logger::info([
            'message' => 'UC请求方法：' . $url
        ]);
        if (isset($data['data'])) {
            // $sigSdk = &ApiSig::instance();
            // $sig = $sigSdk->getSig($data['data'], ['timestamp' => $data['timestamp']]);
            // if ($sig !== $data['sign']) {
            // throw new Exception('接口返回数据签名错误');
            // }

            return $data['data'];
        }

        // 如果没有data返回则返回code
        return [
            'code' => $data['code']
        ];
    }

    /**
     * 整理错误信息
     *
     * @param Exception $err
     * @return string
     */
    protected function collectExceptionMsg($err)
    {
        $message = $err->getMessage();
        $trace = $err->getTrace();
        Logger::info([
            'trace' => $trace
        ]);
        if (!is_array($trace) || 0 >= count($trace)) {
            return $message;
        }

        $args = isset($trace[0]) ? (array) $trace[0]['args'] : array();
        $data = isset($args[0]) ? (array) $args[0]['data'] : array();
        $otherMsgs = [];
        foreach ($data as $_msg) {
            if (empty($_msg['field']) || empty($_msg['message'])) {
                continue;
            }

            $otherMsgs[] = $_msg['field'] . ':' . $_msg['message'];
        }

        $message .= implode($otherMsgs);
        return $message;
    }

    /**
     * 拼凑请求URL
     *
     * @param string $url
     *            URL地址
     * @param mixed $params
     *            请求参数
     *
     * @return boolean
     */
    protected function buildGetQuery(&$url, $params)
    {

        // 如果请求数据为空
        if (empty($params)) {
            return true;
        }

        // 拼凑 GET 字串
        if (is_array($params)) {
            $get_data = http_build_query($params);
        } else {
            $get_data = $params;
        }

        // 判断 URL 是否有参数
        if (false === strpos($url, '?')) {
            $url .= '?';
        } else {
            $url .= '&';
        }

        $url .= $get_data;

        return true;
    }

    /**
     * 请求接口数据
     *
     * @param
     *            mixed &$data 返回值
     * @param string $url
     *            请求URL
     * @param string|array $reqParams
     *            请求数据
     * @param mixed $headers
     *            请求头部
     * @param string $method
     *            请求方式, 如: GET/POST/DELETE/PUT
     * @param mixed $files
     *            文件路径
     * @param bool $retry
     *            是否重试
     *
     * @return boolean
     * @throws \ucSDK\Exception
     */
    public function request(&$data, $url, $reqParams, $headers, $method, $files = null, $retry = false)
    {

        // 载入 Snoopy 类
        $snoopy = new \ucSDK\Net\Snoopy();
        // 使用自定义的头字段，格式为 array(字段名 => 值, ... ...)
        if (!is_array($headers)) {
            $headers = array();
        }

        Logger::info([
            "url" => $url,
            "method" => $method,
            "post" => $reqParams,
            "header" => $headers,
            "files" => $files
        ]);
        $snoopy->rawheaders = $headers;
        $method = Common::rstrtoupper($method);
        // 非 GET 协议, 需要设置
        $methods = array(
            'POST',
            'PUT',
            'DELETE'
        );
        if (!in_array($method, $methods)) {
            $method = 'GET';
        }

        // 设置协议
        if (!empty($files)) {
            // 如果需要传文件
            $method = 'POST';
            $snoopy->set_submit_multipart();
        } else {
            $snoopy->set_submit_normal('application/json');
        }

        // 判断协议
        $snoopy->set_submit_method($method);
        switch (Common::rstrtoupper($method)) {
            case 'POST':
            case 'PUT':
            case 'DELETE':
                $result = $snoopy->submit($url, $reqParams, $files);
                break;
            default:
                // 如果有请求数据
                $this->buildGetQuery($url, $reqParams);
                $result = $snoopy->fetch($url);
                break;
        }

        // 如果读取错误
        if (!$result || 200 != $snoopy->status) {
            Logger::error([
                "status" => $snoopy->status,
                "error" => $snoopy->error,
                "method" => $method,
                "url" => $url,
                "message" => Error::API_REQUEST_ERROR,
                "post" => $reqParams,
                "result" => $result
            ]);
            // 出错时, 返回 $snoopy 对象
            $data = $snoopy;
            throw new Exception(Error::API_REQUEST_ERROR);
        }

        // 获取返回数据
        $data = $snoopy->results;
        // 如果返回的是 JSON, 则解析 JSON
        if ($this->isJson($snoopy->headers)) {
            $data = json_decode($data, true);
            // 如果接口返回错误, 则直接抛异常
            if (self::SUCCESS_CODE != $data['code']) {
                throw new Exception($data);
            }
        }

        Logger::debug([
            "post" => $reqParams,
            "result" => $data
        ]);
        // 如果返回的数据为空, 则
        if (empty($data)) {
            Logger::error([
                "method" => $method,
                "url" => $url,
                "message" => Error::API_RESPONSE_DATA_EMPTY,
                "status" => $snoopy->status,
                "error" => $snoopy->error,
                "result" => $result
            ]);
            // 出错时, 返回 $snoopy 对象
            $data = $snoopy;
            throw new Exception(Error::API_RESPONSE_DATA_EMPTY);
        }

        return true;
    }

    /**
     * 判断返回值是否为Json数据
     *
     * @param array $headers
     *            头部数据
     *
     * @return boolean
     */
    private function isJson($headers)
    {

        // 如果头部信息已经解析出来, 则
        if (isset($headers['Content-Type'])) {
            return 0 === strpos($headers['Content-Type'], 'application/json');
        }

        // 遍历返回的头部信息
        foreach ($headers as $_header) {
            // 如果匹配到 json 头
            if (preg_match('/^Content-Type:\s*application\/json/i', $_header)) {
                return true;
            }
        }

        return false;
    }

    /**
     * 验证请求签名
     *
     * @param string $method
     *            请求方式
     *
     * @return mixed
     */
    public function checkSig($method = 'POST')
    {
        $sig = ApiSig::instance();
        return $sig->getParamAndCheck([], $method);
    }
}
