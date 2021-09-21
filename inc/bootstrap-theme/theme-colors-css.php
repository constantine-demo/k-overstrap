<?php
  header("Content-Type: text/css; charset=utf-8");
  $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
  require_once( $absolute_path[0].'wp-load.php' );
?>
/* generated styles */
<?php
  echo minify_css( generated_css_styles() );
?>
