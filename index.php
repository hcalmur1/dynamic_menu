<?php
	//Set the database connection
	mysql_connect('localhost','root','');
	mysql_select_db('test');
	//select all rows from the main_menu table
	$result = mysql_query("select id,title,parentid,link from main_menu");

	//create a multidimensional array to hold a list of menu and parent menu
	$menu = array(
		'menus' => array(),
		'parent_menus' => array()
	);

	//build the array lists with data from the menu table
	while ($row = mysql_fetch_assoc($result)) {
		//creates entry into menus array with current menu id ie. $menus['menus'][1]
		$menu['menus'][$row['id']] = $row;
		//creates entry into parent_menus array. parent_menus array contains a list of all menus with children
		$menu['parent_menus'][$row['parentid']][] = $row['id'];
	}
	
	// Create the main function to build milti-level menu. It is a recursive function.	
	function buildMenu($parent, $menu) {
	$html = "";
	if (isset($menu['parent_menus'][$parent])) {
		$html .= "<ul>";
		foreach ($menu['parent_menus'][$parent] as $menu_id) {
			if (!isset($menu['parent_menus'][$menu_id])) {
				$html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" . $menu['menus'][$menu_id]['title'] . "</a></li>";
			}
			if (isset($menu['parent_menus'][$menu_id])) {
				$html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" . $menu['menus'][$menu_id]['title'] . "</a>";
				$html .= buildMenu($menu_id, $menu);
				$html .= "</li>";
			}
		}
		$html .= "</ul>";
	}
	return $html;
}
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Php multi-level dynamic menu generator script</title>
</head>
<body>

<div id='cssmenu'>
<?php echo buildMenu(0, $menu);; ?>
</div>

</body>
<html>
