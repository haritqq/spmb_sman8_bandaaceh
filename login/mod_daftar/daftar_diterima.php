<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <a class="btn btn-primary" href="mod_daftar/export_diterima.php" role="button"> Download Excel</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>NISN</th>
                                <th>Nama Pendaftar</th>
                                <th>Asal Sekolah</th>
                                <th>No Hp</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from daftar where status='1'");
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $daftar['nisn'] ?></td>
                                    <td><?= $daftar['nama'] ?></td>
                                    <td><?= $daftar['asal_sekolah'] ?></td>
                                    <td>
                                        <i class="fab fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=
					*Kepada Orang Tua%2FWali dan Calon Peserta Didik SPMB SMAN 8 Banda Aceh*,
					%0A%0AUntuk mendapatkan informasi terbaru mengenai proses daftar ulang, dan kegiatan selanjutnya,
					silakan bergabung ke Grup WhatsApp Info SPMB melalui tautan berikut:
					%0A%0A
					🔗 https://chat.whatsapp.com/FMYqzLUfVNBI24UcHzXhml
					%0A
					✅ Mohon hanya orangtua%2Fwali atau calon siswa yang bergabung.%0A
					✅ Mohon untuk tidak menyebarkan link grup ini ke orang lain.%0A
					✅ Pastikan selalu memantau informasi di grup.
					%0A%0A
					📌 Jika ada pertanyaan, silakan hubungi panitia SPMB.
					%0A%0A
					Terima kasih. 🙏 
					%0A*Panitia SPMB SMAN 8 Banda Aceh* ">
                                            <?= $daftar['no_hp'] ?></a></td>
                                    <td>
                                        <?php if ($daftar['status'] == 1) { ?>
                                            <span class="badge badge-success">diterima</span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning">Diverifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=detail&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i> Detail</a>

                                        <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-times    "></i> Cancel</button>

                                    </td>
                                </tr>

                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Apa kamu yakin ?',
            text: 'Akan membatalkan status diterima dan menghapus pembayaran dari pendaftar ini ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=batal',
                    method: "POST",
                    data: 'id_daftar=' + id,
                    success: function(data) {
                        iziToast.warning({
                            title: 'O o w!',
                            message: 'Data Berhasil dibatalkan',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });
</script>