
<?php 
	require_once 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
	$id = intval($_GET['id']);
	$napthe = $db->fetchID('users', $id);
	$tien = intval($napthe['taikhoan']);
    


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$tien = $tien + $_POST['taikhoan'];
		$data = [
			"taikhoan" => $tien,
		];
		
    $error = [];
    
    if (empty($error)) {
        $update = $db->update("users", $data, array('id' => $id));
        if ($update > 0) {
            $_SESSION['success'] = "Cập nhật thành công";
            redirect("index.php");
        } else {
            $_SESSION['error'] = "Cập nhật thất bại";
        }
 
    }

}

 ?>
<div style="margin: 0 auto; width: 500px;">
	<h3 style="margin-bottom: 20px;"><span class="label label-primary">Nạp thẻ cào trực tuyến</span></h3>
	<form action="#" method="POST" id="fnapthe" name="fnapthe">
		<input  type="hidden" name="fnapthe" value="ok"/>
		<table class="table table-condensed table-bordered">
			<tbody>                        
				<tr>
					<td>Loại thẻ</td>
					<td>
						<select name="card_type_id" style="width: 390px;border: 1px solid #ccc;height: 30px;">
							<option value="1">Viettel</option>
							<option value="2">Mobiphone</option>
							<option value="3">Vinaphone</option>
							<option value="4">Gate</option>
							<option value="6">Vietnammobile</option>
							<option value="7">Megacard</option>
							<option value="8">OnCash</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Mã thẻ</td>
					<td><input type="text" value="" name="taikhoan" style="width: 390px;border: 1px solid #ccc;height: 30px;"/></td>
				</tr>
				<tr>
					<td>Seri</td>
					<td><input type="text" value="" name="seri" style="width: 390px;border: 1px solid #ccc;height: 30px;"/></td>
				</tr>
				
			</tbody>
		</table>
		<center>
			<input class="btn btn-primary" type="submit" value="Nạp thẻ"/> 
			
		</center>
	</form>
</div>