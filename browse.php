<?php
error_reporting(E_ERROR | E_PARSE);

$os = strtoupper(php_uname('s'));
$windows = strpos($os, "WIN") !== false;
$default_dir = $windows ? "c:" : "/home/data/httpd";

$path = isset($_GET['path']) ? $_GET['path'] : $default_dir;
if (is_dir($path)) {
    $file = scandir($path);
    natcasesort($file);
    // Make directories first
    $files = $dirs = array();
    foreach ($file as $this_file) {
        if (is_dir("$path/$this_file")) {
            $dirs[] = $this_file;
        } else {
            $files[] = $this_file;
        }
    }
    $file = array_merge($dirs, $files);

    echo "<table border=\"0\">\n";
    echo "<tr><th>Name</th><th align=\"right\">Size</th><th>&nbsp;</th><th>Date</th><th>User</th><th>Group</th></tr>\n";

    foreach ($file as $this_file) {
        $link = "$path/$this_file";
        if (is_dir("$path/$this_file")) {
            $icon = "folder.png";
            if ($this_file == ".") {
                $link = "$path";
            } else if ($this_file == "..") {
                $pos = strrpos($path, "/");
                if ($pos !== false) {
                    $link = substr($path, 0, $pos);
                } else {
                    $link = $default_dir;
                }
            }
        } else {
            $icon = "f.png";
        }

        $stat = stat("$path/$this_file");
        $size = $stat['size'];
        $mtime = $stat['mtime'];
        $uid = $stat['uid'];
        $gid = $stat['gid'];

        $unit = "B";
        if ($size >= 1024) {
            $size = $size / 1024;
            $unit = "KB";
        }

        if ($size >= 1024) {
            $size = $size / 1024;
            $unit = "MB";
        }

        if ($size >= 1024) {
            $size = $size / 1024;
            $unit = "GB";
        }

        $size = round($size);

        date_default_timezone_set('UTC');
        $date = date("Y-m-d G-i-s", $mtime);

        if (function_exists('posix_getpwuid')) {
            $uid = posix_getpwuid($uid);
            $gid = posix_getpwuid($gid);
        }

        echo "<tr>";
        echo "<td><img src=\"https://dev.eclipse.org/icons/$icon\">&nbsp;<a href=\"?path=$link\">" . htmlspecialchars($this_file) . "</a></td>";
        echo "<td align=\"right\">$size</td><td>$unit</td><td>$date</td><td>$uid</td><td>$gid</td>";
        echo "</tr>\n";
    }

    echo "</table>\n";
} else {
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $path);
        finfo_close($finfo);
    } else if (function_exists('mime_content_type')) {
        $mimetype = mime_content_type($path);
    }

    if (empty($mimetype))
        $mimetype = 'application/octet-stream';

    header('Content-type: $mimetype');
    echo file_get_contents($path);
}

?>