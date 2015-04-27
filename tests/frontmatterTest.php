<?php
include 'frontmatter.php';
class FrontMatterTest extends PHPUnit_Framework_TestCase
{
    protected $sampleContent = 'This is the content of the file.';
    protected $sampleFile = <<<EOT
---
title: test
uri: /test
---
This is the content of the file.
EOT;
    
    public function testSetup()
    {
        $page = new FrontMatter($this->sampleFile);
        
        # Content is the only concrete variable available, it contains mostly the HTML/markdown
        $this->assertEquals($this->sampleContent, $page->fetch('content'));
    }
}
