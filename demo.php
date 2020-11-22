<?php
/**
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2020/11/21
 * Time: 13:02
 */

require __DIR__ . '/src/Form.php';
require __DIR__ . '/src/skin/SkinFactory.php';
require __DIR__ . '/src/skin/SkinLayui.php';
require __DIR__ . '/src/skin/SkinSimple.php';

use mgckid\form\Form;


$res = '{"status":1,"msg":"执行成功","data":{"record":{"id":{"title":"id","name":"id","description":"id","type":"hidden","enum":[]},"site_id":{"title":"站点id","name":"site_id","description":"站点id","type":"hidden","enum":[]},"position_name":{"title":"广告位名称","name":"position_name","description":"广告位名称","type":"text","enum":[]},"position_key":{"title":"广告位标识","name":"position_key","description":"广告位标识","type":"text","enum":[]},"ad_width":{"title":"广告宽度","name":"ad_width","description":"广告宽度","type":"text","enum":[]},"ad_height":{"title":"广告高度","name":"ad_height","description":"广告高度","type":"text","enum":[]},"position_description":{"title":"广告描述","name":"position_description","description":"广告描述","type":"text","enum":[]},"deleted":{"title":"是否删除","name":"deleted","description":"是否删除","type":"none","enum":[{"value":"0","name":"未删除"},{"value":"1","name":"已删除"}]},"created":{"title":"创建时间","name":"created","description":"创建时间","type":"none","enum":[]},"modified":{"title":"修改时间","name":"modified","description":"修改时间","type":"none","enum":[]}}}}';
$res = json_decode($res, true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css"/>
</head>

<body>
<div class="layuimini-container">
    <div class="layuimini-main">
		<?php
		echo Form::getInstance()
			->input_hidden('id')
			->input_hidden('is_submit', 0)
			->input_hidden('site_code', 'JP')
			->input_hidden('account_id', '6')
			->input_hidden('sku', '')
			->input_hidden('spu', 'JP-JY02849')
			->input_hidden('staff_code', 13718)
			->select('变体1', '', 'inventory_vertical_name', [
				'colour' => "colour",
				'Model' => "Model",
				'Size' => "Size",
				'Style' => "Style",
				'Type' => "Type"
			])->select('变体2', '', 'inventory_horizontal_name', [
				'colour' => "colour",
				'Model' => "Model",
				'Size' => "Size",
				'Style' => "Style",
				'Type' => "Type"
			])->input_text('刊登sku', '', 'seller_sku')
			->input_text('标题', '', 'name')
			->input_text('副标题（PC端）', '', 'name_pc')
			->input_text('副标题（移动端）', '', 'name_mobile')
			->input_text('刊登价', '', 'price_reduced')
			->radio('售卖状态', '', 'is_sale', [0 => '不可售', 1 => '可售'])
			->select('发货物流', '', 'delivery_set_id', [1 => 1, 2 => 2, 3 => 3])
			->radio('运费方式', '', 'is_includeed_postage', [0 => '不包含运费', 1 => '包含运费'])
			->radio('手续费', '', 'is_charge', [0 => '不包含货到付款手续费', 1 => '包含货到付款手续费'])
			->select('个别地区下单拦截', '', 'shop_area', ['1' => 1, 2 => 2, 3 => 3])
			->textarea('PC端商品描述', '', 'description_pc')
			->textarea('移动端商品描述', '', 'description_mobile')
			->textarea('PC端促销文案商品描述', '', 'catchcopy_pc')
			->select('消费税率', '', 'tax_rate', ['0' => '税率0%', '0.08' => '税率8%', '0.1' => '税率10%'])
			->radio('是否包含消费税', '', 'is_includeed_tax', [0 => '不包含消费税', 1 => '包含消费税'])
			->select('售卖方式', '', 'sell_type', ['0' => '直接售卖', 3 => '预售'])
			->input_text('指定销售时间开始', '', 'time_sale_start')
			->input_text('指定销售时间结束', '', 'time_sale_end')
            ->create();
		?>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="autoform">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="https://www.layuicdn.com/layui/layui.js"></script>
<!--您的Layui代码start-->
<script type="text/javascript">
    layui.use(['laydate', 'layer', 'form'], function () {
        var laydate = layui.laydate, //日期
            layer = layui.layer,//弹出层组件
            form = layui.form,
            $ = layui.$;
        laydate.render({
            elem: "input[name='time_sale_start']"
            , type: 'datetime'
        });
        laydate.render({
            elem: "input[name='time_sale_end']"
            , type: 'datetime'
        });
        //提交表单
        form.on("submit(autoform)", function (data) {
            $.post(
                data.form.action,
                data.field,
                function (res) {
                    if (res.status != 1) {
                        layer.alert(res.msg || '接口出错')
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
        });
    });
</script>
</body>

</html>

