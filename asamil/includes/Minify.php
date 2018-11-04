<?php

abstract class Minify
{
	
	static private function toMinify($buffer)
	{
		$buffer = preg_replace('/\/\/ (.*)/', '', $buffer); # 1
		$buffer = preg_replace('/<!\-{2}[\s\S]*?\-{2}>/', '', $buffer);
		$buffer = preg_replace('/<script>\/\/(.*)<\/script>/', '', $buffer);
		$buffer = str_replace(array("\r", "\t", "\n", "\n\r", "\r\n"), '', $buffer);
		$buffer = preg_replace('/\/\*\*?[\s\S]+?\*\//', '', $buffer);
		$buffer = str_replace(array('  ', '   ', '    '), '', $buffer);
		$buffer = str_replace('inputtype', 'input type', $buffer);
		
		return $buffer;
	}
	
	static public function join(array $files, $destin)
	{
		$buffer = '';
		
		foreach($files as $file)
			$buffer .= file_get_contents($file);
		
		$buffer = self::toMinify($buffer);
		
		file_put_contents($destin, $buffer);
	}
	
	
}