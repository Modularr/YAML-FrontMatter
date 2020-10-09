<?php

namespace Modularr\YAMLFrontmatter\Tests;

use Modularr\YAMLFrontmatter\FrontMatter;
use PHPUnit\Framework\TestCase;

class FrontMatterTest extends TestCase
{
    protected $sampleContent = 'This is the content of the file.';
    protected $sampleTitle   = 'test';
    protected $sampleUri   = '/test';
    protected $sampleFile = <<<EOT
---
title: test
uri: /test
---
This is the content of the file.
EOT;

    /**
     * @test
     */
    public function baseTest()
    {
        $page = new FrontMatter($this->sampleFile);

        # Test predefined variables to see if most custom yaml / content variables work
        $this->assertEquals($this->sampleContent, $page->fetch('content'));
        $this->assertEquals($this->sampleTitle, $page->fetch('title'));
        $this->assertEquals($this->sampleUri, $page->fetch('uri'));
    }
}
