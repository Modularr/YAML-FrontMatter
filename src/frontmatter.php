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
		if(file_exists($file)) {
			$document = file_get_contents($file);
		}
		
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
}