<?php

namespace Laravie\Parser;

/**
 * @see https://github.com/illuminate/support/blob/master/Arr.php Copied from illuminate/support
 */
class Arr{
	public static function set(&$array, $key, $value){
		if(is_null($key)){
			return $array = $value;
		}
		$keys = explode('.', $key);
		while(count($keys) > 1){
			$key = array_shift($keys);
			// If the key doesn't exist at this depth, we will just create an empty array
			// to hold the next value, allowing us to create the arrays to hold final
			// values at the correct depth. Then we'll keep digging into the array.
			if(!isset($array[$key]) || !is_array($array[$key])){
				$array[$key] = [];
			}
			$array = &$array[$key];
		}
		$array[array_shift($keys)] = $value;
		return $array;
	}
}
