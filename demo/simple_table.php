<?php
/**
 * 简单上手
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2022/3/8
 * Time: 23:46
 */
require __DIR__ . '/../src/Form.php';
$form_init = array(
    'id' => array(
        'title' => '主键',
        'name' => 'id',
        'description' => '主键',
        'enum' => array(),
        'type' => 'hidden',
        'widget_type' => '',
    ),
    'name' => array(
        'title' => '配置名称',
        'name' => 'name',
        'description' => '配置名称',
        'enum' => array(),
        'type' => 'text',
        'widget_type' => '',
    ),
    'description' => array(
        'title' => '配置描述',
        'name' => 'description',
        'description' => '配置描述',
        'enum' => array(),
        'type' => 'text',
        'widget_type' => '',
    ),
    'input_type' => array(
        'title' => '表单类型',
        'name' => 'input_type',
        'description' => '表单类型',
        'enum' => array(
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
    'created' => array(
        'title' => '创建时间',
        'name' => 'created',
        'description' => '创建时间',
        'enum' => array(),
        'type' => 'none',
        'widget_type' => 'date',
    ),
    'modified' => array(
        'title' => '修改时间',
        'name' => 'modified',
        'description' => '修改时间',
        'enum' => array(),
        'type' => 'none',
        'widget_type' => 'date',
    ),
    'deleted' => array(
        'title' => '删除标记',
        'name' => 'deleted',
        'description' => '删除标记',
        'enum' => array(
            0 => '未删除',
            1 => '已删除',
        ),
        'type' => 'none',
        'widget_type' => '',
    ),
);
$form_data = array(
    0 =>
        array(
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
        array(
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
        array(
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
        array(
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
        array(
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
        array(
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
        array(
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
        array(
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
        array(
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
        array(
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
    ->form_method(\FORM::form_method_post)
    ->form_action('/end.php')
    ->table('扩展配置', '', 'simple_table', $form_init, $form_data)
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
<div class="layui-form layuimini-form">
    <?= \Form::getInstance()->create() ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="autoform">立即提交</button>
            <button class="layui-btn layui-btn-primary" type="reset">重置</button>
            <button type="button" class="add_tr layui-btn">增加配置行</button>
        </div>
    </div>
    </form>
</div>
<script src="https://www.layuicdn.com/layui-v2.5.5/layui.js"></script>
<script>
    layui.use(['form', 'layer'], function () {
        var form = layui.form, i
        layer = layui.layer;
        $ = layui.$;
        $(function () {
            $('.layui-table').attr({'lay-size': 'sm', 'lay-skin': 'line'})
            $('.layui-table thead tr th:last').after("<th>操作</th>")
            $('.layui-table thead tr th:first').before("<th>序号</th>")
            $('.layui-table tbody tr').each(function (i) {
                $(this).find('td:first').before('<td>' + (i + 1) + '</td>')//渲染序号
                $(this).find('td:last').after('<td> <button type="button" class="del_tr layui-btn layui-btn-danger layui-btn-sm">删除</button></td>')
            })

            //添加行
            $('.add_tr').bind('click', function () {
                var tbody_dom = $('.layui-table').find('tbody');
                var newtr = tbody_dom.find('tr:last').clone();
                var aa = tbody_dom.find('tr:last').after(newtr);
                tbody_dom.find('tr').each(function (i) {
                    tbody_dom.find('tr:eq(' + i + ') td:eq(1) input').attr({name: "site_config[" + i + "][name]"})
                    tbody_dom.find('tr:eq(' + i + ') td:eq(2) input').attr({name: "site_config[" + i + "][title]"})
                    tbody_dom.find('tr:eq(' + i + ') td:eq(3) select').attr({name: "site_config[" + i + "][type]"})
                    tbody_dom.find('tr:eq(' + i + ') td:first').html(i + 1)//渲染序号
                })
                //新增行input重置为空
                tbody_dom.find('tr:last td:eq(1) input').val('');
                tbody_dom.find('tr:last td:eq(2) input').val('');
                tbody_dom.find('tr:last td:eq(3) select').val('');
                form.render();
            })

            //删除行
            $('table.layui-table tbody').on('click', 'tr td .del_tr', function () {
                var tbody_dom = $(this).parents('tbody');
                var cnt = 0;
                tbody_dom.find('tr').each(function (i) {
                    cnt++;
                })
                if (cnt <= 1) {
                    layer.alert('至少保留一行数据');
                    return false;
                }
                $(this).parents('tr').remove();
                tbody_dom.find('tr').each(function (i) {
                    tbody_dom.find('tr:eq(' + i + ') td:first').html(i + 1)//渲染序号
                })
            })
        })

        form.on("submit(autoform)", function (data) {
            $.post(
                data.form.action,
                data.field,
                function (res) {
                    console.log(res.status);
                    if (res.status != 1) {
                        layer.alert(res.msg || '接口出错')
                    } else {
                        layer.msg(res.msg, {
                            icon: 1,
                            time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }, function () {
                            //do something
                            //parent.window.location.reload(); //打开注释可以重载页面

                        });
                    }
                }
            )
            return false;
        });
    });
</script>
</body>
</html>