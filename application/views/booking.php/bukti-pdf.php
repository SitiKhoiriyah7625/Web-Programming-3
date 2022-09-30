<table>
    <?php
    foreach ($useraktif as $u) {
    ?>
        <tr>
             <td nowrap>Nama Anggota : <b><?= $u->nama; ?></b>
             </td>
        </tr>
        </tr>
              <td>Buku yang dibooking: </td>
        </tr>
    <?php } ?>
    <tr>
        <td>
            <div class="table-responsive">
                <table border="1" width="100%">

                    <tr>
                         <th>No.</th>
                         <th>Buku</th>
                         <th>Penulis</th>
                         <th>Penerbit</th>
                         <th>Tahun</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($items as $i) {
                    ?>
                       <tr>
                           <td><?= $no; ?></td>
                           <td><?= $i['judul_buku']; ?></td>
                           <td nowrap><?= $i['pengarang']; ?></td>
                           <td nowrap><?= $i['penerbit']; ?></td>
                           <td nowrap><?= $i['tahun_terbit']; ?></td>
                       </tr>
                    <?php $no++;
                    } ?>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td>  
            <hr>
        <td>
    <tr>
    <tr>
         <td align="center">
             <?= md5(date('d M Y H:i:s')); ?>
         </td>
    </tr>
</table>
