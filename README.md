YAML Front Matter
================
[![Latest Version](http://img.shields.io/packagist/v/modularr/yaml-front-matter.svg?style=flat)](https://packagist.org/packages/modularr/yaml-front-matter)
[![Software License](https://poser.pugx.org/modularr/yaml-front-matter/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/Modularr/YAML-FrontMatter/master.svg?style=flat)](https://travis-ci.org/Modularr/YAML-FrontMatter)
[![Total Downloads](https://img.shields.io/packagist/dt/modularr/yaml-front-matter.svg?style=flat)](https://packagist.org/packages/modularr/yaml-front-matter)

An easy to use class for handling YAML frontmatter in PHP.

### What does this class do?

YAML Front Matter is a technique used to keep metadata about the file seperated from the actual content inside the file, while still only having one file. This simple PHP class allows you to **read such files**, and return each of the **metadata** or **content** independantly.

### What files are compatible with this class?

Any Jekyll file with Front Matter can be parsed my this class.


### The format:

The basic format is as follows:

	---
	foo: bar
	title: Test
	expl: Make sure there is only 1 space between each of the variables
	info: you can have as many custom fields as you like
	---
	<h1>Text Here</h1>
	<p>content</p>

There is no conversion from Markdown so you will have to implement your own, or if you want you can simply use HTML and even PHP directly.

### Installation / How to use

1. Make sure you have the **yaml** PECL extension for PHP installed.
2. Include the "frontmatter.php" file in your PHP, then check out example/example.php for an example of how to use.
