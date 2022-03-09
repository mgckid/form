<?php
/**
 * 简单上手
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2022/3/8
 * Time: 23:46
 */
require __DIR__ . '/../src/Form.php';
Form::getInstance()
    ->form_method(FORM::form_method_post)
    ->form_action('/simple.php')
    ->input_text('姓名', '', 'name', '法外狂徒张三')
    ->radio('性别', '', 'male', ['male' => '男', 'female' => '女'], 'male')
    ->checkbox('爱好', '', 'interest', ['ktv' => 'K歌', 'dance' => '跳舞', 'movie' => '看电影', 'run' => '跑步'], 'ktv,run')
    ->input_inline_start()
    ->input_text('省份', '', 'sheng', '湖北省')
    ->input_text('市', '', 'shi', '武汉市')
    ->input_text('区', '', '区', '武昌区')
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
    ->textarea('自我介绍','','description','法外狂徒张三来自湖北省武汉市武昌区紫阳路36号')
    ->switch('是否启用','','status',1)
    //->input_date()
    //->editor()
    //->form_data()
    //->table()
    ->form_class(LayuiForm::form_class_pane);
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
    <?= Form::getInstance()->input_submit('确认保存', 'class="layui-btn" lay-submit lay-filter="saveBtn"')->create() ?>
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
                                parent.window.location.reload();
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