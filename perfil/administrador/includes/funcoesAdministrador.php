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

<?php
function recuperaInfoAdministrador($idAdm)
{
	//retorna uma array com indice 'numero' de registros e 'dados' da tabela
	$con = bancoMysqli();
	$sql = "SELECT * FROM administrators WHERE id = '$idAdm'";
	$query = mysqli_query($con,$sql);
	$lista = mysqli_fetch_array($query);

	$campo = array(
		"idAdm" => $lista['id'],
		"login" => $lista['login'],
		"local" => $lista['local'],
		"phone" => $lista['phone'],
		"email" => $lista['email'],
		"dateCreated" => $lista['dateCreated']
	);
	return $campo;
}
?>