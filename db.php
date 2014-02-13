<?php
// Mysql信息
$config = array(
	'host' => 'mysql.marsiii.3322.org:3306',
	'username' => 'lan',
	'password' => '123456',
	'database' => 'oem'
);

// 连接
function connect($config){
	$conn = mysql_connect($config['host'],$config['username'],$config['password']);

	if ( !$conn ) die('Could not connect.' . mysql_error());

	mysql_select_db($config['database']);

	return $conn;
}

// 获取数据
function get($tableName, $key, $value, $offset = 0, $size = 10){
	// PHP替换变量，用大括号括起来
	$query = "SELECT * FROM {$tableName} WHERE {$key} = '{$value}' LIMIT {$offset},{$size}";

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	$data = array();
	$len = mysql_num_rows ( $result );
	for ($i=0; $i < $len; $i++) {
		$data[$i] = mysql_fetch_assoc($result);
	}

	return $data;
}
// 获取长度
function get_total($tableName, $key, $value){
	$query = "SELECT * FROM {$tableName} WHERE {$key} = '{$value}'";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return mysql_num_rows ( $result );
}


// 新增数据 -在线申请
function add($tableName, $data) {
	$values = array_map('mysql_real_escape_string', array_values($data));
	$keys = array_keys($data);
	return mysql_query('INSERT INTO `'.$tableName.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
}

// 更新数据
function update($tableName, $data, $id) {
	$values = array_map('mysql_real_escape_string', array_values($data));
	$keys = array_keys($data);
	$content = '';
	for ($i=0; $i < count($keys); $i++) {
		$content .= "`$keys[$i]`" . "='" . "$values[$i]"."',";
	}
	// 去掉最后一个逗号
	$content = substr($content,0,-1);
	$query = "UPDATE  `$tableName` SET $content WHERE  `id` = $id";
	return mysql_query($query);
}

// 获取符合username和password的数据
function login($tableName, $username, $password){
	// PHP替换变量，用大括号括起来
	$query = "SELECT * FROM {$tableName} WHERE username = '{$username}'and password = '{$password}' LIMIT 1";

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// 以关联数组形式返回
	$data = mysql_fetch_assoc($result);

	return $data;
}

?>