<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php $siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]); ?>

			<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Data diri Siswa</h4>
                <div class="card-header-action">
                   
					
                </div>
            </div>
            <div class="card-body">
                <div class="author-box-left">
                    <img alt="image" src="../<?= $siswa['foto'] ?>" class="rounded author-box-picture">
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job">Status Siswa</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Aktif</span>
                    <?php } else { ?>
                        <span class="badge badge-danger">Tidak Aktif</span>
                    <?php } ?>
                </div>
		
                <div class="author-box-details">

                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item col-sm-12 col-md-3">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <li class="nav-item col-sm-12 col-md-3">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home    "></i> Data Alamat</a>
                        </li>
                        <li class="nav-item col-sm-12 col-md-3">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
						
                            <form id="form-datadiri">

                            <!-- Progress Bar -->
                            <div style="width: 100%; background-color: #e0e0e0; border-radius: 10px; margin-bottom: 20px; position: relative; height: 20px;">
                            <div id="progress1-bar-inner-datadiri" style="height: 100%; width: 0%; background-color: red; border-radius: 10px; transition: width 0.5s, background-color 0.5s;"></div>
                            <div id="progress1-text-datadiri" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); font-weight: bold; color: #fff;">0%</div>
                            </div>

								<input type="hidden" name="id_daftar" value="<?php echo $siswa['id_daftar'] ?>">
								<div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="no" class="form-control" value="<?= $siswa['no_daftar'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="asal_sekolah" class="form-control" value="<?= $siswa['asal_sekolah'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPSN Sekolah Asal</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="npsn_asal" class="form-control" value="<?= $siswa['npsn_asal'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan Program/Jurusan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jurusan' oninput="updateProgress1()">
                                            <option value="<?= $siswa['jurusan'] ?>"><?= $siswa['jurusan'] ?></option>
													<?php $qu = mysqli_query($koneksi, "select * from jurusan ");
													while ($jur = mysqli_fetch_array($qu)) {
													?>
														<option value="<?= $jur['id_jurusan'] ?>"> <?= $jur['nama_jurusan'] ?></option>
														<?php } ?>
                                        </select>
                                    </div>
									
                                </div>                            
								<div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nik" class="form-control" value="<?= $siswa['nik'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kewarganegaraan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='warga_siswa' oninput="updateProgress1()">
                                            <option value=''>Pilih Kewarganegaraan</option>";
                                            <?php foreach ($warga_siswa as $val => $key) { ?>
                                                <?php if ($siswa['warga_siswa'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $siswa['tgl_lahir'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jenkel' oninput="updateProgress1()">
                                            <option value=''>Pilih Jenis Kelamin</option>";
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($siswa['jenkel'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anak Ke</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="anakke" class="form-control" value="<?= $siswa['anak_ke'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Saudara</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="saudara" class="form-control" value="<?= $siswa['saudara'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='agama' oninput="updateProgress1()">
                                            <option value=''>Pilih Agama</option>";
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($siswa['agama'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cita Cita</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='citacita' oninput="updateProgress1()">
                                            <option value=''>Pilih Cita-cita</option>";
                                            <?php foreach ($cita as $val) { ?>
                                                <?php if ($siswa['citacita'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hobi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='hobi' oninput="updateProgress1()">
                                            <option value=''>Pilih Hobi</option>";
                                            <?php foreach ($hobi as $val) { ?>
                                                <?php if ($siswa['hobi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="email" class="form-control" value="<?= $siswa['email'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Handphone</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohp" class="form-control" value="<?= $siswa['no_hp'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Yang Membiayai Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='biaya_sekolah' oninput="updateProgress1()">
                                            <option value=''>Yang Membiayai Sekolah</option>";
                                            <?php foreach ($biaya_sekolah as $val) { ?>
                                                <?php if ($siswa['biaya_sekolah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <!-- <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pernah PAUD</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='paud' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['paud'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pernah TK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='tk' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['tk'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imunisasi Hepatitis B</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='hepatitis' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['hepatitis'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imunisasi Polio</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='polio' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['polio'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imunisasi BCG</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='bcg' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['bcg'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imunisasi Campak</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='campak' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['campak'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imunisasi DPT</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='dpt' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['dpt'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imunisasi Covid</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='covid' >
                                            <option value=''>Ya / Tidak</option>";
                                            <?php foreach ($yatidak as $val => $key) { ?>
                                                <?php if ($siswa['covid'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KIP</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kip" class="form-control" value="<?= $siswa['no_kip'] ?>" placeholder="kosongkan jika tidak punya KIP" oninput="updateProgress1()">
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nokk" class="form-control" value="<?= $siswa['no_kk'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kepala Keluarga</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kepala_keluarga" class="form-control" value="<?= $siswa['kepala_keluarga'] ?>" oninput="updateProgress1()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                            </form>
                        </div>



                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            <form id="form-alamat">

                            <!-- Progress Bar -->
                            <div style="width: 100%; background-color: #e0e0e0; border-radius: 10px; margin-bottom: 20px; position: relative; height: 20px;">
                            <div id="progress2-bar-inner-alamat" style="height: 100%; width: 0%; background-color: red; border-radius: 10px; transition: width 0.5s, background-color 0.5s;"></div>
                            <div id="progress2-text-alamat" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); font-weight: bold; color: #fff;">0%</div>
                            </div>

                               <input type="hidden" name="id_daftar" value="<?php echo $siswa['id_daftar'] ?>">
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" placeholder="nama jalan / kampung" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT / RW</label>
                                    <div class="col-sm-3 col-md-3">
                                        <input type="number" name="rt" class="form-control" value="<?= $siswa['rt'] ?>"placeholder="RT" oninput="updateProgress2()">
                                    </div>
                                    <div class="col-sm-3 col-xs-3 col-md-3">
                                        <input type="number" name="rw" class="form-control" value="<?= $siswa['rw'] ?>" placeholder="RW" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desa</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="desa" class="form-control" value="<?= $siswa['desa'] ?>" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kecamatan" class="form-control" value="<?= $siswa['kecamatan'] ?>" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kota" class="form-control" value="<?= $siswa['kota'] ?>" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="provinsi" class="form-control" value="<?= $siswa['provinsi'] ?>" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="kodepos" class="form-control" value="<?= $siswa['kode_pos'] ?>" oninput="updateProgress2()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggal Bersama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='tinggal' oninput="updateProgress2()">
                                            <option value=''>Pilih Tinggal</option>";
                                            <?php foreach ($jenistinggal as $val) { ?>
                                                <?php if ($siswa['tinggal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jarak Ke Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        
										<select name="jarak"  value="<?= $siswa['jarak'] ?>" class="form-control input-sm input-select" required oninput="updateProgress2()">
                                                    <option value="<?= $siswa['jarak'] ?>"
													  ><?= $siswa['jarak'] ?></option>
													  <option value="Kurang dari 5 Km"
													  >Kurang dari 5 Km</option>
																	<option value="Antara 5 - 10 Km"
													  >Antara 5 - 10 Km</option>
																	<option value="Antara 11 - 20 Km"
													  >Antara 11 - 20 Km</option>
																	<option value="Antara 21 - 30 Km"
													 >Antara 21 - 30 Km</option>
																	<option value="Lebih dari 30 Km"
													  >Lebih dari 30 Km</option>
                                                  </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu Tempuh</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='waktu' oninput="updateProgress2()">
                                            <option value=''>Waktu Tempuh</option>";
                                            <?php foreach ($waktu as $val) { ?>
                                                <?php if ($siswa['waktu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transportasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='transportasi' oninput="updateProgress2()">
                                            <option value=''>Pilih Transportasi</option>";
                                            <?php foreach ($transport as $val) { ?>
                                                <?php if ($siswa['transportasi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Alamat</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="form-orangtua">

                                <!-- DATA AYAH -->
                                <!-- DATA AYAH -->
                                
                    <!-- Progress Bar -->
                    <div style="width: 100%; background-color: #e0e0e0; border-radius: 10px; margin-bottom: 20px; position: relative; height: 20px;">
                    <div id="progress3-bar-inner-orangtua" style="height: 100%; width: 0%; background-color: red; border-radius: 10px; transition: width 0.5s, background-color 0.5s;"></div>
                    <div id="progress3-text-orangtua" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); font-weight: bold; color: #fff;">0%</div>
                    </div>

                                <input type="hidden" name="id_daftar" value="<?php echo $siswa['id_daftar'] ?>">
                                
								<h5><i class="fas fa-user-check" style='font-size:18px'></i> &nbsp;&nbsp; Data Lengkap Ayah</h5>
								<div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Ayah</label>
                                    
									 <div class="col-sm-12 col-md-7"><select class="form-control" name="status_ayah"required oninput="updateProgress3()">

								   <option value="<?= $siswa['status_ayah'] ?>"><?= $siswa['status_ayah'] ?></option>
									<option value="Masih Hidup">Masih Hidup</option>
									<option value="Meninggal Dunia">Meninggal Dunia</option>
									<option value="Tidak Diketahui">Tidak Diketahui</option>
									
									</select></div>
                                 </div>
								 <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nikayah" class="form-control" value="<?= $siswa['nik_ayah'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tahunayah" class="form-control" value="<?= $siswa['tahun_ayah'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ayah' oninput="updateProgress3()">
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ayah' oninput="updateProgress3()">
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ayah' oninput="updateProgress3()">
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohpayah" class="form-control" value="<?= $siswa['no_hp_ayah'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                               
								<h5><i class="fas fa-user-check" style='font-size:18px'></i> &nbsp;&nbsp; Data Lengkap Ibu</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status ibu</label>
                                    
									 <div class="col-sm-12 col-md-7"><select class="form-control" name="status_ibu"required oninput="updateProgress3()">

								   <option value="<?= $siswa['status_ibu'] ?>"><?= $siswa['status_ibu'] ?></option>
									<option value="Masih Hidup">Masih Hidup</option>
									<option value="Meninggal Dunia">Meninggal Dunia</option>
									<option value="Tidak Diketahui">Tidak Diketahui</option>
									
									</select></div>
                                 </div>
								 <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nikibu" class="form-control" value="<?= $siswa['nik_ibu'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tahunibu" class="form-control" value="<?= $siswa['tahun_ibu'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ibu' oninput="updateProgress3()">
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ibu' oninput="updateProgress3()">
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ibu' oninput="updateProgress3()">
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Hp Ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohpibu" class="form-control" value="<?= $siswa['no_hp_ibu'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
								
                                <h5><i class="fas fa-user-check" style='font-size:18px'></i> &nbsp;&nbsp; Data Lengkap Wali</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nikwali" class="form-control" value="<?= $siswa['nik_wali'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namawali" class="form-control" value="<?= $siswa['nama_wali'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tahunwali" class="form-control" value="<?= $siswa['tahun_wali'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_wali' oninput="updateProgress3()">
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_wali' oninput="updateProgress3()">
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_wali' oninput="updateProgress3()">
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohpwali" class="form-control" value="<?= $siswa['no_hp_wali'] ?>" oninput="updateProgress3()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua</button></center>
                                </div>
                            </form>
                        </div>
						

                    </div>


                </div>
            </div>
        </div>
    </div>
		
</div>

                                                                    <!-- PROGRESBAR DATA DIRI -->
                                                                    <script>
    // Memuat progres dari LocalStorage jika ada
    window.onload = function() {
        const savedProgress = localStorage.getItem('progress1');
        if (savedProgress) {
            const progress = parseInt(savedProgress);
            updateProgressBar1(progress);
        }
    }

    // Fungsi untuk memperbarui progres bar dan menyimpan progres di LocalStorage
    function updateProgress1() {
        const form = document.getElementById('form-datadiri');   
        const totalFields = form.elements.length - 1; // Exclude submit button
        let filledFields = 0;

        // Hitung jumlah field yang terisi
        for (let i = 0; i < totalFields; i++) {
            const field = form.elements[i];
            if (field.value.trim() !== "" || (field.type === "select-one" && field.value !== "")) {
                filledFields++;
            }
        }

        // Hitung persentase progres
        const progress = (filledFields / totalFields) * 100;

        // Update progres bar dan teks persentase
        updateProgressBar1(progress);

        // Simpan progres ke LocalStorage
        localStorage.setItem('progress1', progress);
    }

    // Fungsi untuk memperbarui progres bar berdasarkan persentase
    function updateProgressBar1(progress) {
        const progressBar = document.getElementById('progress1-bar-inner-datadiri');
        const progressText = document.getElementById('progress1-text-datadiri');
        progressBar.style.width = progress + '%';
        progressText.textContent = Math.round(progress) + '%';

        // Ubah warna berdasarkan progres
        if (progress < 50) {
            progressBar.style.backgroundColor = 'red'; // Merah jika kurang dari 50%
        } else if (progress < 80) {
            progressBar.style.backgroundColor = 'orange'; // Oranye jika antara 50% dan 80%
        } else {
            progressBar.style.backgroundColor = 'green'; // Hijau jika lebih dari 80%
        }
    }
</script>

<script>
    // Memuat progres dari LocalStorage
    window.onload = function() {
        const savedProgress = localStorage.getItem('progress2');
        if (savedProgress) {
            const progress = parseInt(savedProgress);
            updateProgressBar2(progress);
        }
    }

    // Fungsi untuk memperbarui progres bar dan menyimpan progres di LocalStorage
    function updateProgress2() {
        const form = document.getElementById('form-alamat');   
        const totalFields = form.elements.length - 1; // Exclude submit button
        let filledFields = 0;

        // Hitung jumlah field yang terisi
        for (let i = 0; i < totalFields; i++) {
            const field = form.elements[i];
            if (field.value.trim() !== "" || (field.type === "select-one" && field.value !== "")) {
                filledFields++;
            }
        }

        // Hitung persentase progres
        const progress = (filledFields / totalFields) * 100;

        // Update progres bar dan teks persentase
        updateProgressBar2(progress);

        // Simpan progres ke LocalStorage
        localStorage.setItem('progress2', progress);
    }

    // Fungsi untuk memperbarui progres bar berdasarkan persentase
    function updateProgressBar2(progress) {
        const progressBar = document.getElementById('progress2-bar-inner-alamat');
        const progressText = document.getElementById('progress2-text-alamat');
        progressBar.style.width = progress + '%';
        progressText.textContent = Math.round(progress) + '%';

        // Ubah warna berdasarkan progres
        if (progress < 50) {
            progressBar.style.backgroundColor = 'red'; // Merah jika kurang dari 50%
        } else if (progress < 80) {
            progressBar.style.backgroundColor = 'orange'; // Oranye jika antara 50% dan 80%
        } else {
            progressBar.style.backgroundColor = 'green'; // Hijau jika lebih dari 80%
        }
    }
</script>

                                                                            <!-- PROGRESBAR ORANGRUA -->
<script>
    // Memuat progres dari LocalStorage
    window.onload = function() {
        const savedProgress = localStorage.getItem('progress3');
        if (savedProgress) {
            const progress = parseInt(savedProgress);
            updateProgressBar3(progress);
        }
    }

    // Fungsi untuk memperbarui progres bar dan menyimpan progres di LocalStorage
    function updateProgress3() {
        const form = document.getElementById('form-orangtua');   
        const totalFields = form.elements.length - 1; // Exclude submit button
        let filledFields = 0;

        // Hitung jumlah field yang terisi
        for (let i = 0; i < totalFields; i++) {
            const field = form.elements[i];
            if (field.value.trim() !== "" || (field.type === "select-one" && field.value !== "")) {
                filledFields++;
            }
        }

        // Hitung persentase progres
        const progress = (filledFields / totalFields) * 100;

        // Update progres bar dan teks persentase
        updateProgressBar3(progress);

        // Simpan progres ke LocalStorage
        localStorage.setItem('progress3', progress);
    }

    // Fungsi untuk memperbarui progres bar berdasarkan persentase
    function updateProgressBar3(progress) {
        const progressBar = document.getElementById('progress3-bar-inner-orangtua');
        const progressText = document.getElementById('progress3-text-orangtua');
        progressBar.style.width = progress + '%';
        progressText.textContent = Math.round(progress) + '%';

        // Ubah warna berdasarkan progres
        if (progress < 50) {
            progressBar.style.backgroundColor = 'red'; // Merah jika kurang dari 50%
        } else if (progress < 80) {
            progressBar.style.backgroundColor = 'orange'; // Oranye jika antara 50% dan 80%
        } else {
            progressBar.style.backgroundColor = 'green'; // Hijau jika lebih dari 80%
        }
    }
</script>


<script>
	$('.form-control').keyup(function(event) {

        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_daftar.php?pg=simpandatadiri',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (data == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data Diri Anda berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    $('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_daftar.php?pg=simpanalamat',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (data == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data Alamat anda berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    $('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-orangtua').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                 url: 'mod_daftar/crud_daftar.php?pg=simpanortu',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (data == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data Orang Tua anda berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        // $("#form-datadiri").validate({
        //     rules: {
        //         "b[firstname]": {
        //             : true
        //         },
        //         "b[email]": {
        //             : true,
        //             email: true
        //         },
        //         "book[contact]": {
        //             : true
        //         }
        //     },
        //     submitHandler: function(form) {
        //         var formData = $(form).serialize();
        //         alert(formData); // for demo
        //         // comment out ajax for demo
        //         /*
        //         $.ajax({
        //             url: "bs_client_function.php?action=new_b",
        //             type: "post",
        //             data: formData,
        //             beforeSend: function () {

        //             },
        //             success: function (data) {

        //             }
        //         });
        //         */
        //     }
        // });

    });
</script>
