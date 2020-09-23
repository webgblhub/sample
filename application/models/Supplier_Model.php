<?php
	class Supplier_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}
       
       public function selectCategory()
		{   
			$this->db->select('*');
			$this->db->from('supplier_category');
			$this->db->order_by('category','ASC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;

		}

		public function selectStoreFront($id)
		{
			$this->db->select('storefront_business.*,supplier_category.*,storefront_business.id as storeid');
			$this->db->from('storefront_business');
			$this->db->join('supplier_category','cat_id=category_id');
			$this->db->where('supplier_id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function selectBadge()
		{
			$this->db->select('badge');
			$this->db->from('site_config');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function change_order($data)
			{

				$this->db->update_batch('supplier_photos',$data, 'id'); 
				// $this->db->where('id',$data['id']);
				// $this->db->update('supplier_photos', $data);
				return "ok";

			}






		
		
		public function selectStatus($store)
		{
			//$query=$this->db->query('SELECT
//			storefront_business.id,
//			(SELECT COUNT(*) FROM supplier_bank_details WHERE supplier_bank_details.switch_id = storefront_business.id) +
//			(SELECT COUNT(*) FROM supplier_photos WHERE supplier_photos.switch_id = storefront_business.id)+
//			(SELECT COUNT(*) FROM supplier_product_packages WHERE supplier_product_packages.switch_id = storefront_business.id)+
//			(SELECT COUNT(*) FROM supplier_promo WHERE supplier_promo.switch_id = storefront_business.id)+
//			(SELECT COUNT(*) FROM supplier_videos WHERE supplier_videos.switch_id = storefront_business.id)
//		FROM
//			storefront_business');
//	  		$row= $query->result();
//	  		return $row;
			$sql="SELECT
			storefront_business.id,
			(SELECT COUNT(*) FROM supplier_product_packages WHERE supplier_product_packages.switch_id = storefront_business.id)+
			(SELECT COUNT(*) FROM supplier_bank_details WHERE supplier_bank_details.switch_id = storefront_business.id)+
			(SELECT COUNT(*) FROM supplier_photos WHERE supplier_photos.switch_id = storefront_business.id)
			FROM
			storefront_business";    
			$query = $this->db->query($sql);
			
			return $query->result();
		}























		public function lists()
		{
			$this->db->select('*');
			$this->db->from('event_dragon_users');
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		$su_count=count($row);
	  		
	  		for($i=0;$i<$su_count;$i++)
	  		{
	  			$row[$i]->category=0;
	  			
	  			$this->db->select('category as cat');
				$this->db->from('storefront_business');
				$this->db->join('supplier_category','category_id=cat_id');
				$this->db->where('supplier_id',$row[$i]->id);
				$query1 = $this->db->get();
		  		$row1 = $query1->result();
		  		$c=count($row1);
		  		$j=1;
		  		foreach($row1 as $r)
		  		{
		  			if($row[$i]->category=="0")
		  			{
		  				$row[$i]->category=$r->cat;
		  			}
		  			else
		  			{
		  				if($j<3)
		  				{
		  				$row[$i]->category=$row[$i]->category.", ".$r->cat;
		  				$j++;
		  				}
		  				else
		  				{
		  					$row[$i]->category=$row[$i]->category.", <br>".$r->cat;
		  					$j=1;
		  				}


		  			}
		  		}
		  		

	  		}

	  		
			return $row;
		}

		public function listsbyCategoryId($id)
		{
			$this->db->select('*');
			$this->db->from('event_dragon_users');
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		$su_count=count($row);
	  		
	  		for($i=0;$i<$su_count;$i++)
	  		{
	  			$row[$i]->category=0;
	  			
	  			$this->db->select('category as cat');
				$this->db->from('storefront_business');
				$this->db->join('supplier_category','category_id=cat_id');
				$this->db->where('supplier_id',$row[$i]->id);
				$this->db->where('storefront_business.category_id',$id);
				$query1 = $this->db->get();
		  		$row1 = $query1->result();
		  		$c=count($row1);
		  		$j=1;
		  		foreach($row1 as $r)
		  		{
		  			if($row[$i]->category=="0")
		  			{
		  				$row[$i]->category=$r->cat;
		  			}
		  			else
		  			{
		  				if($j<3)
		  				{
		  				$row[$i]->category=$row[$i]->category.", ".$r->cat;
		  				$j++;
		  				}
		  				else
		  				{
		  					$row[$i]->category=$row[$i]->category.", <br>".$r->cat;
		  					$j=1;
		  				}


		  			}
		  		}
		  		

	  		}

	  		
			return $row;
		}
		
		public function actlists($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				//$this->db->order_by('roles.title', 'ASC');
				$this->db->order_by('id', 'ASC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$this->db->where('status',1);
				$query = $this->db->get('roles');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('roles', array('id' => $id));
			return $query->row_array();
		}

		public function update($data,$id){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
            $this->db->where('id',$id);
            return $this->db->update('event_dragon_users', $data);
            //echo $this->db->last_query();
		}
		
		public function get($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
		
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				//$this->db->order_by('roles.title', 'ASC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('event_dragon_users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('event_dragon_users', array('id' => $id));
			return $query->row_array();
        }
        function get_category(){
            $query = $this->db->get('supplier_category');
			return $query->result();
        }
        function get_business($user_id){
            $query = $this->db->where("storefront_business.supplier_id",$user_id)
            ->select("storefront_business.*,supplier_category.*")
            ->from("storefront_business")
            ->join("supplier_category","supplier_category.cat_id=storefront_business.category_id","left")
            ->get();

            return $query->result_array();

        }
        function get_user($user_id){
            $this->db->where('id',$user_id);
            $query = $this->db->get('event_dragon_users');
			return $query->row();
        }
       
        function get_cat_name($cat_id){
            $this->db->where('cat_id',$cat_id);
            $query = $this->db->get('supplier_category');
			return $query->result();
        }

        
        public function Select_businessid($id)
        {
        	$this->db->where('id',$id);
            $query = $this->db->get('storefront_business');
			return $query->result();

        }

        public function Select_businesscount($id)
        {
        	$this->db->select('*');
			$this->db->from('storefront_business');
			$this->db->where('business_id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		$count=count($row);
	  		return $count;
        }

         public function deleteStoreFront($id,$c,$b)
	    {
	    	
	    	$this->db->select('*');
			$this->db->from('supplier_product_packages');
			$this->db->where('switch_id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		//print_r($b);die;

	    	$this->db->where('id',$id);
	    	$this->db->delete('storefront_business');
	    	if($c==1 && (!empty($b[0]->business_id)))
	    	{
	    	$this->db->where('id',$b[0]->business_id);
	    	$this->db->delete('supplier_business');
	    	}

	    	$this->db->where('switch_id',$id);
	    	$this->db->delete('supplier_promo');

	    	$this->db->where('switch_id',$id);
	    	$this->db->delete('supplier_product_packages');
 if(!empty($row[0]->id))
 {
	    	$this->db->where('package_id',$row[0]->id);
	    	$this->db->delete('supplier_products');
	    }

	    	$this->db->where('switch_id',$id);
	    	$this->db->delete('supplier_bank_details');

	    	$this->db->where('switch_id',$id);
	    	$this->db->delete('supplier_photos');

	    	$this->db->where('switch_id',$id);
	    	$this->db->delete('supplier_videos');

	    	$this->db->where('store_front_id',$id);
	    	$this->db->delete('event_lead');

	    	$this->db->where('supplier_id',$b[0]->supplier_id);
	    	$this->db->where('category_id',$b[0]->category_id);
	    	$this->db->delete('supplier_reviews');


	    	
	    	$result = $this->db->affected_rows();
	    	if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
	    }
     
	     public function deleteSupplier($id)
	     {
	     	$this->db->select('*');
			$this->db->from('supplier_product_packages');
			$this->db->where('supplier_id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		//print_r($b);die;

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('storefront_business');
	    	
	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('supplier_business');
	    	

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('supplier_promo');

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('supplier_product_packages');

	    	if(!empty($row))
	    	{
	    	$this->db->where('package_id',$row[0]->id);
	    	$this->db->delete('supplier_products');
	    	}

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('supplier_bank_details');

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('supplier_photos');

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('supplier_videos');

	    	$this->db->where('supplier_id',$id);
	    	$this->db->delete('event_lead');

	    	$this->db->where('supplier_id',$id);
	      	$this->db->delete('supplier_reviews');

	    	$this->db->where('id',$id);
	      	$this->db->delete('event_dragon_users');



	    	
	    	$result = $this->db->affected_rows();
	    	if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
	     }

	     // Jish Edited
		 
	function old_password($password,$supplier_id){
        	$this->db->select('*');
			$this->db->from('event_dragon_users');
			$this->db->where('id',$supplier_id);
         	$query = $this->db->get();
	  		$result= $query->result();
			//print_r($result);exit;
        	return password_verify($password, $result[0]->password) ? true : false;
    } 
	
	function change_password($data,$supplier_id){
        $this->db->where('id',$supplier_id);
         $query = $this->db->update('event_dragon_users', $data);
         $result = $this->db->affected_rows();

        if($result)
        {
			return TRUE;
        }
        return FALSE;
    }
		
		
		}
