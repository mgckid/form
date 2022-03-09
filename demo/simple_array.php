<?php
/**
 * 复杂表单创建
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2022/3/8
 * Time: 23:46
 */
require __DIR__ . '/../src/Form.php';
$init = array (
    0 =>
        array (
            'title' => '自增主键',
            'name' => 'id',
            'description' => '自增主键',
            'enum' =>
                array(),
            'type' => 'hidden',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'id',
        ),
    1 =>
        array (
            'title' => '文档id',
            'name' => 'post_id',
            'description' => '文档id',
            'enum' =>
                array(),
            'type' => 'hidden',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'post_id',
        ),
    2 =>
        array (
            'title' => '所属栏目',
            'name' => 'category_id',
            'description' => '所属栏目',
            'enum' =>
                array (
                    1 => '开发',
                    2 => '互联网圈子',
                    3 => '关于',
                    4 => '其他',
                    6 => '简历',
                ),
            'type' => 'select',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'category_id',
        ),
    3 =>
        array (
            'title' => '所属模型',
            'name' => 'model_id',
            'description' => '所属模型',
            'enum' =>
                array (
                    'article' => '文章',
                    'product' => '产品',
                ),
            'type' => 'select',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'model_id',
        ),
    4 =>
        array (
            'title' => '文档标题',
            'name' => 'title',
            'description' => '文档标题',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'title',
        ),
    5 =>
        array (
            'title' => '文档关键词',
            'name' => 'keywords',
            'description' => '文档关键词',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'keywords',
        ),
    6 =>
        array (
            'title' => '文档描述',
            'name' => 'description',
            'description' => '文档描述',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'description',
        ),
    7 =>
        array (
            'title' => '文档主图',
            'name' => 'main_image',
            'description' => '文档主图',
            'enum' =>
                array(),
            'type' => 'file',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'main_image',
        ),
    8 =>
        array (
            'title' => '文档标签(,隔开)',
            'name' => 'post_tag',
            'description' => '文档标签(,隔开)',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'post_tag',
        ),
    9 =>
        array (
            'title' => '点击数',
            'name' => 'click',
            'description' => '点击数',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'click',
        ),
    10 =>
        array (
            'title' => '作者',
            'name' => 'author',
            'description' => '作者',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'author',
        ),
    11 =>
        array (
            'title' => '是否发布',
            'name' => 'is_publish',
            'description' => '是否发布',
            'enum' =>
                array (
                    0 => '未发布',
                    1 => '已发布',
                ),
            'type' => 'radio',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'is_publish',
        ),
    12 =>
        array (
            'title' => '是否推荐',
            'name' => 'is_recommed',
            'description' => '是否推荐',
            'enum' =>
                array (
                    1 => '一级推荐',
                    2 => '二级推荐',
                    3 => '三级推荐',
                    4 => '四级推荐',
                ),
            'type' => 'checkbox',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'is_recommed',
        ),
    13 =>
        array (
            'title' => '是否删除',
            'name' => 'deleted',
            'description' => '是否删除',
            'enum' =>
                array (
                    0 => '未删除',
                    1 => '已删除',
                ),
            'type' => 'none',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'deleted',
        ),
    14 =>
        array (
            'title' => '文档排序',
            'name' => 'sort',
            'description' => '文档排序',
            'enum' =>
                array(),
            'type' => 'text',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'sort',
        ),
    15 =>
        array (
            'title' => '创建时间',
            'name' => 'created',
            'description' => '创建时间',
            'enum' =>
                array(),
            'type' => 'none',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'created',
        ),
    16 =>
        array (
            'title' => '修改时间',
            'name' => 'modified',
            'description' => '修改时间',
            'enum' =>
                array(),
            'type' => 'none',
            'belong_to_table' => 'cms_post',
            'dict_value' => 'modified',
        ),
    17 =>
        array (
            'title' => '文章内容',
            'name' => 'content',
            'description' => '文章内容',
            'enum' =>
                array(),
            'type' => 'editor',
            'belong_to_table' => 'cms_post_extend_text',
            'dict_value' => 'content',
        ),
);
$form_data = array (
    'model_id' => 'article',
    'category_id' => '',
    'post_id' => '2216267480655467',
    'is_publish' => 1,
    'is_recommed' => 0,
    'sort' => 10000,
    'author' => '管理员',
);
\Form::getInstance()->form_schema($init)->form_data($form_data);
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
<?php if(Form::getInstance()->type_in('file')):?>
    <script>
        layui.use(['layer', 'upload', 'element'], function () {
            var layer = layui.layer,
                $ = layui.$;

            function generateRdStr() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for (var i = 0; i < 10; i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                return text;
            }

            var upload = layui.upload,
                element = layui.element;
            $("input[input_type='file']").parent().append("<ul class='upload_box' style='overflow:hidden;_zoom:1;padding-left:0px;'></ul>");
            $('ul.upload_box').each(function (i) {
                $('ul.upload_box').eq(i).append($('ul.upload_box').eq(i).siblings("input[input_type='file']"));
            });
            $("input[input_type='file']").wrap("<li  style='width: 150px;height: 150px;background: #EFEFEF;float:  left;overflow:hidden;border: 4px dashed #ddd;margin-right: 10px; position: relative;margin-bottom: 10px;'></li>")
            $('ul.upload_box li').each(function (i) {
                var upload_item = $('ul.upload_box li').eq(i),
                    id_name = generateRdStr();
                upload_item.attr('id', id_name);
                upload_item.append("<div class='add' style='font-size: 80px; color: #CCCCCC;width: 100%;text-align: center;line-height: 150px;position: relative;z-index: 1'>+</div>")
                upload_item.append("<div class='preview' style='width: 100%;height: 100%;position: absolute;z-index: 2;top: 0px;'></div>")
                upload_item.append("<div class='layui-progress' lay-showPercent='yes' style='position: relative;z-index: 3;bottom: 16px;' lay-filter='" + id_name + "_process' >"
                    + "<div class='layui-progress-bar' lay-percent='0%'></div>"
                    + "</div>");
                upload_item.append("<div class='remove'  style='z-index:3;position: absolute;width: 14px;height: 14px;line-height:14px;text-align:center;background: #E9523F;color:#fff;overflow:hidden;border-radius:5px;right: 0px;top: 17px;'>X</div>");
                $('#' + id_name + ' .remove').hide();
                $('#' + id_name + ' .preview').hide();
                $('#' + id_name + ' .layui-progress').hide();
                $('#' + id_name + ' .remove').on('click', function () {
                    $('#' + id_name + ' .remove').hide();
                    $('#' + id_name + ' .preview').hide();
                    $('#' + id_name + ' .layui-progress').hide();
                    $('#' + id_name + ' .layui-progress').find('.layui-progress-bar').removeClass('layui-bg-red');
                })
                var init_val = $('#' + id_name).find("input[type='text']").hide().val() || '';
                if (init_val.length > 0) {
                    $('#' + id_name + ' .remove').show();
                    $('#' + id_name + ' .preview').css({
                        'background': 'url(' + init_val + ')',
                        'background-repeat': 'no-repeat',
                        'background-size': '100% 100%',
                    }).show();
                }
                var uploadIns = upload.render({
                    elem: '#' + id_name + ' .add'
                    , url: '/admin/upload/imageUpload'
                    , field: 'file'
                    , method: 'post'
                    , before: function (obj) {

                    }
                    , choose: function (obj) {
                        $('#' + id_name + ' .remove').show();
                        $('#' + id_name + ' .layui-progress').show();
                        obj.preview(function (index, file, result) {
                            $('#' + id_name + ' .preview').css({
                                'background': 'url(' + result + ')',
                                'background-repeat': 'no-repeat',
                                'background-size': '100% 100%',
                            }).show();
                        });
                    }
                    , progress: function (n, elem) {
                        var percent = n + '%' //获取进度百分比
                        element.progress(id_name + '_process', percent); //可配合 layui 进度条元素使用
                    }
                    , done: function (res) {
                        if (res.status != 1) {
                            layer.alert(res.msg || '接口出错')
                        } else {
                            $('#' + id_name).find("input[type='text']").attr({value: res.data.name || ''});
                            layer.msg(res.msg || '上传成功', {
                                icon: 1,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            });
                        }
                    }
                    , error: function () {
                        layer.alert('接口出错')
                        $('#' + id_name + ' .layui-progress').find('.layui-progress-bar').addClass('layui-bg-red');
                    }
                });
            })
        });
    </script>
<?php endif;?>
<?php if(Form::getInstance()->type_in('date')):?>
    <script>
        layui.use(['laydate'], function () {
            var laydate = layui.laydate;
            //日期选择初始化
            laydate.render({
                elem: '[input_type=date]',
                type: 'date',
            })
        })
    </script>
<?php endif;?>
<?php if(Form::getInstance()->type_in('editor')):?>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor1_4_3_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor1_4_3_3/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor1_4_3_3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor1_4_3_3/ueditor.parse.js"></script>
<script>
    layui.use(['layer'], function () {
        var $ = layui.jquery;

        function ueditor(contentBox) {
            uParse(contentBox, {
                rootPath: '/static/admin/ueditor1_4_3_3/'
            });
            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var config = {
                serverUrl: '<?=url('admin/Ueditor/index')?>',
                autoFloatEnabled: false,
                initialFrameHeight: 1000,
            };
            var ue = UE.getEditor(contentBox, config);
        }

        $("textarea[input_type='editor']").each(function (i, n) {
            var _id = $(this).attr('id')||'';
            if ((_id != '' || _id != undefined) & _id.length > 0) {
                ueditor(_id);
            }
        })
    })
</script>
<?php endif;?>
</body>
</html>