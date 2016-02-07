YAML Front Matter
================
[![Latest Version](http://img.shields.io/packagist/v/modularr/yaml-front-matter.svg?style=flat)](https://packagist.org/packages/modularr/yaml-front-matter)
[![Software License](https://img.shields.io/packagist/l/modularr/yaml-front-matter.svg?style=flat)](LICENSE)
[![Build Status](https://img.shields.io/travis/Modularr/YAML-FrontMatter/master.svg?style=flat)](https://travis-ci.org/Modularr/YAML-FrontMatter)
[![Total Downloads](https://img.shields.io/packagist/dt/modularr/yaml-front-matter.svg?style=flat)](https://packagist.org/packages/modularr/yaml-front-matter)

An easy to use class for handling YAML frontmatter in PHP.

### What does this class do?

YAML Front Matter is a technique used to keep metadata about the file seperated from the actual content inside the file, while still only having one file. This simple PHP class allows you to **read such files**, and return each of the **metadata** or **content** independantly.

### What files are compatible with this class?

Any Jekyll file with Front Matter can be parsed by this class.


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

There is no conversion from Markdown so you will have to implement your own.

## Installation

via Composer:
```json
{
    "require": {
        "modularr/yaml-front-matter": "1.*"
    }
}
```
Then run:

	composer update

Or install like so:

	composer require modularr/yaml-front-matter

make sure you have:
```php
require 'vendor/autoload.php';
```

Manual:

1. Download [Release](https://github.com/Modularr/YAML-FrontMatter/releases) Or copy file manually
2. Include **frontmatter.php** (found under **src/**)
3. Check out the example

### How to use

The basic format is as follows:

	---
	foo: bar
	title: Test
	expl: Make sure there is only 1 space between each of the variables
	info: you can have as many custom fields as you like
	---
	<h1>Text Here</h1>
	<p>content</p>

There is no conversion from Markdown so you will have to implement your own.

Example Code:
```php
$page = new FrontMatter('content/example.md');
echo '<h1><a href="'.$page->fetch('uri').'">'.$page->fetch('title').'</a></h1>
'.$page->fetch('content');
```
