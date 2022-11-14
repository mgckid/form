<?php
/**
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2022/11/13
 * Time: 20:20
 */

/**
 * ajax返回数据
 * @param $code
 * @param $message
 * @param $data
 */
function ajaxReturn($code, $message, $data) {
    $return = array(
        'status' => $code,
        'msg' => $message,
        'data' => $data,
    );
    return ajaxExit($return);
}

/**
 * ajax返回 json
 * @param $data
 */
function ajaxExit($data) {
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($data, JSON_UNESCAPED_UNICODE));
}

/**
 * ajax返回数据成功
 * @param string $message
 * @param string $data
 */
function ajaxSuccess($message = '执行成功', $data = '') {
    $message = !empty($message) ? $message : '执行成功';
    return ajaxReturn(1, $message, $data);
}

/**
 * ajax返回数据失败
 * @param string $message
 * @param string $data
 */
function ajaxFail($message = '执行失败', $data = '') {
    $message = !empty($message) ? $message : '执行失败';
    return ajaxReturn(0, $message, $data);
}

/**
 * 打印数组 调试用
 * @param type $var
 */
function print_g($var) {
    $param = func_get_args();
    echo '<pre>';
    foreach ($param as $value) {
        print_r($value);
        echo '<br>';
    }
    echo "</pre>";
    exit();
}

$param = $_REQUEST;
if (isset($param['simple_table'])) {//table表单提交数据
    $init = array();
    foreach ($param['simple_table'] as $value) {
        $init[] = array(
            'title' => $value['description'],
            'name' => $value['name'],
            'description' => $value['description'],
            'enum' => array(),
            'type' => $value['input_type'],
        );
    }
    ajaxSuccess('执行成功', array('init'=>$init));
} else {
    ajaxSuccess('执行成功', $param);
}