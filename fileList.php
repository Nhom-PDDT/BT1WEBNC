<?php
$uploadDir = 'upload/';

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    $files = array_diff($files, array('.', '..'));

    if (count($files) > 0) {
        echo '<div id="fileList">';
        echo '<table>';
        echo '<tr><th onclick="sortTable(0)">Name</th><th onclick="sortTable(1)">Type</th><th onclick="sortTable(2)">Date</th><th onclick="sortTable(3)">Size</th></tr>';

        foreach ($files as $file) {
            $filePath = $uploadDir . $file;
            $fileInfo = stat($filePath);
            $fileSize = filesize($filePath);
            $formattedSize = formatBytes($fileSize);
            $formattedDate = date('Y-m-d H:i:s', $fileInfo['mtime']);
            echo "<tr><td>$file</td><td>".mime_content_type($filePath)."</td><td>$formattedDate</td><td>$formattedSize</td></tr>";
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>No files uploaded yet.</p>';
    }
} else {
    echo '<p>Upload directory does not exist.</p>';
}

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}
?>
