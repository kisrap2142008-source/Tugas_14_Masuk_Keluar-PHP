<?php include 'assets/ui.php'; ?>

<?php if (!isset($_SESSION['role'])): ?>
    <div style="width:100vw; height:100vh; display:flex; align-items:center; justify-content:center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card" style="width:360px; text-align:center">
            <h2 style="margin-bottom:1.5rem">Masuk E-Surat</h2>
            <form method="POST">
                <input type="text" name="u" placeholder="Username" required style="width:100%; margin-bottom:1rem; padding:0.8rem; border-radius:8px; border:1px solid #ddd">
                <input type="password" name="p" placeholder="Password" required style="width:100%; margin-bottom:1.5rem; padding:0.8rem; border-radius:8px; border:1px solid #ddd">
                <button type="submit" name="do_login" class="btn btn-blue" style="width:100%; justify-content:center">Login Sekarang</button>
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="sidebar">
        <h2 style="margin-top:0; color:var(--primary)">E-SURAT</h2>
        <div style="background:rgba(255,255,255,0.05); padding:1.2rem; border-radius:12px; margin-bottom:2rem; border:1px solid rgba(255,255,255,0.1)">
            <small style="color:var(--text-muted)">Login Sebagai:</small><br>
            <strong style="font-size:1.1rem"><?= htmlspecialchars($_SESSION['username']) ?></strong><br>
            <span class="badge" style="background:var(--primary); margin-top:0.5rem; display:inline-block"><?= $_SESSION['role'] ?></span>
        </div>
        <a href="index.php?logout=1" class="btn btn-red" style="width:100%; justify-content:center">Keluar Sistem</a>
    </div>

    <div class="main">
        <div class="card">
            <?php if ($_SESSION['role'] == 'user'): ?>
            <div id="form-container">
                <h3 id="form-title" style="margin-top:0">📑 Buat Surat Baru</h3>
                <div class="form-box">
                    <form method="POST" class="form-inline">
                        <input type="hidden" name="id" id="id_s">
                        <input type="text" name="no" id="in_no" placeholder="Contoh: 001/ADM/2026" required>
                        <select name="jen" id="in_jen">
                            <option value="Masuk">Surat Masuk</option>
                            <option value="Keluar">Surat Keluar</option>
                        </select>
                        <input type="text" name="per" id="in_per" placeholder="Perihal Surat" required>
                        <button type="submit" id="btn-action" name="do_save" class="btn btn-blue">Kirim Surat</button>
                        <a href="index.php" class="btn btn-orange">Reset</a>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <h3 style="margin-top:0">📂 Arsip Surat Terbaru</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Perihal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n=1; while($r = mysqli_fetch_assoc($dataSurat)): ?>
                        <tr>
                            <td><?= $n++ ?></td>
                            <td><code style="background:#f1f5f9; padding:0.2rem 0.5rem; border-radius:4px"><?= htmlspecialchars($r['nomor']) ?></code></td>
                            <td>
                                <span class="badge" style="background:<?= $r['jenis']=='Masuk' ? '#dcfce7':'#fee2e2' ?>; color:<?= $r['jenis']=='Masuk' ? '#166534':'#991b1b' ?>">
                                    <?= $r['jenis'] ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($r['perihal']) ?></td>
                            <td>
                                <div style="display:flex; gap:0.5rem">
                                    <button onclick="fillEdit('<?= $r['id'] ?>','<?= $r['nomor'] ?>','<?= $r['jenis'] ?>','<?= $r['perihal'] ?>')" class="btn btn-green" style="padding:0.4rem 0.8rem">Edit</button>
                                    <a href="index.php?del=<?= $r['id'] ?>" class="btn btn-red" style="padding:0.4rem 0.8rem" onclick="return confirm('Hapus data?')">Batal</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>