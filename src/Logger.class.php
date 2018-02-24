<?php
/**
 * Logger.class.php
 * 日志记录
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Logger
{

    /**
     * 错误: 系统错误【优先级：A】
     * 系统中发生了非常严重的问题，中断了执行，必须需要处理
     *
     * @var string
     */
    const ERR = 'ERROR';

    /**
     * 警告：警告类错误【优先级：B】
     * 系统发生此类问题，可以继续执行，但后续需要关注
     *
     * @var string
     */
    const WARN = 'WARN';

    /**
     * 信息: 程序输出信息【优先级：C】
     * 系统流程处理记录日志，同 debug 类似，但关闭调试模式该级别日志仍旧会记录
     *
     * @var string
     */
    const INFO = 'INFO';

    /**
     * 调试: 调试信息【优先级：D】
     * 用于调试，该级别日志在关闭调试模式则不会记录日志
     *
     * @var string
     */
    const DEBUG = 'DEBUG';

    /**
     * 记录错误日志
     *
     * @param mixed $log
     */
    public static function error($log)
    {
        return self::_write($log, self::ERR);
    }

    /**
     * 记录警告类日志
     *
     * @param mixed $log
     */
    public static function warn($log)
    {
        return self::_write($log, self::WARN);
    }

    /**
     * 记录 info 日志
     *
     * @param mixed $log
     */
    public static function info($log)
    {
        return self::_write($log, self::INFO);
    }

    /**
     * 记录 debug 日志
     * debug 模式关闭，该日志不会记录
     *
     * @param mixed $log
     */
    public static function debug($log)
    {
        if (empty(Config::instance()->debug)) {
            return true;
        }
        return self::_write($log, self::DEBUG);
    }

    /**
     * 写操作日志
     *
     * @param string $log
     *            日志内容字串
     * @param string $level
     *            日志等级
     * @param string $file
     *            日志文件路径
     * @return boolean
     */
    protected static function _write($log, $level = self::ERR, $file = '')
    {
        list ($ts, $ms) = explode('.', number_format(round(microtime(true), 3), 3, '.', '') . '.0');
        $now = Common::rgmdate($ts, 'Y-m-d H:i:s') . '.' . $ms;
        // 如果未指定日志文件, 则自动生成
        if (empty($file)) {
            $file = Config::instance()->logPath . $level . DIRECTORY_SEPARATOR . Common::rgmdate($ts, 'y_m_d') . '.log';
        }
        // 自动创建日志目录
        $log_dir = dirname($file);
        if (!is_dir($log_dir)) {
            mkdir($log_dir, 0755, true);
        }

        // 检测日志文件大小，超过配置大小则备份日志文件重新生成
        if (is_file($file) && Config::instance()->logSize <= filesize($file)) {
            rename($file, dirname($file) . '/' . $ts . '-' . basename($file));
        }

        $wLog = [];
        if (is_array($log)) {
            if (isset($log['requestId'])) {
                $wLog['requestId'] = $log['requestId'];
                unset($log['requestId']);
            }
            if (isset($log['url'])) {
                $wLog['url'] = $log['url'];
                unset($log['url']);
            }
            if (!empty($wLog)) {
                $wLog = array_merge($wLog, $log);
            } else {
                $wLog = $log;
            }
        } else {
            $wLog['message'] = $log;
        }
        unset($log);

        // 写入文件
        file_put_contents($file, json_encode([
            'time' => $now,
            'level' => $level,
            'ip' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
            'uri' => isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '',
            'log' => $wLog,
            'cookie' => $_COOKIE,
            'post' => $_POST,
            'get' => $_GET
        ], JSON_UNESCAPED_UNICODE) . "\n", FILE_APPEND);

        return true;
    }
}
