# 部门接口操作类

`version：1.0`

#### 1. 获取部门列表

`Action: listAll`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明      |
| page      | 否   | Int   | 页码，默认为1                    |
| perpage   | 否   | Int   | 每页数据数，默认为30，最大为1000 |

###### condition说明

| 参数   | 必填 | 类型   | 说明               |
| ------ | ---- | ------ | ------------------ |
| dpId   | 否   | String | 部门ID             |
| dpName | 否   | String | 部门名称(模糊查询) |

##### 返回参数

| 参数                  | 类型   | 说明                                  |
| --------------------- | ------ | ------------------------------------- |
| dpId                  | String | 部门ID                                |
| epId                  | String | 企业ID                                |
| dpName                | String | 部门名称                              |
| dpParentid            | String | 上级部门id                            |
| dpDisplayorder        | number | 排序                                  |
| dpThirdid             | String | 微信三方部门ID                        |
| isChildDepartment     | number | 是否有子部门 0:没有子部门 1：有子部门 |
| departmentMemberCount | number | 部门人员数量                          |
| dpLevel               | number | 部门层级                              |
| dpLead                | String | 部门负责人ID                          |
| dpCreated             | number | 创建时间                              |
| dpUpdated             | number | 修改时间                              |

#### 2.获取部门详情

`Action: detail`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数 | 必填 | 类型   | 说明   |
| ---- | ---- | ------ | ------ |
| dpId | 是   | String | 部门ID |

返回参数

| 参数                     | 类型         | 说明                                  |
| ------------------------ | ------------ | ------------------------------------- |
| dpId                     | String       | 部门ID                                |
| epId                     | String       | 企业ID                                |
| dpName                   | String       | 部门名称                              |
| dpParentid               | String       | 上级部门id                            |
| dpDisplayorder           | number       | 排序                                  |
| isChildDepartment        | number       | 是否有子部门 0:没有子部门 1：有子部门 |
| departmentPath           | String       | 部门路径                              |
| childrensDepartmentCount | number       | 子部门数量,                           |
| departmentMemberCount    | number       | 部门人员数量                          |
| dpLeadList               | Object(数组) | 部门负责人                            |
| dpLevel                  | number       | 部门层级                              |
| dpCreated                | number       | 创建时间                              |
| dpUpdated                | number       | 修改时间                              |

#### 3. 获取部门类型列表

`Action: listType`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明      |
| page      | 否   | Int   | 页码，默认为1                    |
| perpage   | 否   | Int   | 每页数据数，默认为30，最大为1000 |
| orders    | 否   | Array | 排序规则                         |

###### condition说明

| 参数            | 必填 | 类型   | 说明                 |
| --------------- | ---- | ------ | -------------------- |
| dptId           | *否* | String | 部门类型ID           |
| epId            | *否* | String | 企业ID               |
| dptName         | *否* | String | 部门类型名称         |
| dptDefault      | *否* | Int    | 是否为默认标识       |
| dptDisplayorder | *否* | Int    | 排序号, 值越小越靠前 |

##### 返回参数

| 参数            | 类型   | 说明                                     |
| --------------- | ------ | ---------------------------------------- |
| dptId           | String | 部门类型ID                               |
| epId            | String | 企业ID                                   |
| dptName         | String | 部门类型名称                             |
| dptDefault      | Int    | 是否为默认标识                           |
| dptDisplayorder | String | 排序号, 值越小越靠前                     |
| dptStatus       | String | 部门类型数据状态：1-新增；2-修改；3-删除 |
| dptCreated      | String | 部门类型创建时间                         |
| dptUpdated      | String | 部门类型修改时间                         |
| dptDeleted      | String | 部门类型删除时间                         |

返回参数示例

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518407496151,
    "requestId": "8823AD75C0A8016B7E526F2903A2A20B",
    "data": [
        {
            "dptId": "2FE627AB7F00000120F11B1817F92072",
            "epId": "2FE626CA7F00000120F11B1853491390",
            "dptName": "总部",
            "dptDefault": 0,
            "dptDisplayorder": 1,
            "dptStatus": 1,
            "dptCreated": 1512632100779,
            "dptUpdated": 0,
            "dptDeleted": 0
        },
    ]
}
```



#### 4. 获取部门类型配置列表

`Action: listFieldConfig`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明      |
| page      | 否   | Int   | 页码，默认为1                    |
| perpage   | 否   | Int   | 每页数据数，默认为30，最大为1000 |
| orders    | 否   | Array | 排序规则                         |

###### condition说明

| 参数            | 必填 | 类型   | 说明                                                         |
| --------------- | ---- | ------ | ------------------------------------------------------------ |
| dfcId           | *否* | String | 配置ID                                                       |
| epId            | *否* | String | 企业ID                                                       |
| dptId           | *否* | Array  | 部门类型ID                                                   |
| dfcName         | *否* | String | 字段名称                                                     |
| dfcType         | *否* | String | 字段类型, 包括: String; number, select, areaselect           |
| dfcMin          | *否* | Int    | 最小值, 如果是Int/float时, 该值限制的是实际的值; 如果是String, 则限制的是其长度 |
| dfcMax          | *否* | Int    | 最大值, 如果是Int/float时, 该值限制的是实际的值; 如果是String, 则限制的是其长度 |
| dfcRequire      | *否* | String | 是否必填, 0: 非必填; 1: 必填;                                |
| dfcValues       | *否* | String | 值                                                           |
| dfcDefault      | *否* | String | 默认值                                                       |
| dfcDisplayorder | *否* | Int    | 排序序号, 值越小越靠前                                       |

##### 返回参数

| 参数            | 类型                                                        | 说明                                                         |
| --------------- | ----------------------------------------------------------- | ------------------------------------------------------------ |
| dfcId           | String                                                      | 配置ID                                                       |
| epId            | String                                                      | 企业ID                                                       |
| dptId           | String                                                      | 部门类型ID                                                   |
| dfcName         | String                                                      | 字段名称                                                     |
| dfcType         | String \|字段类型, 包括: String; number, select, areaselect |                                                              |
| dfcMin          | Int                                                         | 最小值, 如果是Int/float时, 该值限制的是实际的值; 如果是String, 则限制的是其长度 |
| dfcMax          | Int                                                         | 最大值, 如果是Int/float时, 该值限制的是实际的值; 如果是String, 则限制的是其长度 |
| dfcRequire      | String                                                      | 是否必填, 0: 非必填; 1: 必填                                 |
| dfcValues       | Int                                                         | 值                                                           |
| dfcDefault      | Int                                                         | 默认值                                                       |
| dfcDisplayorder | Int                                                         | 排序序号, 值越小越靠前                                       |

返回参数示例

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518349804963,
    "requestId": "84B3609DC0A8016B330C4F46A214C663",
    "data": [
        {
            "dfcId": "2FE627AB7F00000120F11B1817F92072",
            "epId": "2FE626CA7F00000120F11B1853491390",  
            "dptId": 2FE627AB7F00000120F11B1817F92072    
            "dfcName": "总部", 
            "dfcType": 0,   
            "dfcMin": 1,  
            "dfcMax": 1, 
            "dfcRequire": 1, 
            "dfcDefault": 1,   
       "dfcDisplayorder": 1,
            "dptStatus": 1,   
            "dptCreated": 1512632100779,
            "dptUpdated": 0,
            "dptDeleted": 0
        },…
    ]
}
```

