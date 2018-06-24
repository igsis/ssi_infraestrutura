<?php
function recuperaInfoUsuario($idUser)
{
	//retorna uma array com indice 'numero' de registros e 'dados' da tabela
	$con = bancoMysqli();
	$sql = "SELECT * FROM users WHERE id = '$idUser'";
	$query = mysqli_query($con,$sql);
	$lista = mysqli_fetch_array($query);

	$sql_admin_user = "SELECT `users_id`, `admininstrators_id` FROM `administrators_users` WHERE `users_id` = $idUser";
	$query_admin_user = mysqli_query($con,$sql_admin_user);
	$adminUser = mysqli_fetch_array($query_admin_user);

	$campo = array(
		"idUser" => $lista['id'],
		"login" => $lista['login'],
		"local" => $lista['local'],
		"phone" => $lista['phone'],
		"email" => $lista['email'],
		"contact" => $lista['contact'],
		"address" => $lista['address'],
		"idRegion" => $lista['idRegion'],
		"operatingHours" => $lista['operatingHours'],
		"historicalBuilding" => $lista['historicalBuilding'],
		"dateCreated" => $lista['dateCreated'],
		"dateLastAccess" => $lista['dateLastAccess'],
		"idAdminUser" => $adminUser['admininstrators_id']
	);
	return $campo;
}
?>