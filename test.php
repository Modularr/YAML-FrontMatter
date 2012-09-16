<?php
# Include Class
include('frontmatter.php');
$fetch = new FrontMatter('content/test.md');

echo '<h1><a href="'.$fetch->uri.'">'.$fetch->title.'</a></h1>
'.$fetch->content;