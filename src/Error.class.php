<?php
/**
 * Error.class.php
 * SDK错误配置
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Error
{

    const API_URL_EMPTY = '接口地址未初始化';

    const ENUMBER_EMPTY = '企业账号未初始化';

    const PLUGIN_IDENTIFIER_EMPTY = '应用标识未初始化';

    const THIRD_IDENTIFIER_EMPTY = '第三方标识未初始化';

    const API_RESPONSE_DATA_EMPTY = '接口返回数据错误';

    const APPID_EMPTY = '服务号appid未初始化';

    const API_REQUEST_ERROR = '接口请求错误';

    const API_URL_ERROR = '接口地址生成错误';

    const APISIG_REQUEST_EXPIRED = '签名已过期';

    const APISIG_ERROR = '签名错误';

    const WXMP_QRCODE_EXPIRED_ERROR = '二维码过期时间错误';

    const API_RETURN_DATA_ERROR = '接口返回数据格式错误';

    const FILE_CONVERT_API_URL_EMPTY = '文件转换接口地址未初始化';
}
