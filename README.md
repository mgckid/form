## Form介绍:
>  使用php编写的html动态表单生成工具，没有任何依赖可独立使用,支持链式操作和配置创建表单，支持表单美化(默认为layui风格，支持jquery控制表单行为，只需要引入layui样式和js即可)。

##  特点:

1. 没有任何依赖可独立使用

2. 支持链式操作创建表单

3. 支持数组配置创建表单

4. 支持块表单

5. 支持行内表单

6. 支持table表单

7. 支持表单美化(默认为layui风格)且方便扩展


## 项目链接:
**github**: [https://github.com/mgckid/form](https://github.com/mgckid/form)

**gitee**:[https://gitee.com/mgckid/form](https://gitee.com/mgckid/form)

## 安装方法:
```
composer require mgckid/form
```
## 示例代码：
> 更多举例请移步demo目录去运行simple.php 查看效果。
```
> 运行方法 可以使用php自带的web服务器 在cmd命令行中输入以下命令开启。
php -S 127.0.0.1:88 -t D:\www\github\form\demo

> 在浏览器中 输入访问地址
http://127.0.0.1:88/simple.php  对应链式操作创建块表单
http://127.0.0.1:88/simple_array.php  对应数组配置创建块表单
http://127.0.0.1:88/simple_line.php  对应行内表单
http://127.0.0.1:88/simple_table.php  对应table表单
```


## 快速使用:

### 链式操作创建块表单

![效果图](https://gitee.com/mgckid/form/raw/main/demo/img/simple.jpg)

```php
<?php
require __DIR__ . '/../src/Form.php';
Form::getInstance()
    ->form_method(Form::form_method_post)
    ->form_action('/')
    ->input_text('姓名', '姓名只能是中文', 'name', '法外狂徒张三')
    ->radio('性别', '', 'male', ['male' => '男', 'female' => '女'], 'male')
    ->checkbox('爱好', '', 'interest', ['ktv' => 'K歌', 'dance' => '跳舞', 'movie' => '看电影', 'run' => '跑步'], 'ktv,run')
    ->input_inline_start()
    ->input_text('省份', '', 'sheng', '湖北省')
    ->input_text('市', '', 'shi', '武汉市')
    ->input_text('区', '', 'qu', '武昌区')
    ->input_text('街道', '', 'jie', '紫阳路36号')
    ->input_inline_end()
    ->input_hidden('id', '1')
    ->input_text('user name', '', 'user', 'admin')
    ->input_password('password', '', 'password', '123456')
    ->radio('is active', '', 'is_active', [
        ['value' => '1', 'name' => 'active'],
        ['value' => '0', 'name' => 'unactive']
    ], 1)
    ->checkbox('user role', '', 'role', [
        ['value' => '1', 'name' => 'boss'],
        ['value' => '2', 'name' => 'manager'],
        ['value' => '3', 'name' => 'employee'],
    ], '1,2')
    ->select('user department', '', 'department', [
        ['value' => '1', 'name' => 'sales'],
        ['value' => '2', 'name' => 'hr'],
        ['value' => '3', 'name' => 'secured'],
    ], 1)
    ->form_class(LayuiForm::form_class_pane)
    ->input_submit('确认保存', 'class="layui-btn" lay-submit lay-filter="saveBtn"')
    //->input_date()
    //->editor()
    //->form_data()
    //->table()
    ->create();
?>
```



### 数组配置创建块表单

![效果](https://gitee.com/mgckid/form/raw/main/demo/img/simple_array.jpg)

```php
  <?php
  require __DIR__ . '/../src/Form.php';
            $init = array(
                0 => array(
                    'title' => 'Id',
                    'name' => 'id',
                    'description' => 'Id',
                    'enum' => array(),
                    'type' => 'hidden',
                    'widget_type' => '',
                ),
                1 => array(
                    'title' => '用户id',
                    'name' => 'user_id',
                    'description' => '用户id',
                    'enum' => array(),
                    'type' => 'hidden',
                    'widget_type' => '',
                ),
                2 => array(
                    'title' => '用户名',
                    'name' => 'username',
                    'description' => '用户名',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                3 => array(
                    'title' => '真实姓名',
                    'name' => 'true_name',
                    'description' => '真实姓名',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                4 => array(
                    'title' => '密码',
                    'name' => 'password',
                    'description' => '密码',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                5 => array(
                    'title' => '邮箱',
                    'name' => 'email',
                    'description' => '邮箱',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                6 => array(
                    'title' => '是否删除',
                    'name' => 'deleted',
                    'description' => '是否删除',
                    'enum' => array(
                        0 => '未删除',
                        1 => '已删除',
                    ),
                    'type' => 'none',
                    'widget_type' => '',
                ),
                7 => array(
                    'title' => '创建时间',
                    'name' => 'created',
                    'description' => '创建时间',
                    'enum' => array(),
                    'type' => 'none',
                    'widget_type' => 'date',
                ),
                8 => array(
                    'title' => '修改时间',
                    'name' => 'modified',
                    'description' => '修改时间',
                    'enum' => array(),
                    'type' => 'none',
                    'widget_type' => 'date',
                ),
            );
            $data = array(
                'id' => 2,
                'user_id' => 'feac0fa3-3245-11e6-9b90-e03f49a02407',
                'username' => 'admin',
                'true_name' => '系统管理员',
                'email' => '',
                'deleted' => 0,
                'created' => '2016-06-14 23:39:52',
                'modified' => '2020-03-12 20:07:48',
            );
            \Form::getInstance()
                ->form_schema($init)
                ->form_data($data)
                ->input_submit('确认保存', 'class="layui-btn" lay-submit lay-filter="saveBtn"')
                ->create();
```



### 行内表单

![效果](https://gitee.com/mgckid/form/raw/main/demo/img/simple_line.jpg)

```php
  <?php
  require __DIR__ . '/../src/Form.php';
      $init = array(
                0 => array(
                    'title' => 'Id',
                    'name' => 'id',
                    'description' => 'Id',
                    'enum' => array(),
                    'type' => 'hidden',
                    'widget_type' => '',
                ),
                1 => array(
                    'title' => '用户id',
                    'name' => 'user_id',
                    'description' => '用户id',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                2 => array(
                    'title' => '用户名',
                    'name' => 'username',
                    'description' => '用户名',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                3 => array(
                    'title' => '真实姓名',
                    'name' => 'true_name',
                    'description' => '真实姓名',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                4 => array(
                    'title' => '密码',
                    'name' => 'password',
                    'description' => '密码',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                5 => array(
                    'title' => '邮箱',
                    'name' => 'email',
                    'description' => '邮箱',
                    'enum' => array(),
                    'type' => 'text',
                    'widget_type' => '',
                ),
                6 => array(
                    'title' => '是否删除',
                    'name' => 'deleted',
                    'description' => '是否删除',
                    'enum' => array(
                        0 => '未删除',
                        1 => '已删除',
                    ),
                    'type' => 'none',
                    'widget_type' => '',
                ),
                7 => array(
                    'title' => '创建时间',
                    'name' => 'created',
                    'description' => '创建时间',
                    'enum' => array(),
                    'type' => 'none',
                    'widget_type' => 'date',
                ),
                8 => array(
                    'title' => '修改时间',
                    'name' => 'modified',
                    'description' => '修改时间',
                    'enum' => array(),
                    'type' => 'none',
                    'widget_type' => 'date',
                ),
            );
            \Form::getInstance()
                ->input_inline_start()
                ->form_schema($init)
                ->input_submit('<i class="layui-icon"></i> 搜索', ' class="layui-btn layui-btn-primary" lay-submit lay-filter="data-search-btn"', 'class="layui-btn layui-btn-primary"')
                ->input_inline_end()
                ->form_class(\LayuiForm::form_class_pane)
                ->form_method(Form::form_method_get)
                ->create();
```



### table表单

![效果](https://gitee.com/mgckid/form/raw/main/demo/img/simple_table.jpg)

```php
    <?php
  require __DIR__ . '/../src/Form.php';
           $form_init = array (
                'id' =>array (
                        'title' => '主键',
                        'name' => 'id',
                        'description' => '主键',
                        'enum' =>array(),
                        'type' => 'hidden',
                        'widget_type' => '',
                    ),
                'name' =>array (
                        'title' => '配置名称',
                        'name' => 'name',
                        'description' => '配置名称',
                        'enum' =>array(),
                        'type' => 'text',
                        'widget_type' => '',
                    ),
                'description' =>array (
                        'title' => '配置描述',
                        'name' => 'description',
                        'description' => '配置描述',
                        'enum' =>array(),
                        'type' => 'text',
                        'widget_type' => '',
                    ),
                'input_type' =>array (
                        'title' => '表单类型',
                        'name' => 'input_type',
                        'description' => '表单类型',
                        'enum' =>array (
                                'hidden' => '隐藏域',
                                'select' => '下拉',
                                'radio' => '单选按钮',
                                'text' => '文本',
                                'textarea' => '多行文本',
                                'file' => '上传',
                                'none' => '非表单',
                                'editor' => '富文本',
                                'checkbox' => '复选框',
                                'date' => '日期',
                            ),
                        'type' => 'select',
                        'widget_type' => '',
                    ),
                'created' =>array (
                        'title' => '创建时间',
                        'name' => 'created',
                        'description' => '创建时间',
                        'enum' =>array(),
                        'type' => 'none',
                        'widget_type' => 'date',
                    ),
                'modified' =>array (
                        'title' => '修改时间',
                        'name' => 'modified',
                        'description' => '修改时间',
                        'enum' =>array(),
                        'type' => 'none',
                        'widget_type' => 'date',
                    ),
                'deleted' =>array (
                        'title' => '删除标记',
                        'name' => 'deleted',
                        'description' => '删除标记',
                        'enum' =>array (
                                0 => '未删除',
                                1 => '已删除',
                            ),
                        'type' => 'none',
                        'widget_type' => '',
                    ),
            );
            $form_data=array (
                0 =>
                    array (
                        'id' => 73,
                        'name' => 'solution_introduction',
                        'value' => '111',
                        'description' => '解决方案介绍',
                        'input_type' => 'textarea',
                        'created' => '2018-12-07 11:44:40',
                        'modified' => '2022-03-08 00:32:08',
                        'deleted' => 0,
                    ),
                1 =>
                    array (
                        'id' => 72,
                        'name' => 'tese_product_introduction',
                        'value' => '222',
                        'description' => '特色产品介绍',
                        'input_type' => 'textarea',
                        'created' => '2018-12-07 11:43:52',
                        'modified' => '2022-03-08 00:32:09',
                        'deleted' => 0,
                    ),
                2 =>
                    array (
                        'id' => 71,
                        'name' => 'new_product_introduction',
                        'value' => '333',
                        'description' => '新产品介绍',
                        'input_type' => 'textarea',
                        'created' => '2018-12-07 11:41:37',
                        'modified' => '2022-03-08 00:32:09',
                        'deleted' => 0,
                    ),
                3 =>
                    array (
                        'id' => 70,
                        'name' => 'site_pinterest',
                        'value' => '',
                        'description' => 'Pinterest堪称图片版的Twitter链接',
                        'input_type' => 'text',
                        'created' => '2018-11-19 11:48:12',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    ),
                4 =>
                    array (
                        'id' => 69,
                        'name' => 'site_twitter',
                        'value' => '',
                        'description' => 'Twitter（非官方汉语通称推特）链接',
                        'input_type' => 'text',
                        'created' => '2018-11-19 11:47:04',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    ),
                5 =>
                    array (
                        'id' => 68,
                        'name' => 'site_facebook',
                        'value' => '',
                        'description' => 'Facebook（脸书）链接',
                        'input_type' => 'text',
                        'created' => '2018-11-19 11:46:07',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    ),
                6 =>
                    array (
                        'id' => 67,
                        'name' => 'site_google_plus',
                        'value' => '',
                        'description' => 'Google+SNS社交网站链接',
                        'input_type' => 'text',
                        'created' => '2018-11-19 11:45:26',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    ),
                7 =>
                    array (
                        'id' => 66,
                        'name' => 'site_linkedin',
                        'value' => '',
                        'description' => 'LinkedIn领英链接',
                        'input_type' => 'text',
                        'created' => '2018-11-19 11:43:53',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    ),
                8 =>
                    array (
                        'id' => 65,
                        'name' => 'site_livechat_code',
                        'value' => '',
                        'description' => 'livezilla在线客服代码',
                        'input_type' => 'textarea',
                        'created' => '2018-11-15 16:45:15',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    ),
                9 =>
                    array (
                        'id' => 64,
                        'name' => 'site_skype',
                        'value' => '',
                        'description' => '联系skype',
                        'input_type' => 'text',
                        'created' => '2018-11-15 16:44:40',
                        'modified' => '2019-04-27 14:08:07',
                        'deleted' => 0,
                    )
            );
            \Form::getInstance()
                ->table('扩展配置', '', 'site_config', $form_init, $form_data)
                ->create();
```



