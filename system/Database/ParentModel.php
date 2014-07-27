<?php

namespace Database;

class ParentModel {
    /**
     * @var MySQL $db
     */
    private $db;
    protected $tablename;
    protected $idname = 'id';
    protected $structname;

    /**
     * @param MySQL $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    public function getByID($id) {
        $sql = "SELECT * FROM ".$this->tablename." WHERE `".$this->idname."`=".$id;
        $query = $this->db->query($sql);
        return $query->fetch(\PDO::FETCH_CLASS, $this->structname);
    }

    public function getAll() {
        $sql = "SELECT * FROM ".$this->tablename;
        $query = $this->db->query($sql);
        return $query->fetchAll(\PDO::FETCH_CLASS, $this->structname);
    }

    /**
     * @param ParentStruct $struct
     */
    public function save($struct) {
        if($struct->isModified) {
            if($struct->isNew) {
                $this->insert($struct);
            } else {
                $this->update($struct);
            }
        }
    }

    /**
     * @param ParentStruct $struct
     */
    private function insert($struct) {
        $columns = array_keys(get_object_vars($struct));
        $keys = array();
        $values = array();
        foreach($columns as $col) {
            if($col != 'isModified' && $col != 'isNew' && $col != $this->idname) {
                $keys[] = "`".$col."`";
                $values[] = '"'.$struct->$col.'"';
            }
        }
        $sql = "INSERT INTO ".$this->tablename."(".implode(',', $keys).") VALUES(".implode(',', $values).")";
        $this->db->query($sql);
        $lastid = $this->db->lastInsertID();
        $id = $this->idname;
        $struct->$id = $lastid;
    }

    /**
     * @param ParentStruct $struct
     */
    private function update($struct) {
        $columns = get_class_vars($struct);
        $updates = array();
        foreach($columns as $col) {
            if($col != 'isModified' && $col != 'isNew' && $col != $this->idname) {
                $updates[] = '`'.$col.'`="'.$struct->$col.'"';
            }
        }
        $id = $this->idname;
        $currentID = $struct->$id;
        $sql = "UPDATE ".$this->tablename." SET ".implode(',', $updates)." WHERE `".$id."`=".$currentID;
        $this->db->query($sql);
    }
} 