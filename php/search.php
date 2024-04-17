<?php
if (isset($_POST['search'])) {
	$search = esctxt($connection, $_POST['search']);

	$querySearch = "SELECT `Topic`, `Comment` FROM `forum` AS f INNER JOIN `comments` AS c ON f.ID = c.ForumID WHERE `Topic` LIKE '%$search%' OR `Comment` LIKE '%$search'";
	$resultSearch = $connection -> query($querySearch);
}
?>