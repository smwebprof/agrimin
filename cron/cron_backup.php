<?php
	
	/* 
 * This script only works on linux.
 * It keeps only 31 backups of past 31 days, and backups of each 1st day of past months.
 */
 
/*define('DB_HOST', 'localhost');
define('DB_NAME', 'agrimn8f_agrimindb');
define('DB_USER', 'agrimn8f_agrimin');
define('DB_PASSWORD', 'Jp53]6EtM+2R6sP');
define('BACKUP_SAVE_TO', '/home/agrimn8f/public_html/backup/database/software'); // without trailing slash*/

define('DB_HOST', 'localhost');
define('DB_NAME', 'agrimn8f_agrimindb');
define('DB_USER', 'agrimn8f_agrimin');
define('DB_PASSWORD', 'Jp53]6EtM+2R6sP');
define('BACKUP_SAVE_TO', '/home/agrimn8f/public_html/agrimin/backup'); // without trailing slash
 
/*$time = time();
$day = date('j', $time);
if ($day == 1) {
    $date = date('Y-m-d', $time);
} else {
    $date = $day;
}*/

$date = date('Ymd');
 
$backupFile = BACKUP_SAVE_TO . '/' . DB_NAME . '_' . $date . '.sql.gz';
/*if (file_exists($backupFile)) {
    @unlink($backupFile);
}*/ 
$command = 'mysqldump --opt -h ' . DB_HOST . ' -u ' . DB_USER . ' -p\'' . DB_PASSWORD . '\' ' . DB_NAME . ' | gzip > ' . $backupFile;
system($command);
?>
