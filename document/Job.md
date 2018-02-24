# 职业接口操作类

``version：1.0``

#### 1. 获取职位列表

`Action: listAll`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明      |
| page      | 否   | Int   | 页码，默认为1                    |
| perpage   | 否   | Int   | 每页数据数，默认为30，最大为1000 |

###### condition说明

| 参数    | 必填 | 类型   | 说明     |
| ------- | ---- | ------ | -------- |
| jobName | 否   | String | 职位名称 |
| jobId   | 否   | String | 职位ID   |

##### 返回参数

| 参数     | 类型   | 说明     |
| -------- | ------ | -------- |
| total    | number | 页码     |
| pageSize | number | 每页条数 |
| pageNum  | number | 页码     |

| 参数            | 类型   | 说明     |
| --------------- | ------ | -------- |
| jobId           | String | 职位ID   |
| epId            | String | 企业ID   |
| jobName         | String | 职位名称 |
| jobDisplayorder | String | 顺序     |
| jobCreated      | String | 创建时间 |
| jobUpdated      | String | 修改时间 |

#### 2. 获取职位详情

`Action: detail`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数  | 必填 | 类型   | 说明   |
| ----- | ---- | ------ | ------ |
| jobId | 否   | String | 职位ID |

**返回参数**

| 参数            | 类型   | 说明         |
| --------------- | ------ | ------------ |
| jobId           | String | 职位ID       |
| epId            | String | 企业ID       |
| jobName         | String | 职位名称     |
| jobDisplayorder | int    | 排序         |
| dpName          | String | 所属部门名称 |
| jobCreated      | String | 创建时间     |
| jobUpdated      | int    | 修改时间     |

返回参数示例

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518412339441,
    "requestId": "886D9328C0A8016B7E526F29200777E1",
    "data": {
        "jobId": "2FE634477F0000013D52B5D5232CB8F7",
        "epId": "2FE626CA7F00000120F11B1853491390",
        "jobName": "CEO",
        "jobDisplayorder": 0,
        "jobCreated": 1512632104007,
        "jobUpdated": 0
    }
}
```

