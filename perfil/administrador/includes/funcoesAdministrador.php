<?php
function listaUser($idAdm,$select)
{
	//gera os options de um select
	$sql = "SELECT * FROM users INNER JOIN administrators_users ON users.id = administrators_users.users_id WHERE administrators_users.admininstrators_id = $idAdm";

	$con = bancoMysqli();
	$query = mysqli_query($con,$sql);
	while($option = mysqli_fetch_row($query))
	{
		if($option[0] == $select)
		{
			echo "<option value='".$option[0]."' selected >".$option[1]."</option>";
		}
		else
		{
			echo "<option value='".$option[0]."'>".$option[1]."</option>";
		}
	}
}
?>