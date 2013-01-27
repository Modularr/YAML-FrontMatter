<?php
# Include Class
include('../frontmatter.php');
$page = new FrontMatter('content/example.md');

echo '<h1><a href="'.$page->fetch('uri').'">'.$page->fetch('title').'</a></h1>
'.$page->fetch('content');