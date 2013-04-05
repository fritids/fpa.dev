 <?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$postType = (isset($_GET['post_type'])) ? $_GET['post_type'] : 0;
$taxonomy = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : 0;
$taxName = (isset($_GET['tax_name'])) ? $_GET['tax_name'] : 0;

ajaxMediaLoop($postType, $taxonomy, $taxName);