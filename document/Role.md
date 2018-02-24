# 角色接口操作类

`version：1.0`

#### 1. 获取角色列表

`Action: listAll`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明      |
| page      | 否   | Int   | 页码，默认为1                    |
| perpage   | 否   | Int   | 每页数据数，默认为30，最大为1000 |

###### condition说明

| 参数     | 必填 | 类型   | 说明         |
| -------- | ---- | ------ | ------------ |
| roleId   | *否* | String | 员工角色ID   |
| roleName | *否* | String | 员工角色名称 |

**返回参数**

| 参数     | 类型  | 说明                 |
| -------- | ----- | -------------------- |
| total    | Int   | 总数                 |
| pageNum  | Int   | 页数                 |
| pageSize | Int   | 每页数量             |
| list     | Array | 排名（详见list说明） |

**list说明**

| 参数             | 类型   | 说明                             |
| ---------------- | ------ | -------------------------------- |
| roleId           | String | 员工角色ID                       |
| epId             | String | 企业ID                           |
| roleName         | Int    | 员工角色名称                     |
| roleDisplayorder | String | 角色排序                         |
| roleStatus       | Int    | 数据状态：1-新增；2-修改；3-删除 |
| roleCreated      | String | 角色创建时间                     |
| roleDeleted      | Int    | 角色删除时间                     |

返回参数示例

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518416169669,
    "requestId": "88A80672C0A8016B781CD86EF4D5C1BC",
    "data": {
        "list": [
            {
                "roleId": "2FE63D6D7F00000120F11B18BB7019BA",
                "epId": "2FE626CA7F00000120F11B1853491390",
                "roleName": "管理者",
                "roleDisplayorder": 0,
                "roleStatus": 1,
                "roleCreated": 1512632106349,
                "roleUpdated": 0,
                "roleDeleted": 0
            },
        ],
        "total": 6,
        "pageSize": 20,
        "pageNum": 1
    }
}
```

#### 2. 获取角色详情

`Action: detail`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数   | 必填 | 类型   | 说明       |
| ------ | ---- | ------ | ---------- |
| roleId | *否* | String | 员工角色ID |

**返回参数**

| 参数             | 类型   | 说明                             |
| ---------------- | ------ | -------------------------------- |
| roleId           | String | 员工角色ID                       |
| epId             | String | 企业ID                           |
| roleName         | String | 员工角色名称                     |
| roleDisplayorder | String | 角色排序                         |
| roleStatus       | Int    | 数据状态：1-新增；2-修改；3-删除 |
| roleCreated      | String | 角色创建时间                     |
| roleDeleted      | Int    | 角色删除时间                     |

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518416169669,
    "requestId": "88A80672C0A8016B781CD86EF4D5C1BC",
    "data": {
                "roleId": "2FE63D6D7F00000120F11B18BB7019BA",
                "epId": "2FE626CA7F00000120F11B1853491390",
                "roleName": "管理者",
                "roleDisplayorder": 0,
                "roleStatus": 1,
                "roleCreated": 1512632106349,
                "roleUpdated": 0,
                "roleDeleted": 0
    }
}
```

