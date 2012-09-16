<?php
/**
 * PHP YAML FrontMatter Class
 * An easy to use class for handling YAML frontmatter in PHP.
 * 
 * @author David D'hont (blaxus@gmail.com)
 * @link http://www.blaxus.net
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 1.0.00
 */
class FrontMatter
{
    private $data;
    
    /**
     * Constructor method, checks a file and then puts the contents into custom strings for usage
     * @param string $file The input file
     */
    public function __construct($file)
    {
        $file = $this->Read($file);
        $fm = $this->FrontMatter($file);
        
        foreach($fm as $key => $value)
        {
            $this->data[$key] = $value;
        }
    }
    
    /**
     * test
     */
    public function fetch($key)
    {
        return $this->data[$key];
    }
    
    /**
     * FrontMatter method, rturns all the variables from a YAML Frontmatter input
     * @param string $input The input string
     * @return array $final returns all variables in an array
     */
    function FrontMatter($input)
    {
        # Explode Seperators
        $output = explode("---\n",$input);
        
        # Make new array
        foreach($output as $key => $value)
        {
            # Ignore empty nodes
            if(!empty($value))
            {
                # Trap last Character in string
                $lastCharacter = substr($value, -1);
                
                # Return string without last character if it is a newline, Otherwise use normal value
                $tmp[$key] = ($lastCharacter == "\n") ? substr($value, 0, -1) : $value;
            }
        }
        
        # Explode newlines only for the variables
        $vars = explode("\n",$tmp[1]);
        
        # For each variable
        foreach($vars as $variable)
        {
            # Explode so we can see both key and value
            $var = explode(": ",$variable);
            
            # Store Key and Value
            $key = $var[0];
            $val = $var[1];
            
            # Store Content in Final array
            $final[$key] = $val;
        }
        
        # Store Content in Final array
        $final['content'] = $tmp[2];
        
        # Return Final array
        return $final;
    }
    
    /**
     * Read Method, Read file and returns it's contents
     * @return string $data returned data
     */
    protected function Read($file)
    {
        # Open File
        $fh = fopen($file, 'r');
        
        # Read Data
        $data = fread($fh, filesize($file));
        
        # Fix Data Stream to be the exact same format as PHP's strings
        $data = str_replace(array("\r\n", "\r", "\n"), "\n", $data); 
        
        # Close File
        fclose($fh);
        
        # Return Data
        return $data;
    }
}