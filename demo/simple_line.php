<?php
/**
 * 行内表单
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2022/3/8
 * Time: 23:46
 */
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
    ->form_method(\Form::form_method_get)
    ->form_action('/end.php')
    ->create();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form demo</title>
    <link rel="stylesheet" href="https://www.layuicdn.com/layui-v2.5.5/css/layui.css" media="all">
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <fieldset class="table-search-fieldset">
            <legend>搜索信息</legend>
            <div style="margin: 10px 0px 10px 0px">
                <?= \Form::getInstance()->form_method(\Form::form_method_get)->create() ?>
            </div>
        </fieldset>
    </div>
</div>
<script src="https://www.layuicdn.com/layui-v2.5.5/layui.js"></script>
<script>
    layui.use(['form'], function () {
        var form = layui.form,
            layer = layui.layer,
            $ = layui.$;
        //监听提交
        form.on('submit(saveBtn)', function (data) {
            if (data.form.method == 'get') {

            } else if (data.form.method == 'post') {
                $.post(
                    data.form.action,
                    data.field,
                    function (res) {
                        if (res.status != 1) {
                            layer.alert(res.msg || '提交成功')
                        } else {
                            layer.msg(res.msg, {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function () {
                                //do something
                                //parent.window.location.reload(); //打开注释可以重载页面
                            });
                        }
                    }
                )
                return false;
            }
        });

    });
</script>
</body>
</html>