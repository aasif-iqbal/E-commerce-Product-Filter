<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filter_Model
 *
 * @author asif
 */

 class Filter_Model extends CI_Model
 {
     
    public function __construct() {
        parent::__construct();
            // $this->load->database();
    }

    public function getAll(){
        
        
        $query = "SELECT * FROM `tbl_products`";
   
          $q = $this->db->query($query);
         
         if ($q->num_rows() > 0) {
                return $q->result();       
           }   
           else {
               return NULL;
           }  
    }

    public function getBrandName()
    {
        $query = "SELECT brand_id,brand_name
                  FROM tbl_brands 
                  WHERE status ='1'";
   
          $q = $this->db->query($query);
       
         if ($q->num_rows() > 0) {
                return $q->result_array();       
           }   
           else {
               return NULL;
           }  
    }

    public function getColorName()
    {
        $query = "SELECT color_id,color_name
                  FROM tbl_colors 
                  WHERE status ='1'";
   
          $q = $this->db->query($query);
      
         if ($q->num_rows() > 0) {
                return $q->result_array();       
           }   
           else {
               return NULL;
           }  
    }

    public function getSize()
    {
        $query = "SELECT size_id,size_name
                  FROM tbl_sizes 
                  WHERE status ='1'";
   
          $q = $this->db->query($query);
        
         if ($q->num_rows() > 0) {
                return $q->result_array();       
           }   
           else {
               return NULL;
           }  
    }
    
   
    
    public function getProductData($limit, $offset, $brand_flag, $color_flag, $price_flag, $discount_flag)
    {
        $query = "SELECT * FROM tbl_products WHERE status ='1'";
        //$query = "SELECT TP.product_name,TB.brand_name,TP.product_image,TP.product_brand_id,TP.product_actual_price,TP.product_mrp,TP.product_discount FROM `tbl_products` AS TP INNER JOIN tbl_brands
        //          AS TB ON TP.status = TB.status WHERE TP.status ='1'";   

        if($brand_flag != 0){
         
            $query .= "AND product_brand_id  LIKE '$brand_flag%'";
        }
           
        if($color_flag != 0){
            
                $query .= "AND product_color_id  LIKE '$color_flag%'";
        }
     
        //For price-flag = 1 ie Rs. 199 to Rs. 599 
        if($price_flag == 1){
            
            $query .= "AND product_actual_price >= '199' AND  product_actual_price <= '599'";            
        }
        
        //For price-flag = 2 ie Rs. 599 to Rs. 999
         if($price_flag == 2){
            
            $query .= "AND product_actual_price >= '599' AND  product_actual_price <= '999'";            
        }

        //For price-flag = 3 ie Rs. 999 to Rs. 1999
        if($price_flag == 3){
                    
            $query .= "AND product_actual_price >= '999' AND  product_actual_price <= '1999'";            
        }

        //For price-flag = 4 ie Rs. 1999 to Rs. 2999
        if($price_flag == 4){
                            
            $query .= "AND product_actual_price >= '1999' AND  product_actual_price <= '2999'";            
        }

        //For price-flag = 5 ie Rs. 2999 to Rs. 5999
        if($price_flag == 5){
                            
            $query .= "AND product_actual_price >= '2999' AND  product_actual_price <= '5999'";            
        }

       
       
        //For discount-flag = 1 ie 20% and above
         if($discount_flag == 1){
            
            $query .= "AND product_discount >= '20' AND  product_discount <= '100'";            
        }

        //For discount-flag = 2 ie 20% and above
        if($discount_flag == 2){
            
            $query .= "AND product_discount >= '30' AND  product_discount <= '100'";            
        }

        //For discount-flag = 3 ie 20% and above
        if($discount_flag == 3){
            
            $query .= "AND product_discount >= '50' AND  product_discount <= '100'";            
        }

        //For discount-flag = 4 ie 20% and above
        if($discount_flag == 4){
            
            $query .= "AND product_discount >= '60' AND  product_discount <= '100'";            
        }

        //For discount-flag = 5 ie 20% and above
        if($discount_flag == 5){
            
            $query .= "AND product_discount >= '70' AND  product_discount <= '100'";            
        }

            $query .= "LIMIT $offset, $limit"; //offset->No. of records to skip and it will chnge after every click to nxt pg.
            //  exit($query);
          $q = $this->db->query($query);
        
         if ($q->num_rows() > 0) {
                return $q->result_array();       
           }   
           else {
               return NULL;
           }  
    }

    public function getRecordCount($brand_flag, $color_flag, $price_flag, $discount_flag)
    {
       
        $query = "SELECT COUNT(product_id) as count From tbl_products WHERE status='1' "; 
          
        if($brand_flag != 0){
         
            $query .= "AND product_brand_id LIKE '$brand_flag%'";
            }
           
       
        if($color_flag != 0){
         
             $query .= "AND product_color_id  LIKE '$color_flag%'";
        }

         //For price-flag = 1 ie Rs. 199 to Rs. 599 
         if($price_flag == 1){
            
            $query .= "AND product_actual_price >= '199' AND  product_actual_price <= '599'";            
        }
        
        //For price-flag = 2 ie Rs. 599 to Rs. 999
         if($price_flag == 2){
            
            $query .= "AND product_actual_price >= '599' AND  product_actual_price <= '999'";            
        }

        //For price-flag = 3 ie Rs. 999 to Rs. 1999
        if($price_flag == 3){
                    
            $query .= "AND product_actual_price >= '999' AND  product_actual_price <= '1999'";            
        }

        //For price-flag = 4 ie Rs. 1999 to Rs. 2999
        if($price_flag == 4){
                            
            $query .= "AND product_actual_price >= '1999' AND  product_actual_price <= '2999'";            
        }

        //For price-flag = 5 ie Rs. 2999 to Rs. 5999
        if($price_flag == 5){
                            
            $query .= "AND product_actual_price >= '2999' AND  product_actual_price <= '5999'";            
        }







          //For discount-flag = 1 ie 20% and above
          if($discount_flag == 1){
            
            $query .= "AND product_discount >= '20' AND  product_discount <= '100'";            
        }

        //For discount-flag = 2 ie 20% and above
        if($discount_flag == 2){
            
            $query .= "AND product_discount >= '30' AND  product_discount <= '100'";            
        }

        //For discount-flag = 3 ie 20% and above
        if($discount_flag == 3){
            
            $query .= "AND product_discount >= '50' AND  product_discount <= '100'";            
        }

        //For discount-flag = 4 ie 20% and above
        if($discount_flag == 4){
            
            $query .= "AND product_discount >= '60' AND  product_discount <= '100'";            
        }

        //For discount-flag = 5 ie 20% and above
        if($discount_flag == 5){
            
            $query .= "AND product_discount >= '70' AND  product_discount <= '100'";            
        }


        $q = $this->db->query($query);
        
        return $q->result_array()[0]['count']; 
    }

    // Insert record dynamically 

    public function addRecords()
    {
        
    }
}