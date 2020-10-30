<?php

function wtf ($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

function trimAll ($el) {
	if (is_array($el)) {
		$el = array_map('trimAll', $el);
	} else {
		$el = trim($el);
	}
	return $el;
}

function intAll ($el) {
	if (is_array($el)) {
		$el = array_map('intAll', $el);
	} else {
		$el = (int)$el;
	}
	return $el;
}

function floatAll ($el) {
	if (is_array($el)) {
		$el = array_map('floatAll', $el);
	} else {
		$el = (float)$el;
	}
	return $el;
}

function es ($el) {
	global $link;
	if (is_array($el)) {
		$el = array_map('es', $el);
	} else {
		$el = mysqli_real_escape_string($link, $el);
	}
	return $el;
}

function hc ($el) {
	if (is_array($el)) {
		$el = array_map('hc', $el);
	} else {
		$el = htmlspecialchars($el);
	}
	return $el;
}

function q ($query) {
	global $link;
	$res = mysqli_query($link, $query);
	if ($res) {
		return $res;
	} else {
		$info_error = debug_backtrace();
		$error_output = mysqli_error($link)."<br>QUERY: ".hc($query)."<br>DATE ERROR: ".date("Y-m-d H:i:s")."<br>FILE DIRECTORY: ".$info_error[0]['file']."<br>LINE: ".$info_error[0]['line'];
		$error_in_file = mysqli_error($link)."\nQUERY: ".$query."\nDATE ERROR: ".date("Y-m-d H:i:s")."\nFILE DIRECTORY: ".$info_error[0]['file']."\nLINE: ".$info_error[0]['line'];
		file_put_contents('./logs/mysql.log', $error_in_file."\n\n", FILE_APPEND);
		echo $error_output;
		exit();
	}
}

spl_autoload_register(function ($class) {
	include './libs/class_'.$class.'.php';
});

function myHash ($var) {
	$salt1 = 'ABC';
	$salt2 = 'CBA';
	$var = crypt(md5($var.$salt1), $salt2);
	return $var;
}

?>