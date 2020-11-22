<?php
/**
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2020/11/21
 * Time: 16:09
 */

namespace mgckid\form\skin;


class SkinLayui
{
	public $form_class = 'layui-form';

	public function render_inline($input_html, $init_data)
	{
		$label_text = $init_data['title']??'';
		$init_data['description'] = $init_data['description']??'';
		$description_html = $init_data['description'] ? "<div class=\"layui-form-mid layui-word-aux\">{$init_data['description']}</div>" : '';
		$block_html = <<<ST
         <div class="layui-inline">
            <label class="layui-form-label">{$label_text}</label>
            <div class="layui-input-inline">
              {$input_html}
            </div>
          </div>
ST;
		return $block_html;
	}

	public function render_input($init_data, $value, $description = '')
	{
		$init_data['type'] = $init_data['type']??'';
		$init_data['name'] = $init_data['name']??'';
		$init_data['title'] = $init_data['title']??'';
		$init_data['enum'] = $init_data['enum']??[];
		$init_data['disabled'] = $init_data['disabled']??false;
		if ($init_data['type'] == 'text') {
			$disabled_str = $init_data['disabled'] ? 'disabled' : '';
			$html = [];
			$value = (array)$value;
			foreach ($value as $ke => $val) {
				if (count($value) > 1) {
					$name_str = "{$init_data['name']}[{$ke}]";
				} else {
					$name_str = $init_data['name'];
				}
				$html [] = "<input name=\"{$name_str}\" value=\"{$val}\" type=\"text\" class=\"layui-input\" {$disabled_str}/>";
			}
			$html = join("\n", $html);
		} elseif ($init_data['type'] == 'date') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$value = (array)$value;

			$disabled_str = $init_data['disabled'] ? 'disabled' : '';
			$html = [];
			foreach ($value as $val) {
				$html [] = "<input {$name_str} class=\"layui-input\" {$disabled_str} value=\"{$val}\" type=\"text\"  input_type=\"date\"/>";
			}
			$html = join("\n", $html);
		} elseif ($init_data['type'] == 'password') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';

			$html = <<<STR
            <input {$name_str} value="{$value}" type="password" class="layui-input" />
STR;
		} elseif ($init_data['type'] == 'hidden') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$html = <<<STR
        <input {$name_str} value="{$value}" type="hidden" />
STR;
		} elseif ($init_data['type'] == 'select') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$init_data['enum'] = $init_data['enum']??[];
			$enum = [];
			foreach ($init_data['enum'] as $key => $item) {
				if (is_array($item)) {
					$item['value'] = $item['value']??'';
					$item['name'] = $item['name']??'';
				} elseif (is_scalar($item)) {
					$_name = $item;
					$item = [];
					$item['value'] = $key;
					$item['name'] = $_name;
				} else {
					throw new Exception('枚举值错误');
				}
				$checked = $item['value'] == $value ? 'selected' : '';
				$enum[] = '<option value="' . $item['value'] . '" ' . $checked . '>' . $item['name'] . '</option>';
			}
			$enum = join("\n", $enum);
			$html = <<<STR
            <select {$name_str}>
                <option value=""></option>
                {$enum}
            </select>
STR;
		} elseif ($init_data['type'] == 'radio') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$init_data['enum'] = $init_data['enum']??[];
			$value = (string)$value;
			$enum = [];
			foreach ($init_data['enum'] as $key => $item) {
				if (is_array($item)) {
					$item['value'] = $item['value']??'';
					$item['name'] = $item['name']??'';
				} elseif (is_scalar($item)) {
					$_name = $item;
					$item = [];
					$item['value'] = $key;
					$item['name'] = $_name;
				} else {
					throw new Exception('枚举值错误');
				}
				$checked = $item['value'] == $value ? 'checked' : '';
				$enum[] = "<input type=\"radio\" {$name_str} value=\"{$item['value']}\" title=\"{$item['name']}\" {$checked}/>";
			}
			$enum = join("\n", $enum);
			$html = <<<STR
             {$enum}
STR;
		} elseif ($init_data['type'] == 'checkbox') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$init_data['enum'] = $init_data['enum']??[];
			$value = (array)$value;
			$enum = [];
			foreach ($init_data['enum'] as $key => $item) {
				if (is_array($item)) {
					$item['value'] = $item['value']??'';
					$item['name'] = $item['name']??'';
				} elseif (is_scalar($item)) {
					$_name = $item;
					$item = [];
					$item['value'] = $key;
					$item['name'] = $_name;
				} else {
					throw new Exception('枚举值错误');
				}
				$checked = in_array($item['value'], $value) ? 'checked' : '';
				$value_str = $item['value'] ? "value=\"{$item['value']}\"" : '';
				$enum[] = "<input type=\"checkbox\" {$name_str} {$value_str}  title=\"{$item['name']}\"   {$checked}/> lay-skin=\"primary\"";
			}
			$enum = join("\n", $enum);
			$html = <<<STR
        {$enum}
STR;
		} elseif ($init_data['type'] == 'switch') {
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$checked = $value ? 'checked' : '';
			$html = <<<STR
            <input type="checkbox" {$name_str} {$checked} lay-skin="switch"/>
STR;
		} elseif ($init_data['type'] == 'textarea') {
			$name_str = $init_data['name']??'' ? "name=\"{$init_data['name']}\"" : '';
			$id_str = $init_data['id']??'' ? "id=\"{$init_data['id']}\"" : '';
			$html = <<<STR
            <textarea {$id_str} {$name_str} placeholder="请输入内容" class="layui-textarea">{$value}</textarea>
STR;
		} elseif ($init_data['type'] == 'table') {
			$value = (array)$value;
			$init_data['init'] = $init_data['init']??[];
			foreach ($init_data['init'] as $v) {
				if (in_array($v['type'], ['hidden'])) {
					continue;
				}
				$v['title'] = $v['title']??'';
				$th[] = "<th>{$v['title']}</th>";
			}
			$th = join("\n", $th);
			$thead_tr = "<tr>{$th}</tr>";
			$tbody_tr = [];
			$i = 0;
			foreach ($value as $val) {
				$td = [];
				foreach ($init_data['init'] as $v) {
					$v['name'] = $v['name']??'';
					$_init = $v;
					$_init['name'] = "{$init_data['name']}[{$i}][{$v['name']}]";
					$input_html = $this->render_input($_init, $val[$v['name']]??'');
					if (in_array($v['type'], ['hidden'])) {
						$td[] = $input_html;
					} else {
						$td[] = "<td>{$input_html}</td>";
					}
				}
				$td = join("\n", $td);
				$tbody_tr[] = "<tr>{$td}</tr>";
				$i++;
			}
			$tbody_tr = join("\n", $tbody_tr);
			$html = "<table class='layui-table'>
                        <thead>{$thead_tr}</thead>
                        <tbody>{$tbody_tr}</tbody>
                        <tfoot></tfoot>
                    </table>";
		} elseif ($init_data['type'] == 'file') {
			$init_data['type'] = $init_data['type']??'';
			$init_data['name'] = $init_data['name']??'';

			$html = [];
			$value = (array)$value;
			foreach ($value as $ke => $val) {
				if (count($value) > 1) {
					$name_str = "{$init_data['name']}[{$ke}]";
				} else {
					$name_str = $init_data['name'];
				}
				$value_str = $val ? "value='{$val}'" : '';
				$html [] = "<input name='{$name_str}' {$value_str}  type='text' class='file' input_type='file' class='file'  />";
			}
			$html = join("\n", $html);
		} elseif ($init_data['type'] == 'editor') {
			$name_str = $init_data['name']??'' ? "name=\"{$init_data['name']}\"" : '';
			$id_str = $init_data['id']??'' ? "id=\"{$init_data['id']}\"" : '';
			$html = "<textarea {$id_str} {$name_str} placeholder=\"请输入内容\" input_type=\"editor\">{$value}</textarea>";
		} else {
			$init_data['type'] = $init_data['type']??'';
			$init_data['name'] = is_scalar($init_data['name']) ? $init_data['name'] : json_encode($init_data['name']);
			$name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
			$value = is_scalar($value) ? $value : json_encode($value, JSON_UNESCAPED_UNICODE);

			$html = <<<STR
            <input {$name_str} value="{$value}" type="text" class="layui-input {$init_data['type']}" />
STR;
		}
		return $html;
	}

	public function render_item($input_html, $init_data)
	{
		$label_text = $init_data['title']??'';
		$init_data['description'] = $init_data['description']??'';
		$description_html = $init_data['description'] ? "<div class=\"layui-form-mid layui-word-aux\">{$init_data['description']}</div>" : '';
		$block_html = <<<ST
         <div class="layui-form-item">
            <label class="layui-form-label">{$label_text}</label>
            <div class="layui-input-block">
              {$input_html}
            </div>
          </div>
ST;
		return $block_html;
	}
}