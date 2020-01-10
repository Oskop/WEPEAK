<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/wadah.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/stokwadah.php';
$wadah = get_wadah_all();
$stokwadah = get_stokwadah_all();
// var_dump($stokwadah);die();
 ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Stok Wadah
                <div class="page-title-subheading">Manajemen Data Stok Wadah.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <!-- <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                </button> -->

            </div>
        </div>
      </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Stok Wadah
                <div class="btn-actions-pane-right">
                    <a href="<?='/wepeak/view/index.php?menu=stokwadah&action=insert'; ?>"
                      class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table-responsive" style="padding:10px;">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th class="">#</th>
                        <th>Nama Wadah</th>
                        <th class="">Isi</th>
                        <th class="">Stok</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody><?php if ($stokwadah != null): ?>
                      <?php foreach($stokwadah as $key => $data): ?>
                        <tr>
                          <td class="text-left text-muted"><?=$key+1;?></td>
                          <td class="text-left"><?=$data['nama'];?></td>
                          <td class="text-left"><?=$data['isi'];?></td>
                          <td class="text-left"><?=$data['jumlah'];?>
                          </td>
                          <td class="text-left">
                            <a href=<?="index.php?menu=stokwadah&action=update&id=" . $data['id_wadah'];?>
                              class="btn btn-warning btn-sm ubahData">Ubah</a>
                            <a href="<?="index.php?menu=stokwadah&action=delete&id=" . $data['id_wadah'];?>"
                              class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin Menghapus Data Tersebut?');">Hapus</a>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" class="text-center">
                          Data Stok Wadah Belum ditambahkan.
                        </td>
                      </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
