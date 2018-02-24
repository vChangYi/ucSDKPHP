<?php
/**
 * Common.class.php
 * 公共处理方法
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Common
{

    /**
     * 把字串中字母转成大写(重写 strtoupper);
     *
     * @param string $str
     *            字符串;
     * @return string;
     */
    public static function rstrtoupper($str)
    {
        return strtr($str, "abcdefghijklmnopqrstuvwxyz", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    }

    /**
     * 把字串中字母转成小写(重写 strtolower);
     *
     * @param string $str
     *            字符串;
     * @return string
     */
    public static function rstrtolower($str)
    {
        return strtr($str, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");
    }

    /**
     * 把时间戳转换成指定格式
     *
     * @param int $timestamp
     *            时间戳
     * @param string $format
     *            格式
     * @param string $timeoffset
     *            时区
     * @param string $uformat
     * @return string;
     */
    public static function rgmdate($timestamp, $format = 'zx', $timeoffset = '9999', $uformat = '')
    {
        static $dformat, $tformat, $dtformat, $offset;
        // 如果未指定格式
        if ($dformat === null) {
            $dformat = 'Y-m-d';
            $tformat = 'H:i';
            $dtformat = $dformat . ' ' . $tformat;
            $offset = 8;
        }

        // 时间戳转换为秒为单位
        if (0 < ($timestamp >> 32)) {
            $timestamp = round($timestamp / 1000);
        }

        // 剔除首尾空格
        $format = trim($format);
        // 时区偏移
        $timeoffset = $timeoffset == 9999 ? $offset : $timeoffset;
        $timestamp += $timeoffset * 3600;
        // 判断用户所需格式
        if (empty($format) || $format == 'zx') {
            $format = $dtformat;
        } elseif ($format == 'z') {
            $format = $dformat;
        } elseif ($format == 'x') {
            $format = $tformat;
        }
        if ($format == 'u') {
            // 今天的起始时间戳(即: 00:00:00)
            $nowTime = time();
            $today_ts = $nowTime - ($nowTime + $timeoffset * 3600) % 86400 + $timeoffset * 3600;
            $s = gmdate(!$uformat ? $dtformat : $uformat, $timestamp);
            // 今天已逝去的时间
            $time = $nowTime + $timeoffset * 3600 - $timestamp;
            // 如果当前时间戳就是当天之内
            if ($timestamp >= $today_ts) {
                if ($time > 3600) {
                    return intval($time / 3600) . ' 小时之前';
                } elseif ($time > 1800) {
                    return '半小时之前';
                    ;
                } elseif ($time > 60) {
                    return intval($time / 60) . ' 分钟之前';
                } elseif ($time > 0) {
                    return $time . ' 秒之前';
                } elseif ($time == 0) {
                    return '现在';
                } else {
                    return $s;
                }
            } elseif (($days = intval(($today_ts - $timestamp) / 86400)) >= 0 && $days < 7) {
                if ($days == 0) {
                    return '今天 ' . gmdate($tformat, $timestamp);
                } elseif ($days == 1) {
                    return '昨天 ' . gmdate($tformat, $timestamp);
                } else {
                    return ($days + 1) . ' 天之前';
                }
            } else {
                return $s;
            }
        } else { // 默认时间格式
            $format = trim($format);
            if (!$format) {
                $format = 'Y-m-d H:i';
            }

            return gmdate($format, $timestamp);
        }
    }

    /**
     * 根据数组指定的键对应的值, 作为新数组的键名
     *
     * @param array $arr
     *            二维数组
     * @param string $key
     *            键名
     * @return array
     */
    public static function array_combine_by_key($arr, $key)
    {
        $keys = array_column($arr, $key);

        return array_combine($keys, $arr);
    }
}
