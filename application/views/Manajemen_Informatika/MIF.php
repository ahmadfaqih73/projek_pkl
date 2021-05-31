<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- //tampilan data user -->
    <a href="<?php echo base_url('MIF/viewAdd') ?>" class="btn btn-primary">Add file</a>
    <br><br>
    <?php
    echo $this->session->flashdata('message');
    ?>
    <table class="table table-bordered text-center table-hover table-striped" id="tableMIF">
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto Mahasiswa</th>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Nama file</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach ($mhs_mif as $value) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['foto'] ?></td>
                    <td><?php echo $value['nim'] ?></td>
                    <td><?php echo $value['nama_mahasiswa'] ?></td>
                    <td><?php echo $value['nama_file'] ?></td>

                    <!-- Modal -->
                    <div class="modal fade" id="updateMIF<?= $value['Id_mhs_mif'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!--                                     <?php echo form_open_multipart('MIF/update_mhs_tif') ?> -->

                                    <form class="col-md-6" enctype="multipart/form-data" method="post" action="<?php echo base_url('MIF/update_mhs_mif') ?>">

                                        <!-- Id Pelanggan -->
                                        <input type="hidden" name="id" value="<?php echo $value['Id_mhs_mif'] ?>">

                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input type="text" class="form-control" name="nim" required="" value="<?php echo $value['nim'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama mahasiswa</label>
                                            <input type="text" class="form-control" name="nama_mahasiswa" required="" value="<?php echo $value['nama_mahasiswa'] ?>">
                                        </div>
                                        <div>
                                            <label for="varchar">Nama file</label>
                                            <input class="float-right" type="file" name="filename" value="<?php echo $value['nama_file'] ?>">
                                            <a class="float-left" target="_blank" href="<?php echo base_url('uploads/' . $value['nama_file']) ?>"><?php echo $value['nama_file'] ?></a>
                                            <input type="hidden" name="oldFiles" value="<?php echo $value['nama_file'] ?>">
                                        </div>
                                        <div>
                                            <label for="varchar">foto</label>
                                            <input class="float-right" type="file" name="foto_mhs" value="<?php echo $value['foto'] ?>">
                                            <a class="float-left" target="_blank" href="<?php echo base_url('uploads/' . $value['foto']) ?>"><?php echo $value['foto'] ?></a>
                                            <input type="hidden" name="oldFoto" value="<?php echo $value['foto'] ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success float-right">Update data</button>
                                        </div>
                                    </form>
                                    <!-- <?php echo form_close(); ?> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <td>
                        <a href="<?= base_url(); ?>MIF/lihat_MIF/<?= $value['Id_mhs_mif']; ?> " class=" fas fa-eye badge badge-primary"> detail</a>

                        <a href="" class="fas fa-edit badge badge-pill badge-success" data-toggle="modal" data-target="#updateMIF<?= $value['Id_mhs_mif'] ?>"> edit</a>

                        <a href="<?= base_url('MIF/hapus_mahasiswa_mif/' . $value['Id_mhs_mif']) ?> " class="fas fa-trash badge badge-pill badge-danger"> delete</a>
                    </td>

                    <!-- <td><a href="<?php echo base_url('pelanggan/hapus/' . $value['id_pelanggan']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data pelanggan <?php echo $value['nama_pelanggan'] ?> ?')">Remove</a></td> -->
                </tr>
            <?php $no++;
            } ?>

        </tbody>
    </table>







</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableTIF').DataTable();
    });
</script>