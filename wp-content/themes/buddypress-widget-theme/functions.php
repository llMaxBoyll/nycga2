<?php


/* Register the widget columns */
register_sidebar( array(
		'name' => 'Column 1',
		'id' => 'Column 1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);

register_sidebar( array(
		'name' => 'Column 2',
		'id' => 'Column 2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);

register_sidebar( array(
		'name' => 'Column 3',
		'id' => 'Column 3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);



?>