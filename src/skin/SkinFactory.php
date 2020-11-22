<?php

/**
 * Created by PhpStorm.
 * User: mgckid
 * Date: 2020/11/21
 * Time: 16:02
 */
namespace mgckid\form\skin;
class SkinFactory
{
	public static function createSkin($skin_name)
	{
		if ($skin_name == 'layui') {
			return new SkinLayui();
		} else {
			return new SkinSimple();
		}
	}
}