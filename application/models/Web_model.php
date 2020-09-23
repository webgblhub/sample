<?php
class Web_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

        if(!$this->session->userdata('lang')){
            $this->session->set_userdata(array('lang' => 'en'));
        }
    }


    public function getData($table = '', $id = '')
    {
        if($id)
        {
            $sql = "SELECT * FROM $table WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            $result = $query->result_array();
        }
        else
        {
            $sql = "SELECT * FROM $table ORDER BY id DESC";
            $query = $this->db->query($sql, array());
            $result = $query->result_array();
        }
        return $result;
    }

 public function getDatas($table = '', $id = '')
    {
        if($id)
        {
            $sql = "SELECT * FROM $table WHERE id = ? AND status= ?";
            $query = $this->db->query($sql, array($id,1));
            $result = $query->result_array();
        }
        else
        {
            $sql = "SELECT * FROM $table  WHERE status= ? ORDER BY id DESC";
            $query = $this->db->query($sql, array(1));
            $result = $query->result_array();
        }
        return $result;
    }


    
   

   
   
    public function getContacts($category = '')
    {
        
            if($category)
            {
                $sql = "SELECT * FROM contacts WHERE slug = ?";
                $query = $this->db->query($sql, array( $category));
                $result = $query->result_array();
            }
            else
            {
                $sql = "SELECT * FROM contacts ";
                $query = $this->db->query($sql, array($category));
                $result = $query->result_array();
            }
            return $result;
        
    }
// ===============================================================================================

    public function getGallery($id = '')
    {
       
            if($id)
            {
                $sql = "SELECT * FROM boat_gallery WHERE boat_id = ? ";
                $query = $this->db->query($sql, array($id));
                $result = $query->row_array();
            }
            else
            {
                $sql = "SELECT * FROM boat_gallery ";
                $query = $this->db->query($sql, array());
                $result = $query->result_array();
            }
            return $result;
        
    }
// =============================================================================================

// =================================================================================================

    public function  getBasicData($slug = '', $field = '')
    {
        if($slug)
        {
            if($field)
            {
                $sql = "SELECT $field FROM basics WHERE slug = ? AND status = ?";
                $query = $this->db->query($sql, array($slug, 1));
                $result = $query->row_array();
                return $result[$field];
            }
            else
            {
                $sql = "SELECT * FROM basics WHERE slug = ? AND status = ?";
                $query = $this->db->query($sql, array($slug, 1));
                $result = $query->result_array();
                return $result;
            }
            
        }
    }

    public function getContactDetails($slug = '', $field = '')
    {
        if($slug)
        {
            if($field)
            {
                $sql = "SELECT $field FROM contacts WHERE slug = ? AND status = ?";
                $query = $this->db->query($sql, array($slug, 1));
                $result = $query->row_array();
                return $result[$field];
            }
            else
            {
                $sql = "SELECT * FROM contacts WHERE slug = ? AND status = ?";
                $query = $this->db->query($sql, array($slug, 1));
                $result = $query->result_array();
                return $result;
            }
            
        }
    }

    public function searchNews($term = '')
    {
        if($term)
        {
            $sql = "SELECT a.*, c.id AS cid, c.en_category, c.ml_category, c.slug AS cslug FROM articles a LEFT JOIN categories c ON c.id = a.category_id  WHERE a.en_title LIKE '%$term%' OR a.slug LIKE '%$term%' OR a.en_short_desc LIKE '%$term%' OR a.en_description LIKE '%$term%' OR c.en_category LIKE '%$term%' OR c.slug LIKE '%$term%' AND a.status = ?";
            $query = $this->db->query($sql, array(1));
            $result = $query->result_array();
        }
        else
        {
            $sql = "SELECT a.*, c.id AS cid, c.en_category, c.ml_category, c.slug AS cslug FROM articles a LEFT JOIN categories c ON c.id = a.category_id WHERE a.status = ?";
            $query = $this->db->query($sql, array(1));
            $result = $query->result_array();
        }
        return $result;
    }

    public function getSocials($id = '')
    {
        if($id)
        {
            $sql = "SELECT * FROM socials WHERE id = ? AND status = ?";
            $query = $this->db->query($sql, array($id, 1));
            $result = $query->row_array();
        }
        else
        {
            $sql = "SELECT * FROM socials WHERE status = ?";
            $query = $this->db->query($sql, array(1));
            $result = $query->result_array();
        }
        return $result;
    }

   

    public function makeOptions($table = '', $field = '',$active = '')
    {
        if($table && $field)
        {
            $sql = "SELECT * FROM $table ORDER BY $field";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $options = '';

            foreach ($result as $res) 
            {
                if($active == $res['slug']){ $selected = "selected"; } else { $selected = ""; }
                $options .= '<option value="'.$res['slug'].'" '. $selected.'>'.$res[$field].'</option>';
            }

            echo $options;
        }        
        else
        {
            return FALSE;
        }
    }

}