<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/Skills.php';
$database = new Database();
$db = $database->getConnection();

$item = new Skills($db);
$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

if ($item->deleteSkill()) {
    echo json_encode(["message" => "Skill deleted successfully."]);
} else {
    echo json_encode(["message" => "Data could not be deleted"]);
}
