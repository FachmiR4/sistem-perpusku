<?php
include("../app/connection.php");
$koneksi = new database();
$table = "master_buku";
$table2 = "master_penerbit";
$table3 = "master_penulis";
$id = $_GET['id'];
$optionsPenerbit = $koneksi->tampil_data_penerbit();
$optionsPenulis = $koneksi->tampil_data_penulis();
$data = $koneksi->edit($table, $table2, $table3 ,$id);

foreach($data as $dataset){
?>

<html>
    <head>
    </head>
    <body>
        <form action="app/proses.php?page=master_buku&&act=editData" method="POST">
           <table>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <tr>
                <td>judul buku</td>
                <td>:</td>
                <td><input type="text" name="jdl_buku" value="<?php echo $dataset['judul_buku'];?>"></td>
            </tr>
            <tr>
                <td>penerbit</td>
                <td>:</td>
                <td><select name="penerbit">
                    <?php foreach ($optionsPenerbit as $option) { ?>
			    	<option value="<?php echo $option['id']; ?>" <?php echo $dataset['penerbit_id'] == $option['id'] ? 'selected': '';?>><?php echo $option['penerbit']; ?></option>
			    <?php } ?>
                </select>
                </td>
            </tr>
            <tr>
            <td>penulis</td>
                <td>:</td>
                <td><select name="penulis">
                    <?php foreach ($optionsPenulis as $option) { ?>
			    	<option value="<?php echo $option['id']; ?>" <?php echo $dataset['penulis_id'] == $option['id'] ? 'selected': '';?>><?php echo $option['penulis']; ?> </option>
			    <?php } ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>stok</td>
                <td>:</td>
                <td><input type="text" name="stock" value="<?php echo $dataset['qty'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="submit"></td>
            </tr>
           </table> 
        </form>
        <?php } ?>
    </body>
</html>