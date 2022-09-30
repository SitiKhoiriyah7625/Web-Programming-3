div class="container">
   <center>
      <table>
         <tr>
              <td>
                   <div class="table-responsive full-width">
                       <table class="table table-bordered table-striped tablehover" id="table-datatable">
                           <tr>
                                <th>No. </th>
                                <th>ID Booking</th>
                                <th>Tanggal Booking</th>
                                <th>ID
                                    User</th>
                                <th>Aksi</th>
                                <th>Denda / Buku /Hari</th>
                                <th>Lama Pinjam</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($pinjam as $p) {
                            ?>
                                <tr>
                                     <td><?= $no; ?></td>
                                     <td><a class"btn btn-link" href="<?= base_url('pinjam/boongDetail')
                                     <td><?= $p['tgl_booking']; ?></td>
                                     <td><?= $p['id_user']; ?></td>

                                     form action="<?= base_url('pinjam/pinjamAct/' . $p['id_booking']
                                        <td nowrap><button type="submit" class="btn btn-sm btn-outline
                                        <td>
                                            <input class="form-checkuser rounded-sm" style="width:100
                                            <?
                                            form_error();
                                            ?>
                                        