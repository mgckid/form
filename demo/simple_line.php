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
        'type' => 'text',
        'widget_type' => '',
    ),
    1 => array(
        'title' => '代码',
        'name' => 'sambol',
        'description' => '代码',
        'enum' => array(),
        'type' => 'text',
        'widget_type' => '',
    ),
    2 => array(
        'title' => '名称',
        'name' => 'name',
        'description' => '名称',
        'enum' => array(),
        'type' => 'text',
        'widget_type' => '',
    ),
    3 => array(
        'title' => '市销率',
        'name' => 'ps_ttm',
        'description' => '市销率',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    4 => array(
        'title' => '涨跌幅',
        'name' => 'percent',
        'description' => '涨跌幅',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    array(
        'title' => '市净率',
        'name' => 'pb_ttm',
        'description' => '市净率',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    array(
        'title' => '股价',
        'name' => 'current',
        'description' => '股价',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    array(
        'title' => '今年涨跌幅',
        'name' => 'current_year_percent',
        'description' => '今年涨跌幅',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    array(
        'title' => '市值',
        'name' => 'market_capital',
        'description' => '市净率',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    array(
        'title' => '市盈率',
        'name' => 'pe_ttm',
        'description' => '市盈率',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
    array(
        'title' => '上市日期',
        'name' => 'issue_date_ts',
        'description' => '上市日期',
        'enum' => array(),
        'type' => 'range',
        'widget_type' => '',
    ),
);
\Form::getInstance()
    ->input_hidden('simple_line',1)
    ->input_inline_start()
    ->form_schema($init)
    ->input_submit('<i class="layui-icon"></i> 搜索',
        'class="layui-btn layui-btn-primary" lay-submit lay-filter="data-search-btn"',
        'class="layui-btn layui-btn-primary"',
        'class="display_none_show_btn layui-btn layui-btn-normal"'
    )
    ->input_inline_end()
    ->form_class(\LayuiForm::form_class_pane)
    ->form_method(\Form::form_method_get)
    ->form_action('/end.php')
    ->assign_display_none_field(['id', 'symbol', 'name', 'ps', 'percent', 'pb_ttm', 'current', 'current_year_percent', 'market_capital', 'pe_ttm', 'issue_date_ts',])
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
                <?= Form::getInstance()->form_method(Form::form_method_get)->create() ?>
            </div>
        </fieldset>
        <table id="demo" lay-filter="test" class="layui-hide"></table>
    </div>
</div>
<script src="https://www.layuicdn.com/layui-v2.5.5/layui.js"></script>
<script>
    layui.use(['form','table'], function () {
        var form = layui.form,
            layer = layui.layer,
            $ = layui.$;
        //监听提交
        /*form.on('submit(saveBtn)', function (data) {
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
        });*/


        var table = layui.table;
        //第一个实例
        table.render({
            elem: '#demo'
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', }
                ,{field: 'symbol', title: '代码',}
                ,{field: 'name', title: '名称', width: 135,}
                ,{field: 'ps', title: '市销率',  }
                ,{field: 'percent', title: '涨跌幅',}
                ,{field: 'pb_ttm', title: '市净率',}
                ,{field: 'current', title: '股价',}
                ,{field: 'current_year_percent', title: '今年涨跌幅'}
                ,{field: 'market_capital', title: '市值', }
                ,{field: 'pe_ttm', title: '市盈率', width: 135, }
                ,{field: 'issue_date_ts', title: '上市日期', }
            ]]
            ,url: '/end.php?simple_line=1' //数据接口
            ,parseData: function (res) { //res 即为原始返回的数据
                return {
                    "code": res.status ? 0 : 1, //解析接口状态
                    "msg": res.msg, //解析提示文本
                    "count": res.data.total, //解析数据长度
                    "data": res.data.record //解析数据列表
                };
            },
            limits: [10, 15, 20, 25, 50, 100, 500, 1000, 10000],
            limit: 15,
            page: true,
            //skin: 'line',
            skin: 'row', //行边框风格
            even: true, //开启隔行背景
            size: 'sm', //小尺寸的表格
            cellMinWidth: 110,
            loading: true,
            autoSort: false,
            text: {
                none: '暂无相关数据' //默认：无数据。
            },
            toolbar: '#barDemo',
            defaultToolbar: ['filter', 'exports', 'print', {
                title: '提示',
                layEvent: 'LAYTABLE_TIPS',
                icon: 'layui-icon-tips'
            }],
        });

        //执行搜索重载
        form.on('submit(data-search-btn)', function (data) {
            table.reload('demo', {
                page: {
                    curr: 1
                }
                , where: data.field,
            }, 'data');

            return false;
        });
        //表单 高级搜索/基本搜索切换
        $('.display_none_show_btn').on('click', function () {
            if ($('.inline_display_none_tag').is(':hidden')) {//如果当前隐藏
                $('.inline_display_none_tag').show();//点击显示
                $(this).text('基本搜索 >')
            } else {//否则
                $('.inline_display_none_tag').hide();//点击隐藏
                $(this).text('高级搜索 >')
            }
        })
    });
</script>
</body>
</html>