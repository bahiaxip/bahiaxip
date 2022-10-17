<?php
declare(strict_types=1);
function perm(): App\Functions\Permissions{
	static $perm;

	$perm = new App\Functions\Permissions();
	if($perm)
		return $perm;
}

?>