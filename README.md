YAML Front Matter
================
[![Latest Version](http://img.shields.io/packagist/v/modularr/yaml-front-matter.svg?style=flat)](https://packagist.org/packages/modularr/yaml-front-matter)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![Build Status](https://img.shields.io/travis/Modularr/YAML-FrontMatter/master.svg?style=flat)](https://travis-ci.org/Modularr/YAML-FrontMatter)
[![Total Downloads](https://img.shields.io/packagist/dt/modularr/yaml-front-matter.svg?style=flat)](https://packagist.org/packages/modularr/yaml-front-matter)

An easy to use class for handling YAML frontmatter in PHP.

### What does this class do?

This class is a PHP implementation of [Jekyll](https://jekyllrb.com/docs/frontmatter/) **Front Matter**.

> Any file that contains a **YAML front matter block will be processed as a special file**. The front matter must be the first thing in the file and must take the form of **valid YAML set** _**between triple-dashed lines**_. Here is a basic example:

```yaml
---
layout: post
title: Blogging Like a Hacker
---
```

Between these triple-dashed lines, you can set variables using YAML. You can access them via the `fetch` function. Conversion to Markdown is optional.

### How to use

```php
$page = new FrontMatter('content/example.md');
echo '<h1><a href="'.$page->fetch('uri').'">'.$page->fetch('title').'</a></h1>
'.$page->fetch('content');

foreach($page->fetch('list') as $key => $value) {
	echo '<li>'.$key.' => '.$value.'</li>';
}
$array = $page->fetch('list');
echo $array['foo'];
```

```yaml
---
foo: bar
title: Test
info: you can have as many custom fields as you like
date: 2005-09-16 17:20:42+00:00
layout: post
comments: true
slug: testing
list: { foo: bar, bar: baz }
list2:
- foo
- bar
list3:
    foo: bar
    bar: baz
---
<h1>Text Here</h1>
<p>content</p>
```

## Installation

Install in via Composer:

	composer require modularr/yaml-front-matter

Make sure you have:
```php
require 'vendor/autoload.php';
```