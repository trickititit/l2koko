<?php

/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 09.07.2016
 * Time: 20:01
 */

require_once "global_class.php";

class Object extends GlobalClass
{
    public $order;
    public $up;
    public function __construct($db)
    {
        parent::__construct("objects", $db);
        $this->order = "date";
        $this->up = false;
    }

    public function getAllSortDate() {
        return $this->getAll("id", false);
    }    
    
    //COUNT

    public function getCountAll(){
        return $this->getCountOnFields(array("deleted_id" => "0", "obj_moderation" => "0"));
    }
    
    public function getCountMy($user_id) {
        return $this->getCountOnFields(array("created_id" => $user_id, "deleted_id" => "0", "completed_id" => "0", "obj_moderation" => "0"));
    }

    public function getCountUserMy($user_id) {
        return $this->getCountOnField("obj_user_created", $user_id);
    }

    public function getCountInWork($user_id) {
        return $this->getCountOnFields(array("working_id" => $user_id, "deleted_id" => "0", "completed_id" => "0", "obj_moderation" => "0"));
    }

    public function getCountCompleted($user_id) {
        return $this->getCountOnFields(array("completed_id" => $user_id, "deleted_id" => "0", "obj_moderation" => "0"));
    }

    public function getCountPreWorking() {
        return $this->getCountOnFields(array("deleted_id" => "0"), array("pre_working_id" => "0", "obj_moderation" => "0"));
    }
    
    public function getCountDeleted() {
        return $this->getCountOnNoField("deleted_id", "0");
    }

    public function getCountModer() {
        return $this->getCountOnField("obj_moderation", "1");
    }

    //OBJ ДОБАВИТЬ НЕ ПОКАЗЫВАТЬ КОТОРЫЕ НА МОДЕРАЦИИ

    public function getAllObj(){
        return $this->getAllOnFields(array("deleted_id" => "0", "obj_moderation" => "0"), array(), $this->order, $this->up);
    }
    
    public function getDeleted(){
        return $this->getAllOnFields(array(), array("deleted_id" => "0"), $this->order, $this->up);
    }

    public function getModer(){
        return $this->getAllOnFields(array("obj_moderation" => "1", "deleted_id" => "0", "completed_id" => "0"), array(), $this->order, $this->up);
    }

    public function getMy($user_id){
        return $this->getAllOnFields(array("created_id" => $user_id, "deleted_id" => "0", "completed_id" => "0", "obj_moderation" => "0"), array(), $this->order, $this->up);
    }

    public function getUserMy($user_id){
        return $this->getAllOnFields(array("obj_user_created" => $user_id), array(), $this->order, $this->up);
    }


    public function getInWork($user_id){
        return $this->getAllOnFields(array("working_id" => $user_id, "deleted_id" => "0", "completed_id" => "0", "obj_moderation" => "0"), array(), $this->order, $this->up);
    }

    public function getSpecOffer(){
        return $this->getAllOnFields(array("obj_spec_offer" => "1", "deleted_id" => "0"), array(), $this->order, $this->up);
    }

    public function getCompleted($user_id){
        return $this->getAllOnFields(array("completed_id" => $user_id, "deleted_id" => "0", "obj_moderation" => "0"), array(), $this->order, $this->up);
    }

    public function getPreWorking(){
        return $this->getAllOnFields(array("deleted_id" => "0", "obj_moderation" => "0"), array("pre_working_id" => "0"), $this->order, $this->up);
    }
    
    public function getAllOnField_($field, $value)
    {
        return $this->getAllOnField($field, $value, $this->order, $this->up); // TODO: Change the autogenerated stub
    }


    public function editInWork($obj_id, $user_id){
        return $this->edit($obj_id, array("created_id" => $user_id,"working_id" => $user_id, "pre_working_id" => "0", "completed_id" => "0", "date" => time()));
    }

    public function editActivate($obj_id, $date){
        return $this->edit($obj_id, array("completed_id" => "0", "activate_state" => 1, "date" => $date));
    }

    public function editCancelInWork($obj_id){
        return $this->edit($obj_id, array("working_id" => "0", "pre_working_id" => "0"));
    }

    public function editInPreWork($obj_id, $user_id){
        return $this->edit($obj_id, array("pre_working_id" => $user_id));
    }

    public function editPreDelete($obj_id, $user_id){
        return $this->edit($obj_id, array("deleted_id" => $user_id));
    }

    public function editCancelDelete($obj_id){
        return $this->edit($obj_id, array("deleted_id" => "0"));
    }
    
    public function editDelete($obj_id){
        return $this->delete($obj_id);
    }
    
    public function getAllFavoritesOnIds($arrayids){
        return $this->getAllOnIds($arrayids);
    } 
    
    public function doCompleted($obj_id, $competed_id) {
        return $this->edit($obj_id, array("completed_id" => $competed_id));
    }  
    
    public function getObjOnId($id) {
        return $this->get($id);
    }

    public function addObjType_1 ($comment, $comforts, $data, $geo, $type, $deal, $form, $city, $area, $address, $room, $floor, $build_type, $home_floors, $square, $kadastr, $desc, $price_square, $price, $doplata, $contacts, $created_id = 0, $user_created = 0, $public = 0, $spec_offer = 0, $moder = 0) {
        if (!$this->checkValidObj()) return false;
        return $this->add(array("obj_desc_short" => $comment, "obj_comforts" => $comforts, "date" => $data,"obj_geo" => $geo, "obj_category" => $type, "obj_deal" => $deal, "obj_type" => $form, "obj_city" => $city, "obj_area" => $area, "obj_address" => $address, "obj_rooms" => $room, "obj_build_type" => $build_type, "obj_floor" => $floor, "obj_square" => $square, "obj_home_floors" => $home_floors, "obj_kadastr" => $kadastr, "obj_desc" => $desc, "obj_price_square" => $price_square, "obj_price" => $price, "obj_doplata" => $doplata, "obj_client_contact" => $contacts, "created_id" => $created_id, "obj_user_created" => $user_created, "obj_spec_offer" => $spec_offer, "obj_public" => $public, "obj_moderation" => $moder));
    }

    public function addObjType_2 ($comment, $comforts, $data, $geo, $type, $deal, $form, $city, $area, $address, $distance, $earth_square, $build_type, $home_floors, $square, $kadastr, $desc, $price_square, $price, $doplata ,$contacts, $created_id = 0, $user_created = 0, $public = 0, $spec_offer = 0, $moder = 0) {
        if (!$this->checkValidObj()) return false;
        return $this->add(array("obj_desc_short" => $comment, "obj_comforts" => $comforts, "date" => $data,"obj_geo" => $geo, "obj_category" => $type, "obj_deal" => $deal, "obj_type" => $form, "obj_city" => $city, "obj_area" => $area, "obj_address" => $address, "obj_distance" => $distance, "obj_build_type" => $build_type, "obj_earth_square" => $earth_square, "obj_house_square" => $square, "obj_home_floors" => $home_floors, "obj_kadastr" => $kadastr, "obj_desc" => $desc, "obj_price_square" => $price_square, "obj_price" => $price, "obj_doplata" => $doplata, "obj_client_contact" => $contacts,"obj_user_created" => $user_created, "created_id" => $created_id, "obj_spec_offer" => $spec_offer, "obj_public" => $public, "obj_moderation" => $moder));
    }

    public function editObjType_2 ($comment, $comforts, $id, $type, $deal, $form, $city, $area, $address, $distance, $earth_square, $build_type, $home_floors, $square, $kadastr, $desc, $price_square, $price, $doplata, $contacts, $spec_offer, $public) {
        if (!$this->checkValidObj()) return false;
        return $this->edit($id, array("obj_desc_short" => $comment, "obj_comforts" => $comforts, "obj_category" => $type, "obj_deal" => $deal, "obj_type" => $form, "obj_city" => $city, "obj_area" => $area, "obj_address" => $address, "obj_distance" => $distance, "obj_build_type" => $build_type, "obj_earth_square" => $earth_square, "obj_house_square" => $square, "obj_home_floors" => $home_floors, "obj_kadastr" => $kadastr, "obj_desc" => $desc, "obj_price_square" => $price_square, "obj_price" => $price, "obj_doplata" => $doplata, "obj_client_contact" => $contacts, "obj_spec_offer" => $spec_offer, "obj_public" => $public));
    }
    
    public  function editObjType_1 ($comment, $comforts, $id, $type, $deal, $form, $city, $area, $address, $room, $floor, $build_type, $home_floors, $square, $kadastr, $desc, $price_square, $price, $doplata, $contacts, $spec_offer, $public) {
        if (!$this->checkValidObj()) return false;
        return $this->edit($id, array("obj_desc_short" => $comment, "obj_comforts" => $comforts, "obj_category" => $type, "obj_deal" => $deal, "obj_type" => $form, "obj_city" => $city, "obj_area" => $area, "obj_address" => $address, "obj_rooms" => $room, "obj_build_type" => $build_type, "obj_floor" => $floor, "obj_square" => $square, "obj_home_floors" => $home_floors, "obj_kadastr" => $kadastr, "obj_desc" => $desc, "obj_price_square" => $price_square, "obj_price" => $price, "obj_doplata" => $doplata, "obj_client_contact" => $contacts, "obj_spec_offer" => $spec_offer, "obj_public" => $public));
    }

    public function searchObj ($fieldsandvalues) {
        if (!$this->checkValidObj()) return false;
        return $this->search($fieldsandvalues, $this->order, $this->up);
    }

    private function checkValidObj(){
        return true;
    }
    
    public function getLast() {
        return $this->getLastIDIn();
    }

    public function delete($id)
    {
        return parent::delete($id);
    }

    public function getAllComfortsOnObj($id) {
        $comfortsString = $this->getField("obj_comforts", "id", $id);
        if ($comfortsString != "") {
            return explode(",", $comfortsString);
        } else {
            return false;
        }

    }
    
    

}