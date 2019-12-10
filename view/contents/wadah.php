<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wepeak/model/wadah.php';
$wadah = get_wadah_all();
// var_dump($wadah);die();
 ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Wadah
                <div class="page-title-subheading">Manajemen Data Jenis Wadah Produksi.
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
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>
                                    Inbox
                                </span>
                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>
                                    Book
                                </span>
                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-picture"></i>
                                <span>
                                    Picture
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled href="javascript:void(0);" class="nav-link disabled">
                                <i class="nav-link-icon lnr-file-empty"></i>
                                <span>
                                    File Disabled
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Jenis Wadah
                <div class="btn-actions-pane-right">
                    <a href="<?='/wepeak/view/index.php?menu=wadah&action=insert'; ?>"
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
                        <th class="">Harga (Rupiah)</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach($wadah as $key => $data): ?>
                    <tr>
                        <td class="text-left text-muted"><?=$key+1;?></td>
                        <td class="text-left"><?=$data['jenis'];?></td>
                        <td class="text-left"><?=$data['isi'];?></td>
                        <td class="text-left"><?=$data['harga'];?>
                        </td>
                        <td class="text-left">
                            <a href=<?="index.php?menu=wadah&action=update&id=" . $data['id'];?> class="btn btn-warning btn-sm">Ubah</a>
                            <a href="<?="index.php?menu=wadah&action=delete&id=" . $data['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin Menghapus Data Tersebut?');">Hapus</a>
                          </form>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
