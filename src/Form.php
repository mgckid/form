<?php
/**
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2022/2/4
 * Time: 10:41
 */

class Form {
    const layui_form = 'LayuiForm';

    const autocomplete_on = 'on';
    const autocomplete_off = 'off';

    const verify_required = 'required';//（必填项）
    const verify_phone = 'phone';//（手机号）
    const verify_email = 'email';//（邮箱）
    const verify_url = 'url';//（网址）
    const verify_number = 'number';//（数字）
    const verify_date = 'date';//（日期）
    const verify_identity = 'identity';//（身份证

    const form_method_post = 'post';
    const form_method_get = 'get';

    public $config = [
        'form_id' => '',
        'form_method' => 'post',
        'form_action' => '',
        'form_class' => []
    ];
    private $inline = false;
    private $inline_schema = [];
    public $schema = [];
    private $table_schema = [];
    public $data = [];


    private static $instance;

    private function __construct() {
        $this->config['form_action'] = $_SERVER['REQUEST_URI'];
    }

    private function __clone() {
        // TODO: Implement __clone() method.
    }

    public static function getInstance() {
        if (!is_object(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    //文本输入框
    public function input_text($title, $description, $name, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'text',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    public function input_hidden($name, $value = '') {
        $init = [
            'type' => 'hidden',
            'name' => $name,
            'value' => $value,
        ];
        $this->schema[] = $init;
        return $this;
    }

    //日期输入框
    public function input_date($title, $description, $name, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'date',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    //密码输入框
    public function input_password($title, $description, $name, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'password',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    public function empty_item($title, $description, $name) {
        $init = [
            'type' => 'empty_box',
            'name' => $name,
            'title' => $title,
            'description' => $description,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }


    public function empty_box($title, $description, $name) {
        return $this->empty_item($title, $description, $name);
    }

    //复选框
    public function checkbox($title, $description, $name, array $enum, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'checkbox',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'enum' => $enum,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    //开关
    public function switch($title, $description, $name, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'switch',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    //单选框
    public function radio($title, $description, $name, array $enum, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'radio',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'enum' => $enum,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    public function select($title, $description, $name, array $enum, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'select',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'enum' => $enum,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    public function textarea($title, $description, $name, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'textarea',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    public function editor($title, $description, $name, $value = '', $disabled = false, $autocomplete = self::autocomplete_off, $verify = [self::verify_required]) {
        $init = [
            'type' => 'editor',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'id' => $name,
            'disabled' => $disabled,
            'autocomplete' => $autocomplete,
            'verify' => $verify,
            'value' => $value,
        ];
        if ($this->inline) {
            $this->inline_schema[] = $init;
        } else {
            $this->schema[] = $init;
        }
        return $this;
    }

    public function table($title, $description, $name, array $init, array $value = []) {
        $init = [
            'type' => 'table',
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'init' => $init,
            'value' => $value,
        ];
        $this->schema[] = $init;
        return $this;
    }

    public function input_inline_start() {
        $this->inline = true;
        return $this;
    }

    public function input_inline_end() {
        $this->schema[] = $this->inline_schema;
        $this->inline_schema = [];
        $this->inline = false;
        return $this;
    }

    public function form_class($class_name) {
        $class_name = is_scalar($class_name) ? [$class_name] : $class_name;
        $this->config['form_class'] = array_merge($this->config['form_class'], $class_name);
        return $this;
    }

    public function form_id($id_name) {
        $this->config['form_id'] = $id_name;
        return $this;
    }

    public function form_action($form_action) {
        $this->config['form_action'] = $form_action;
        return $this;
    }

    public function form_method($form_method) {
        $this->config['form_method'] = $form_method;
        return $this;
    }

    public function form_init(array $init_data) {
        if ($this->inline) {
            $this->inline_schema += $init_data;
        } else {
            $this->schema += $init_data;
        }
        return $this;
    }

    public function form_schema(array $init_data) {
        return $this->form_init($init_data);
    }

    public function form_data(array $form_data) {
        $this->data = $form_data;
        return $this;
    }

    public function input_submit($title, $raw_text = '', $reset_btn_raw_text = '') {
        $init = [
            'type' => 'submit',
            'title' => $title,
            'raw_text' => $raw_text,
            'reset_btn_raw_text' => $reset_btn_raw_text,
        ];
        if ($this->inline) {
            $this->inline_schema = array_merge($this->inline_schema, [$init]);
        } else {
            $this->schema = array_merge($this->schema, [$init]);
        }
        return $this;
    }

    public function create($form_type = self::layui_form) {
        return call_user_func_array([new $form_type, __FUNCTION__], [$this]);
    }

    //判断表单类型是否存在
    public function type_in($form_type) {
        if (!$this->schema) {
            return false;
        }
        $_type = [];
        foreach ($this->schema as $value) {
            if (isset($value[0])) {
                foreach ($value as $val) {
                    $_type[] = $val['type'];
                }
            } else {
                $_type[] = $value['type'];
            }
        }
        $_type = array_column((array)$this->schema, 'type');
        if (in_array($form_type, $_type)) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Class LayuiForm
 * @property Form $form_instance
 */
class  LayuiForm {
    const form_class_pane = 'layui-form-pane';
    private $form_instance;

    public function create(Form $formObj) {
        $this->form_instance = $formObj;
        //渲染html
        $formObj->schema = array_values($formObj->schema ?? []);
        $item_html = [];
        foreach ($formObj->schema as $item) {
            $is_block = isset($item['type']) ? true : false;
            if ($is_block) {
                $item_html[] = $this->render_item_block($item);
            } else {
                $item_html[] = $this->render_item_inline($item);
            }
        }
        $item_html = join(PHP_EOL, $item_html);
        $form_id = $formObj->config['form_id'] ? 'id="' . $formObj->config['form_id'] . '"' : '';
        $form_action = $formObj->config['form_action'] ? 'action="' . $formObj->config['form_action'] . '"' : '';
        $form_method = $formObj->config['form_method'] ? 'method="' . $formObj->config['form_method'] . '"' : '';
        $form_class = $formObj->config['form_class'] ? 'class="' . join(' ', array_merge(['layui-form'], $formObj->config['form_class'])) . '"' : '';
        $html = <<<ST
			<form {$form_class} {$form_id} {$form_action} {$form_method}>
			{$item_html}
ST;
        return $html;
    }

    private function render_item_block($init_data) {
        if (isset($init_data['name']) and isset($this->form_instance->data[$init_data['name']]))
            $init_data['value'] = $this->form_instance->data[$init_data['name']];
        $input_type = $init_data['type'] ?? '';
        $input_html = $this->render_input($init_data, $init_data['value'] ?? '', $init_data['description'] ?? '');
        if (strtolower($input_type) == 'hidden') {
            $block_html = <<<ST
            {$input_html}
ST;
        } elseif (strtolower($input_type) == 'none') {
            $block_html = '';
        } elseif (strtolower($input_type) == 'submit') {
            $block_html = <<<ST
                <div class="layui-form-item">
                    <div class="layui-input-block">
                     {$input_html}
                     </div>
                </div>
ST;
        } else {
            $label_text = $init_data['title'] ?? '';
            $block_html = <<<ST
                <div class="layui-form-item">
                    <label class="layui-form-label">{$label_text}</label>
                    <div class="layui-input-block">
                        {$input_html}
                    </div>
                </div>
ST;
        }
        return $block_html;
    }

    private function render_item_inline($item_datas) {
        $inline_html = [];
        foreach ($item_datas as $init_data) {
            if (isset($init_data['name']) and isset($this->form_instance->data[$init_data['name']]))
                $init_data['value'] = $this->form_instance->data[$init_data['name']];
            $input_type = $init_data['type'] ?? '';
            $input_html = $this->render_input($init_data, $init_data['value'] ?? '', $init_data['description'] ?? '');
            if (strtolower($input_type) == 'hidden') {
                $html = <<<ST
            {$input_html}
ST;
            } elseif (strtolower($input_type) == 'submit') {
                $html = <<<ST
                <div class="layui-inline">
                     {$input_html}
                </div>
ST;
            } else {
                $label_text = $init_data['title'] ?? '';
                $html = <<<str
                    <div class="layui-inline">
                        <label class="layui-form-label">{$label_text}</label>
                        <div class="layui-input-inline">
                            {$input_html}
                        </div>
                    </div>
str;
            }
            $inline_html[] = $html;
        }
        $inline_html = join(PHP_EOL, $inline_html);
        $block_html = <<<ST
            <div class="layui-form-item">
               {$inline_html}
            </div>
ST;
        return $block_html;
    }

    private function render_input($init_data, $value, $description = '') {
        $init_data['type'] = $init_data['type'] ?? '';
        $init_data['name'] = $init_data['name'] ?? '';
        $init_data['title'] = $init_data['title'] ?? '';
        $init_data['enum'] = $init_data['enum'] ?? [];
        $init_data['disabled'] = $init_data['disabled'] ?? false;
        if ($init_data['type'] == 'submit') {
            $init_data['raw_text'] = $init_data['raw_text'] ?? '';
            $init_data['reset_btn_raw_text'] = $init_data['reset_btn_raw_text'] ?? '';
            if ($init_data['reset_btn_raw_text']) {
                $reset_html = <<<STR
    <button type="reset" {$init_data['reset_btn_raw_text']} >重置</button>
STR;
            } else {
                $reset_html = '';
            }

            $html = <<<str
            <button type="submit" {$init_data['raw_text']} >{$init_data['title']}</button>
           {$reset_html}
str;
        } elseif ($init_data['type'] == 'text') {
            $disabled_str = $init_data['disabled'] ? 'disabled' : '';
            $html = [];
            $value = (array)$value;
            foreach ($value as $ke => $val) {
                if (count($value) > 1) {
                    $name_str = "{$init_data['name']}[{$ke}]";
                } else {
                    $name_str = $init_data['name'];
                }
                $html = <<<str
<input name="{$name_str}" value="{$val}" type="text"  class="layui-input"  {$disabled_str}/>
str;
            }
        } elseif ($init_data['type'] == 'date') {
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $value = (array)$value;

            $disabled_str = $init_data['disabled'] ? 'disabled' : '';
            $html = [];
            foreach ($value as $val) {
                $html[] = <<<str
<input {$name_str}  class="layui-input"  {$disabled_str} value="{$val}" type="text"  input_type="date"/>
str;
            }
            $html = join("\n", $html);
        } elseif ($init_data['type'] == 'password') {
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $html = <<<STR
            <input {$name_str} value="{$value}" type="password"  class="layui-input"  />
STR;
        } elseif ($init_data['type'] == 'hidden') {
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $html = <<<STR
        <input {$name_str} value="{$value}" type="hidden" />
STR;
        } elseif ($init_data['type'] == 'empty_box') {
            $name_str = $init_data['name'] ? "id=\"{$init_data['name']}\"" : '';
            $html = <<<STR
        <div {$name_str}></div>
STR;
        } elseif ($init_data['type'] == 'select') {
            $disabled_str = $init_data['disabled'] ? 'disabled' : '';
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $init_data['enum'] = $init_data['enum'] ?? [];
            $enum = [];
            foreach ($init_data['enum'] as $key => $item) {
                if (is_array($item)) {
                    $item['value'] = $item['value'] ?? '';
                    $item['name'] = $item['name'] ?? '';
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
            <select {$name_str} {$disabled_str} lay-search>
                <option value=""></option>
                {$enum}
            </select>
STR;
        } elseif ($init_data['type'] == 'select_multi') {
            $disabled_str = $init_data['disabled'] ? 'disabled' : '';
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $init_data['enum'] = $init_data['enum'] ?? [];
            $enum = [];
            $value = str_replace('|', ',', $value);
            $value = is_scalar($value) ? explode(',', $value) : $value;
            foreach ($init_data['enum'] as $key => $item) {
                if (is_array($item)) {
                    $item['value'] = $item['value'] ?? '';
                    $item['name'] = $item['name'] ?? '';
                } elseif (is_scalar($item)) {
                    $_name = $item;
                    $item = [];
                    $item['value'] = $key;
                    $item['name'] = $_name;
                } else {
                    throw new Exception('枚举值错误');
                }
                $checked = in_array($item['value'], $value) ? 'selected' : '';
                $enum[] = '<option value="' . $item['value'] . '" ' . $checked . '>' . $item['name'] . '</option>';
            }
            $enum = join("\n", $enum);
            $html = <<<STR
            <select {$name_str} {$disabled_str} lay-search multiple>
                <option value=""></option>
                {$enum}
            </select>
STR;
        } elseif ($init_data['type'] == 'radio') {
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $init_data['enum'] = $init_data['enum'] ?? [];
            $value = (string)$value;
            $enum = [];
            foreach ($init_data['enum'] as $key => $item) {
                if (is_array($item)) {
                    $item['value'] = $item['value'] ?? '';
                    $item['name'] = $item['name'] ?? '';
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
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}[]\"" : '';
            $init_data['enum'] = $init_data['enum'] ?? [];
            $value = str_replace('|', ',', $value);
            $value = is_scalar($value) ? explode(',', $value) : $value;
            $enum = [];
            foreach ($init_data['enum'] as $key => $item) {
                if (is_array($item)) {
                    $item['value'] = $item['value'] ?? '';
                    $item['name'] = $item['name'] ?? '';
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
                $enum[] = "<input type=\"checkbox\" {$name_str} {$value_str}  title=\"{$item['name']}\"  lay-skin=\"primary\" {$checked}/>";
            }
            $enum = join("\n", $enum);
            $html = <<<STR
        {$enum}
STR;
        } elseif ($init_data['type'] == 'switch') {
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';
            $checked = $value ? 'checked' : '';
            $html = <<<STR
            <input type="checkbox" {$name_str} lay-skin="switch" {$checked}/>
STR;
        } elseif ($init_data['type'] == 'textarea') {
            $name_str = $init_data['name'] ?? '' ? "name=\"{$init_data['name']}\"" : '';
            $id_str = $init_data['name'] ?? '' ? "id=\"{$init_data['name']}\"" : '';
            $html = <<<STR
            <textarea {$id_str} {$name_str} placeholder="请输入内容"  class="layui-textarea" >{$value}</textarea>
STR;
        } elseif ($init_data['type'] == 'table') {
            $value = (array)$value;
            $init_data['init'] = $init_data['init'] ?? [];
            foreach ($init_data['init'] as $v) {
                if (in_array($v['type'], ['hidden', 'none'])) {
                    continue;
                }
                $v['title'] = $v['title'] ?? '';
                $th[] = "<th>{$v['title']}</th>";
            }
            $th = join("\n", $th);
            $thead_tr = "<tr>{$th}</tr>";
            $tbody_tr = [];
            $i = 0;
            foreach ($value as $val) {
                $td = [];
                foreach ($init_data['init'] as $v) {
                    if ($v['type'] == 'none')
                        continue;
                    $v['name'] = $v['name'] ?? '';
                    $_init = $v;
                    $_init['name'] = "{$init_data['name']}[{$i}][{$v['name']}]";
                    $input_html = $this->render_input($_init, $val[$v['name']] ?? '');
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
            $init_data['type'] = $init_data['type'] ?? '';
            $init_data['name'] = $init_data['name'] ?? '';
            $class_str = "class=\"file\"";

            $html = [];
            $value = (array)$value;
            foreach ($value as $ke => $val) {
                if (count($value) > 1) {
                    $name_str = "{$init_data['name']}[{$ke}]";
                } else {
                    $name_str = $init_data['name'];
                }
                $value_str = $val ? "value='{$val}'" : '';
                $html [] = "<input name='{$name_str}' {$value_str}  type='text' class='file' input_type='file'  />";
            }
            $html = join("\n", $html);
        } elseif ($init_data['type'] == 'editor') {
            $name_str = $init_data['name'] ?? '' ? "name=\"{$init_data['name']}\"" : '';
            $id_str = $init_data['name'] ?? '' ? "id=\"{$init_data['name']}\"" : '';
            $html = "<textarea {$id_str} {$name_str} placeholder=\"请输入内容\" input_type=\"editor\">{$value}</textarea>";
        } else {
            $init_data['type'] = $init_data['type'] ?? '';
            // $init_data['name'] = $init_data['name'] ?? '';
            $init_data['name'] = is_scalar($init_data['name']) ? $init_data['name'] : json_encode($init_data['name']);
            $name_str = $init_data['name'] ? "name=\"{$init_data['name']}\"" : '';


            $value = is_scalar($value) ? $value : json_encode($value, JSON_UNESCAPED_UNICODE);

            $html = <<<STR
            <input {$name_str} value="{$value}" type="text"  class="layui-input" " />
STR;
        }
        return $html;
    }
}