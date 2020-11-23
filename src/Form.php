<?php

/**
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2020/11/21
 * Time: 14:47
 */
namespace mgckid\form;

use mgckid\form\skin\SkinFactory;

class Form
{
	private static $instance;
	private $init;
	private $data;

	private $group_name;
	private $group_init;
	private $group_data;

	private $id_name;
	private $class_name;
	private $action_name;
	private $method_name = 'post';

	private $skin_name = 'layui';

	private function __construct()
	{
	}

	private function __clone()
	{
		// TODO: Implement __clone() method.
	}

	public function __toString()
	{
		// TODO: Implement __toString() method.
		return $this->create();
	}

	public static function getInstance($skin_name = 'layui')
	{
		if (!is_object(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function group_start(string $group_name)
	{
		$this->group_name = $group_name;
		return $this;
	}

	public function group_end()
	{
		$this->group_name = null;
		return $this;
	}

	public function form_init(array $init_data)
	{
		foreach ($init_data as $value) {
			$value['id'] = $value['name'];
			$this->init[] = $value;
		}
		return $this;
	}

	public function form_schema(array $init_data)
	{
		return $this->form_init($init_data);
	}

	public function form_data(array $data)
	{
		foreach ($data as $key => $value) {
			$this->data[$key] = $value;
		}
		return $this;
	}

	public function form_action($action)
	{
		$this->action_name = $action;
		return $this;
	}

	public function form_method($method_name)
	{
		$this->method_name = $method_name;
		return $this;
	}

	public function form_id($id_name)
	{
		$this->id_name = $id_name;
		return $this;
	}

	public function form_class($class_name)
	{
		$this->class_name = $class_name;
		return $this;
	}

	public function create()
	{
		try {
			$skin = SkinFactory::createSkin($this->skin_name);
			if (!$this->action_name) {
				$this->form_action($_SERVER['REQUEST_URI']);
			}
			$list = [];
			$this->group_init = (array)($this->group_init??[]);
			$this->group_data = (array)($this->group_data??[]);
			foreach ($this->group_init as $k => $v) {
				foreach ($v as $value) {
					$value['type'] = $value['type']??'';
					$value['description'] = $value['description']??'';
					$value['name'] = $value['name']??'';
					if ($value['type'] == 'none') {
						continue;
					}
					$input_value = $this->group_data[$k][$value['name']]??'';
					if ($value['name']) {
						$value['name'] = "{$k}[{$value['name']}]";
					}
					$input_html = $this->render_input($value, $input_value);
					if (!in_array($value['type'], ['hidden'])) {
						$list[] = $this->render_item($input_html, $value);
					} else {
						$list[] = $input_html;
					}
				}
			}
			//渲染html
			$this->init = (array)($this->init??[]);
			foreach ($this->init as $value) {
				$value['type'] = $value['type']??'';
				$value['description'] = $value['description']??'';
				$value['name'] = $value['name']??'';
				if ($value['type'] == 'none') {
					continue;
				}
				$input_value = $this->data[$value['name']]??'';
				$input_html = $skin->render_input($value, $input_value);
				if (!in_array($value['type'], ['hidden'])) {
					$list[] = $skin->render_item($input_html, $value);
				} else {
					$list[] = $input_html;
				}
			}
			$input_html = join("\n", $list);
			$form_id = $this->id_name ? 'id="' . $this->id_name . '"' : '';
			$form_action = $this->action_name ? 'action="' . $this->action_name . '"' : '';
			$form_method = $this->method_name ? 'method="' . $this->method_name . '"' : '';
            $_str = join(' ', array_filter([$this->class_name, $skin->form_class]));
            $form_class = ($this->class_name or ($skin->form_class || '')) ? 'class="' . $_str . '"' : '';
			$html = <<<ST
			<form {$form_class} {$form_id} {$form_action} {$form_method}>
			{$input_html}
ST;
			return $html;
		} catch (\Exception $e) {
			return join("<br>", [$e->getMessage(), $e->getLine(), $e->getTraceAsString()]);
		} catch (\Error $e) {
			return join("<br>", [$e->getMessage(), $e->getLine(), $e->getTraceAsString()]);
		}
	}

	public function create_inline()
	{
		try {
            $skin = SkinFactory::createSkin($this->skin_name);
            if (!$this->action_name) {
                $this->form_action($_SERVER['REQUEST_URI']);
            }
			$this->init = $this->init??[];
			$list = [];
			foreach ($this->init as $value) {
				$value['type'] = $value['type']??'';
				$value['description'] = $value['description']??'';
				$value['name'] = $value['name']??'';
				if ($value['type'] == 'none') {
					continue;
				}
				$input_value = $this->data[$value['name']]??'';
				$input_html = $skin->render_input($value, $input_value);
				if (!in_array($value['type'], ['hidden'])) {
					$list[] = $skin->render_inline($input_html, $value);
				} else {
					$list[] = $input_html;
				}
			}
			$input_html = join("\n", $list);
			$form_id = $this->id_name ? 'id="' . $this->id_name . '"' : '';
			$form_action = $this->action_name ? 'action="' . $this->action_name . '"' : '';
			$form_method = $this->method_name ? 'method="' . $this->method_name . '"' : '';
            $_str = join(' ', array_filter([$this->class_name, $skin->form_class]));
            $form_class = ($this->class_name or ($skin->form_class || '')) ? 'class="' . $_str . '"' : '';
			$html = <<<ST
			<form {$form_class} {$form_id} {$form_action} {$form_method}>
            {$input_html}
ST;
			return $html;
		} catch (\Exception $e) {
			return join("<br>", [$e->getMessage(), $e->getLine(), $e->getTraceAsString()]);
		} catch (\Error $e) {
			return join("<br>", [$e->getMessage(), $e->getLine(), $e->getTraceAsString()]);
		}
	}

	public function type_in($form_type)
	{
		if (!$this->init) {
			return false;
		}
		$_type = array_column((array)$this->init, 'type');
		if (in_array($form_type, $_type)) {
			return true;
		} else {
			return false;
		}
	}

	public function input_hidden($name, $value = '')
	{
		$init = [
			'type' => 'hidden',
			'name' => $name,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	//文本输入框
	public function input_text($title, $description, $name, $value = '', $disabled = false)
	{
		$init = [
			'type' => 'text',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'disabled' => $disabled,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	//日期输入框
	public function input_date($title, $description, $name, $value = '', $disabled = false)
	{
		$init = [
			'type' => 'date',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'disabled' => $disabled,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	//密码输入框
	public function input_password($title, $description, $name, $value = '')
	{
		$init = [
			'type' => 'password',
			'name' => $name,
			'title' => $title,
			'description' => $description,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	//开关
	public function switchs($title, $description, $name, $value = '')
	{
		$init = [
			'type' => 'switch',
			'name' => $name,
			'title' => $title,
			'description' => $description,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	//复选框
	public function checkbox($title, $description, $name, array $enum, $value = '')
	{
		$init = [
			'type' => 'checkbox',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'enum' => $enum,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	//单选框
	public function radio($title, $description, $name, array $enum, $value = '')
	{
		$init = [
			'type' => 'radio',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'enum' => $enum,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	public function select($title, $description, $name, array $enum, $value = '')
	{
		$init = [
			'type' => 'select',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'enum' => $enum,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	public function textarea($title, $description, $name, $value = '')
	{
		$init = [
			'type' => 'textarea',
			'name' => $name,
			'title' => $title,
			'description' => $description,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	public function editor($title, $description, $name, $value = '')
	{
		$init = [
			'type' => 'editor',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'id' => $name,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	public function table($title, $description, $name, array $init, array $value = [])
	{
		$init = [
			'type' => 'table',
			'name' => $name,
			'title' => $title,
			'description' => $description,
			'init' => $init,
		];
		if ($this->group_name) {
			$this->group_init[$this->group_name][] = $init;
			if ($value !== '') $this->group_data[$this->group_name][$name] = $value;
		} else {
			$this->init[] = $init;
			if ($value !== '') $this->data[$name] = $value;
		}
		return $this;
	}

	public function skin($skin_name)
	{
		$this->skin_name = $skin_name;
		return $this;
	}
}