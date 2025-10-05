<?php
// index.php

function clean($s) {
    return htmlspecialchars(trim($s), ENT_QUOTES, 'UTF-8');
}

$errors = [];
$values = [
    'nama' => '',
    'email' => '',
    'nim' => '',
    'jurusan' => '',
    'alasan' => ''
];

$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($submitted) {
    $values['nama']   = clean($_POST['nama'] ?? '');
    $values['email']  = clean($_POST['email'] ?? '');
    $values['nim']    = clean($_POST['nim'] ?? '');
    $values['jurusan']= clean($_POST['jurusan'] ?? '');
    $values['alasan'] = clean($_POST['alasan'] ?? '');

    if ($values['nama'] === '') {
        $errors['nama'] = 'Nama wajib diisi';
    } elseif (mb_strlen($values['nama']) < 3) {
        $errors['nama'] = 'Nama terlalu pendek (min 3 karakter)';
    }

    if ($values['email'] === '') {
        $errors['email'] = 'Email wajib diisi';
    } elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid';
    }

    if ($values['nim'] === '') {
        $errors['nim'] = 'NIM wajib diisi';
    } elseif (!ctype_digit($values['nim'])) {
        $errors['nim'] = 'NIM harus angka';
    } elseif (strlen($values['nim']) < 8) {
        $errors['nim'] = 'NIM minimal 8 digit';
    }

    if ($values['jurusan'] === '') {
        $errors['jurusan'] = 'Pilih salah satu jurusan';
    }

    if ($values['alasan'] === '') {
        $errors['alasan'] = 'Alasan wajib diisi';
    } elseif (mb_strlen($values['alasan']) < 10) {
        $errors['alasan'] = 'Alasan terlalu singkat';
    }

    $success = empty($errors);
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Pendaftaran EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="form-container">
    <img src="EAD.png" alt="Logo EAD" class="logo">
    <h2>Pendaftaran Anggota EAD Laboratory</h2>

    <?php if (!empty($submitted) && !empty($errors)): ?>
      <div class="error-box">❌ Terdapat <?= count($errors) ?> kesalahan. Mohon periksa kembali!</div>
    <?php endif; ?>

    <form method="post" novalidate>
      <label for="nama">Nama Lengkap</label>
      <input id="nama" name="nama" type="text" value="<?= $values['nama'] ?>">
      <?php if (!empty($errors['nama'])): ?><div class="error"><?= $errors['nama'] ?></div><?php endif; ?>

      <label for="email">Email</label>
      <input id="email" name="email" type="email" value="<?= $values['email'] ?>">
      <?php if (!empty($errors['email'])): ?><div class="error"><?= $errors['email'] ?></div><?php endif; ?>

      <label for="nim">NIM</label>
      <input id="nim" name="nim" type="text" value="<?= $values['nim'] ?>">
      <?php if (!empty($errors['nim'])): ?><div class="error"><?= $errors['nim'] ?></div><?php endif; ?>

      <label for="jurusan">Jurusan</label>
      <select id="jurusan" name="jurusan">
        <option value="">-- Pilih Jurusan --</option>
        <option value="Sistem Informasi" <?= $values['jurusan']=='Sistem Informasi'?'selected':''; ?>>Sistem Informasi</option>
        <option value="Teknik Informatika" <?= $values['jurusan']=='Teknik Informatika'?'selected':''; ?>>Teknik Informatika</option>
        <option value="Teknologi Informasi" <?= $values['jurusan']=='Teknologi Informasi'?'selected':''; ?>>Teknologi Informasi</option>
        <option value="Manajemen" <?= $values['jurusan']=='Manajemen'?'selected':''; ?>>Manajemen</option>
        <option value="Lainnya" <?= $values['jurusan']=='Lainnya'?'selected':''; ?>>Lainnya</option>
      </select>
      <?php if (!empty($errors['jurusan'])): ?><div class="error"><?= $errors['jurusan'] ?></div><?php endif; ?>

      <label for="alasan">Alasan Bergabung</label>
      <textarea id="alasan" name="alasan" rows="4"><?= $values['alasan'] ?></textarea>
      <?php if (!empty($errors['alasan'])): ?><div class="error"><?= $errors['alasan'] ?></div><?php endif; ?>

      <button type="submit">Daftar</button>
    </form>

    <?php if (!empty($submitted) && empty($errors)): ?>
      <div class="result-box">
        <img src="EAD.png" alt="Logo EAD" class="logo">
        <h3>✅ Pendaftaran Berhasil!</h3>
        <table>
          <tr><td>Nama</td><td><?= $values['nama'] ?></td></tr>
          <tr><td>Email</td><td><?= $values['email'] ?></td></tr>
          <tr><td>NIM</td><td><?= $values['nim'] ?></td></tr>
          <tr><td>Jurusan</td><td><?= $values['jurusan'] ?></td></tr>
          <tr><td>Alasan</td><td><?= nl2br($values['alasan']) ?></td></tr>
        </table>
        <p class="timestamp">Waktu pendaftaran: <?= date('d-m-Y H:i:s') ?></p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
