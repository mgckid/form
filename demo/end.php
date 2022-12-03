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

function test_data_list() {
    $param = array_filter($_REQUEST, function ($i) {
        if (is_scalar($i)) {
            if ($i) {
                return true;
            } else {
                return false;
            }
        } else {
            if (empty(array_filter($i))) {
                return false;
            } else {
                return true;
            }
        }
        return true;
    });
    $wh_str = " 1=1 ";
    $map = ['id', 'symbol', 'name', 'ps', 'percent', 'pb_ttm', 'current', 'current_year_percent', 'market_capital', 'pe_ttm', 'issue_date_ts'];
    foreach ($map as $item) {
        if (isset($param[$item])) {
            if (is_scalar($param[$item])) {
                $wh_str .= " and {$item} = '{$param[$item]}'";
            } else {
                $wh_str .= " and ({$item} > '{$param[$item][0]}' and {$item} < '{$param[$item][1]}')";
            }
        }
    }
    $page = $_REQUEST['page'] ?? 1;
    $limit = 15;
    $offset = "limit " . ($page - 1) * $limit . ",{$limit}";
    $realfile = __DIR__ . '/db/test_data.db';
    $db = new PDO("sqlite:{$realfile}");
    $db->exec('set names utf8');
    $sql = "select * from gupiao where {$wh_str} {$offset}";
    $sql_count = "select count(1) from gupiao where {$wh_str}";
    $res = $db->query($sql);
    $record = $res->fetchAll(PDO::FETCH_ASSOC);
    $res = $db->query($sql_count);
    $total = current($res->fetch(PDO::FETCH_ASSOC));
    return compact('record', 'total', 'page', 'limit');
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
    ajaxSuccess('执行成功', array('init' => $init));
}
if (isset($param['simple_line'])) {//table表单提交数据
    $res = test_data_list();
    ajaxSuccess('执行成功', $res);
} else {
    ajaxSuccess('执行成功', $param);
}