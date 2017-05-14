<?php
use Symfony\Component\Yaml\Yaml;
/**
 * PHP YAML FrontMatter Class
 * An easy to use class for handling YAML frontmatter in PHP.
 *
 * @author Blaxus
 * @package Modularr/YAML-FrontMatter
 */
class FrontMatter
{
	/**
	* All the parameters.
	* @param array $data metadata & content
	*/
	public $data;
	
	/**
	* Constructor method, checks a file and then puts the contents into custom strings for usage
	* @param string $file The input file
	*/
	public function __construct($file)
	{
		$document = (file_exists($file)) ? file_get_contents($file) : $file;
		
		# Split into chunks
		$chars = explode('---', $document);
		
		# Reverse Array (Easier to Ignore optional dashes)
		$reversed = array_reverse($chars);
		
		# Remove First newline from string
		$array1['content'] = preg_replace('/^.+\n/', '', $reversed[0]);
		
		try {
			$array2 = Yaml::parse($reversed[1]);
		} catch (ParseException $e) {
			printf("Unable to parse the YAML string: %s", $e->getMessage());
		}
		$this->data = array_merge($array1, $array2);
		#$this->data = json_decode(json_encode($merge), FALSE);
	}
	
	/**
	* fetch method returns the value of a given key
	* @return string $value The value for a given key
	*/
	public function fetch($key)
	{
		return $this->data[$key];
	}
	
	/**
	* fetchKeys method returns an array of all meta data without the content
	* @return [array] collection of all meta keys provided to FrontMatter
	*/
	public function fetchKeys()
	{
		# Load the keys so we don't edit the native object data
		$keys = $this->data;
		
		# Remove $data[content] from the keys so we only have the meta data
		unset($keys['content']);
		
		return $keys;
	}
	
	/**
	* keyExists method Checks to see if a key exists
	* @return bool
	*/
	public function keyExists($key)
	{
		#return (isset($this->data[$key])) ? true : false; # Isset Version
		return array_key_exists($key, $this->data); # array_key_exists version
	}
}