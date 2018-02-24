<?php
/**
 * Job.class.php
 * 职位接口操作类
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Job
{

    /**
     * 接口调用类
     *
     * @var object
     */
    private $serv = null;

    /**
     * 获取职位列表的接口地址
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const LIST_URL = '%s/job/page-list';

    /**
     * 获取职位详情的接口地址
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const DETAIL_URL = '%s/job/get';

    /**
     * 初始化
     *
     * @param Service $serv
     *            接口调用类
     */
    public function __construct(Service $serv)
    {
        $this->serv = $serv;
    }

    /**
     * 获取职位列表
     *
     * @param array $condition
     *            查询条件数据
     * @param mixed $orders
     *            排序字段
     * @param int $page
     *            当前页码
     * @param int $perpage
     *            每页记录数
     *            
     * @return boolean|mixed:
     */
    public function listAll($condition = array(), $page = 1, $perpage = 30, $orders = array())
    {
        
        // 查询参数
        $condition = $this->serv->mergeListApiParams($condition, $orders, $page, $perpage);
        
        return $this->serv->postSDK(self::LIST_URL, $condition, 'generateApiUrlB');
    }

    /**
     * 获取职位详情
     *
     * @param array $condition
     *            请求参数
     *            + jobId string 职位ID
     *            
     * @return boolean|mixed:
     */
    public function detail($condition)
    {
        return $this->serv->postSDK(self::DETAIL_URL, $condition, 'generateApiUrlB');
    }
}
