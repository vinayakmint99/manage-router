<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

   // Fetch users
   function getUsers(){

      // Fetch users
      $this->db->select('*');
      $fetched_records = $this->db->get('users2');
      $users = $fetched_records->result_array();

      return $users;
    }

    // Update record
    function updateUser($id,$field,$value){
        
        // Update
        $data=array($field => $value);
        $this->db->where('id',$id);
        $this->db->update('users2',$data);
    }

}