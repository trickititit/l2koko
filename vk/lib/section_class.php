<?php
/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 09.07.2016
 * Time: 20:05
 */

require_once "global_class.php";

class Section extends GlobalClass
{
    public function __construct($db)
    {
        parent::__construct("section", $db);
    }

    public function addSection($new_values)
    {
        return $this->add($new_values); // TODO: Change the autogenerated stub
    }

    public function editSection($id, $title, $desc) {
        return $this->edit($id, array("title" => $title, "descripton" => $desc));
    }

    public function deleteSection($id)
    {
        return $this->delete($id); // TODO: Change the autogenerated stub
    }

    public function getLast() {
        return $this->getLastIDIn();
    }
}