<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{		
		parent::__construct();
       
		$this->load->helper("url");
		$this->load->model('filter_model'); 
	}	

	public function index()
	{
		$data['brand_name'] = $this->filter_model->getBrandName();
		$data['color_name'] = $this->filter_model->getColorName();
		$data['size'] = $this->filter_model->getSize();

		$this->load->view('product_filter', $data);
		
	}

	public function generateRecordsDynamically()
	{
		// get last id
		// $image_array = [''];
		/*
		//For Strings
		$input = ["January", "February", "March", "April", "May", "June", "July"];
 
		$rand_keys = array_rand($input, 2);
		echo $input[$rand_keys[0]] . "\n";
		echo $input[$rand_keys[1]] . "\n";

		//For numbers
		$items = Array(1,2,3,4,5);
		echo $items[array_rand($items)];

		*/

	}

	public function product_filter_ajax()
	{
		//post-data
		$pageNumber = $this->input->post('pgNum');
		$per_page = $this->input->post('perPg');
		
		$brand_flag = $this->input->post('brand_flag');
        $color_flag = $this->input->post('color_flag');
		$price_flag = $this->input->post('price_flag');
		$discount_flag = $this->input->post('discount_flag');
		
    //    echo json_encode($price_flag);die();
        //-----------Getting total Number of  Records From database------------------
        $total_rows = $this->filter_model->getRecordCount($brand_flag, $color_flag, $price_flag, $discount_flag);
      //  echo json_encode($total_rows);die();


		$linkData = $this->createLink($pageNumber, $per_page, $total_rows, $brand_flag,$color_flag, $price_flag, $discount_flag);
        // print_r($linkData['total_pages']);die(); 

										// Limit-$per_page, offset-$linkData['offset']
		$tableData = $this->filter_model->getProductData($per_page, $linkData['offset'],$brand_flag, $color_flag, $price_flag, $discount_flag);
			// var_dump($tableData);
		echo json_encode(array('perPageOptions' => $linkData['perPageOptions'],
                                'pageLink' => $linkData['pageLink'],
                                'tableData' => $tableData,
                                'totalRow' => $linkData['total_pages'],
                                'currentPg'=>$linkData['current_page']
                                ));
	}

    // ############################ pagination library ##################################
    private function createLink($i, $per_page, $total_rows, $brand_flag, $color_flag,$price_flag,$discount_flag){ // here $i is requested Page
		// print_r($i); // 1
		// print_r($per_page); //10
		// print_r($total_rows); // 32054
		//-------------calculating total number of pages---------------------------------------
				$l = 0;  // Total Number Of Page
				if($total_rows % $per_page){
					$l=intval($total_rows/$per_page)+1;
				}
				else{
					$l=intval($total_rows/$per_page);
				}
			   
				if($l==1){ $i=1;}
		
				//------------Page Link Configuration -------------------------
				$config=[
					"full_tag_open" => "<ul class='pagination'>",
					"full_tag_close" => "</ul>",
		
					"first_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct(1 '.",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">First'.'</a></li>',
					
					//search for $link.=$config['last_tag']; and uncomment
					"last_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct('.$l.",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">Last'.'</a></li>',
		
		
					"next_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct('.($i+1).",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">>'.'</a></li>',
					"next_tag_mute" => '<li class="page-item"><p class="page-link">></p></li>',
					 
		
					"prev_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct('.($i-1).",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link"><'.'</a></li>',
					"prev_tag_mute" => '<li class="page-item"><p class="page-link"><</p></li>',
					
		
					"num_tag_open" => '<li class="page-item"><a href="javascript:void(0)" onclick="showProduct(',
					"num_tag_mid" => ')" class="page-link">',
					"num_tag_close" =>'</a></li>',
		
					"cur_tag" => '<li class="page-item active"><a href="javascript:void(0)" onclick="showProduct('.$i.",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">'.$i.'</a></li>',
					
				];
		
				//--------------- Creating Page Link ---------------------------------------------
					$pageLink = $this->pageLinkFun($config,$i,$l,$brand_flag,$color_flag,$price_flag, $discount_flag);
		
				// ---------------------Creating Per Page Options----------------------------------
					$perPageOptions = $this->perPageOptionsFun($per_page);
		
				// --------------------- Getting Offset -------------------------------------------
		
					$offset=$this->calculateOffset($i,$per_page);
				//  print_r($l);die();// total pg no
				//------Putting Page Link, Per Page Options And offset  into one array ------------
					$linkData=array(
						'pageLink' => $pageLink,
						'perPageOptions' => $perPageOptions,
						'offset' => $offset,
						'total_pages'=>$l,
						'current_page'=>$i
					);
					return $linkData;
			}
		
			private function pageLinkFun($config,$i,$l,$brand_flag,$color_flag,$price_flag,$discount_flag){
		
				//--------------- Creating Page Link -----------------------------------
		
				$link=$config['full_tag_open'];
		
				if($i>3 && $l!=1){
					$link.=$config['first_tag'];
				}
				if($i>1 && $l!=1){
					$link.=$config['prev_tag'];
				}
		
				if($l==1){
					$link.=$config['prev_tag_mute'];
					
				}
		
				if(($i-2)>=1){
		
					$link.=$config['num_tag_open'];
					$link.=$i-2;
					$link.=",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i-2;
					$link.=$config['num_tag_close'];
		
					$link.=$config['num_tag_open'];
					$link.=$i-1;
					$link.=",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i-1;
					$link.=$config['num_tag_close'];
		
					$link.=$config['cur_tag'];
				}
				else if(($i-1)>=1){
		
					$link.=$config['num_tag_open'];
					$link.=$i-1;
					$link.=",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i-1;
					$link.=$config['num_tag_close'];
		
					$link.=$config['cur_tag'];
				}
				else{
					$link.=$config['cur_tag'];
				}
		
		
				if(($i+2)<=$l){
		
					$link.=$config['num_tag_open'];
					$link.=$i+1;
					$link.=",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i+1;
					$link.=$config['num_tag_close'];
		
					$link.=$config['num_tag_open'];
					$link.=$i+2;
					// $link.=",'".$brand_flag."','".$color_flag."'";
					$link.=",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i+2;
					$link.=$config['num_tag_close'];
				}
				else if(($i+1)<=$l){
		
					$link.=$config['num_tag_open'];
					$link.=$i+1;
					// $link.=",'".$brand_flag."','".$color_flag."'";
					$link.=",'".$brand_flag."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i+1;
					$link.=$config['num_tag_close'];
				}
		
				if(($i+2)<$l){
					$link.=$config['next_tag'];
					$link.=$config['last_tag'];
				}
				else if(($i+1)<=$l){
					$link.=$config['next_tag'];
				}
		
				if($l==1){
					$link.=$config['next_tag_mute'];
				}
		
				$link.=$config['full_tag_close'];
		
				return $link;
			}
		
		
			private function perPageOptionsFun($per_page){
		
				// ---------------------Creating Per Page Options------------------------	
		
				$perPageOptions='<select id="perPage" name="perPage">';
		
				for($k=10; $k<=100; $k+=10){
					if($per_page=="".$k){
						$perPageOptions.='<option selected value="';
						$perPageOptions.=$k;
						$perPageOptions.='">';
						$perPageOptions.=$k;
						$perPageOptions.='</option>';
					}
					else{
						$perPageOptions.='<option value="';
						$perPageOptions.=$k;
						$perPageOptions.='">';
						$perPageOptions.=$k;
						$perPageOptions.='</option>';
					}
				}
									 
				$perPageOptions.='</select>';
		
		
				return $perPageOptions;
			}
			private function calculateOffset($requestedPg,$per_page){
				// --------------------- Calculating Offset ------------------------
				$offset = ($requestedPg-1)*$per_page;
				return $offset;
			}	
}
