<?php
// Proses edit dan delete data pegawai
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'edit') {
        $id_edit = $_GET['id'];
        $query_edit = "SELECT * FROM tb_pegawai WHERE id_pegawai = $id_edit";
        $result_edit = mysqli_query($koneksi, $query_edit);
        $data_edit = mysqli_fetch_array($result_edit);
        ?>
        <form action="?action=edit&id=<?php echo $id_edit; ?>" method="post">
            <table>
                <tr>
                    <td width="130">nama</td>
                    <td><input type="text" name="nama_edit" value="<?php echo $data_edit['nama']; ?>"></td>
                </tr>
                <tr>
                    <td width="130">alamat</td>
                    <td><input type="text" name="alamat_edit" value="<?php echo $data_edit['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td width="130">no telepon</td>
                    <td><input type="text" name="no_telp_edit" value="<?php echo $data_edit['no_telp']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="simpan" name="proses_edit"></td>
                </tr>
            </table>
        </form>
        <?php
        // Proses form edit data pegawai
        if (isset($_POST['proses_edit'])) {
            $nama_edit = $_POST['nama_edit'];
            $alamat_edit = $_POST['alamat_edit'];
            $no_telp_edit = $_POST['no_telp_edit'];

            $query_edit = "UPDATE tb_pegawai SET nama='$nama_edit', alamat='$alamat_edit', no_telp='$no_telp_edit' WHERE id_pegawai=$id_edit";
            $result_edit = mysqli_query($koneksi, $query_edit);

            if ($result_edit) {
                echo "Data pegawai berhasil diubah";
            } else {
                echo "Maaf, gagal mengubah data pegawai";
            }
        }
    } elseif ($_GET['action'] == 'delete') {
        $id_delete = $_GET['id'];
        $query_delete = "DELETE FROM tb_pegawai WHERE id_pegawai=$id_delete";
        $result_delete = mysqli_query($koneksi, $query_delete);

        if ($result_delete) {
            echo "Data pegawai berhasil dihapus";
        } else {
            echo "Maaf, gagal menghapus data pegawai";
        }
    }
}
?>

bujawan