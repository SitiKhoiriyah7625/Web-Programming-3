<div class="container">
    <center>
        <table>
            <?php foreach ($agt_booking as $ab) { ?>
                <tr>
                    <td>Data Anggota</td>
                    <td>;</td>
                    <th><?= $ab['nama']; ?></th>
                </tr>
                <tr>
                    <td>ID Booking</td>
                    <td>;</td>
                    <td><?= $ab['id_booking']; ?></th>
                <tr>
            <?php } ?>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
        </table>
    </center>
</div>