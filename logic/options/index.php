<?php
$admin = true;
require "../../files/php/config/require.php";
$id = _get("id");
$variable = Entity::load("Variable", $id);
$items = Entity::listMe("FieldOption","active AND Variable = '$id' ORDER BY id DESC");
$data = array();
$cont = 1;
foreach ($items as $key => $value) {

	$item = array();
	$cont++;
	$item["Id"] = $value->id;
	$item["Name"] = $value;
	$item["Actions"] = "<a href='edit.php?id=$value->id' class='btn btn-default btn-sm'>Edit</a> ";
	$item["Actions"] .= "<a data-href='delete.php?id=$value->id' class='btn btn-danger btn-sm ask' data-what=Are you sure?'>Delete</a> ";
	$data[] = $item;

}


echo "<div class='row'>";

echo "<div class='col-md-8 col-xs-6'>";
echo "<legend>Phenobooks</legend>";
echo "</div>";

echo "<div class='col-md-1'>";

echo "</div>";

echo "<div class='col-md-4'>";
echo "<a href='".__URL."logic/variables/index.php?id=".$variable->id."' class='btn btn-default'>Back to variable</a> ";
echo "<a href='add.php?id=".$id."' class='btn  btn-primary'>Add option</a>";
echo "</div>";

echo "</div>";

echo "<legend>Options of variable <span class='object-name'>$variable</span></legend>";

echo genTable($data);
require __ROOT."files/php/template/footer.php";
