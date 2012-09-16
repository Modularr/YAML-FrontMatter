YAML Front Matter
================

An easy to use class for handling YAML frontmatter in PHP.

## What does this class do?

YAML Front Matter is a technique used by many new and upcoming systems that do not use Databases as their backend. Instead they rely on a file based system.

YAML Front Matter is a method used to keep metadata about the file seperated from the actual content inside the file.

What this simple PHP class allows you to do is **read such files**, and return each of the **metadata** or **content** independantly.

## What files are compatible with this class?

This class is currently a stict format. The current format is following the original [Jekyll](https://github.com/mojombo/jekyll/wiki/yaml-front-matter) project example. As far as we know the current file format is only compatible with [Statamic](http://statamic.com/ "Statamic is a flexible, flat file CMS").


### The format:

The current strict format is as follows:

	---
	foo: bar
	title: Test
	expl: Make sure there is only 1 space between each of the variables
	info: you can have as many custom fields as you like
	---
	<h1>Text Here</h1>
	<p>content</p>

There is no conversion from Markdown so you will have to implement your own, or if you want you can simply use HTML and even PHP directly.

### How to use this class?

test.php is an example file that shows you how to use this class.