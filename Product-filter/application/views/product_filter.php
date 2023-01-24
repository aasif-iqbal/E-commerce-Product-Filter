<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .filter{
            height: auto;
            min-height: 100vh;
            /* max-width: 40vw; */
            overflow:auto;           
        }
         .list-group{
            font-size: small;
        }
        .products{
            height: auto;
            min-height: 100vh;
            /* max-width: 60vw; */
            overflow:auto;
        }
        #categories{                
            font-weight: 700;
            text-transform: uppercase;
            font-size: 14px;
            margin: 10px 0 2px;
            clear: both;
            color: #282c3f;
            display: block;
            padding-left: 2px;
      }
      .list-group-item {   
            padding: 0.1rem 1.25rem !important;    
      }
      #loader{ 
      /* width: 00px;
      height: 00px;  */
      position: absolute;
      top:25%;
      bottom: 0;
      left: 40%;
      right: 0;
      margin: auto;
     }  
     /* #showList{
      display:flex!important;
      direction: row !important;
     } */
     .col-md-3f{
      width: 22% !important;
     }
     @media screen and (max-width:768px){
    .col-md-3{
      width: 120% !important;
   }
}
#mrp{
  text-decoration: line-through;
}
#NotFound{
  padding:30% 30% 40% 35%;
  font-size:250%;
}
    </style>

    <title>Product Filter</title>
  </head>
  <body>
<!-- nav Bar -->
 
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <!-- <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">Features</a>
      <a class="nav-link" href="#">Pricing</a>
      <a class="nav-link disabled">Disabled</a> -->
    </div>
  </div>
</nav>

<!-- <//?php  print_r($brand_name); ?> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 border border-left-0 border-top-0 border-bottom-0">
                <!-- <div class="border border-primary filter"> -->
                <div class="filter">
                    
                    <span class="pl-2"><strong>Filter</strong></span>
                    <a class="float-right alert-link text-decoration-none pr-2" href="">Clear All</a>
                    <hr>
                    <!-- Brand -->
                    <div id="categories">BRAND</div>
                    
                    <form name="brandForm" id="brandForm">
                    <ul class="list-group" id="brand_id">
                      <?php foreach($brand_name as $row): ?>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="brand_name" id="<?php echo $row['brand_id']; ?>" value="<?php echo $row['brand_id']; ?>">
                                <label class="form-check-label" for="exampleRadios2">
                                <?php echo $row['brand_name']; ?>
                                </label>
                              </div>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                      </form>
                      
                      <div class="mx-2"><hr></div>
                    <!-- Price -->
                    <div id="categories">PRICE</div>
                    <form name="priceForm" id="priceForm">
                    <ul class="list-group">
                       
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="" value="1">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 199 to Rs. 599                                
                                </label>                              
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 599 to Rs. 999                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="3">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 999 to Rs. 1999                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="4">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 1999 to Rs. 2999                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="5">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 2999 to Rs. 5999
                                </label>
                              </div>
                        </li>
                      </ul>
                      </form>
                      <div class="mx-2"><hr></div>
                      <!-- Color -->
                      <div id="categories">COLOR</div>
                      <form id="colorForm" name="colorForm">
                      <ul class="list-group">
                      <?php foreach($color_name as $row): ?>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="color_name" id="<?php echo $row['color_id']; ?>" value="<?php echo $row['color_id']; ?>">
                                <label class="form-check-label" for="exampleRadios2">
                                <?php echo $row['color_name']; ?>
                                </label>
                              </div>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                      </form>

                         <!-- SIZE 
                      <div id="categories">SIZE</div>
                      <ul class="list-group">
                      </?php foreach($size as $row): ?>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="</?php echo $row['size_id']; ?>" value="</?php echo $row['size_id']; ?>">
                                <label class="form-check-label" for="exampleRadios2">
                                </?php echo $row['size_name']; ?>
                                </label>
                              </div>
                        </li>
                        </?php endforeach; ?>
                      </ul>
                      -->
                      <div class="mx-2"><hr></div>
                      <!-- Discount -->
                    <div id="categories">DISCOUNT RANGE</div>
                    <form id="discountForm" name="discountForm">
                    <ul class="list-group">
                       
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="discount" id="" value="1">
                                <label class="form-check-label" for="exampleRadios2">
                                   20% and above                                
                                </label>                              
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                30% and above                                   
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="3">
                                <label class="form-check-label" for="exampleRadios2">
                                50% and above                                     
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="4">
                                <label class="form-check-label" for="exampleRadios2">
                                60% and above                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="5">
                                <label class="form-check-label" for="exampleRadios2">
                                70% and above      
                                </label>
                              </div>
                        </li>
                      </ul>
                      </form>

                   </div>
            </div>

<!----------------------------------- Main Body ---------------------------------->

            <div class="col-md-10">
            
                <!-- <div class="border border-success products"> -->
                  <div class="border border-0 products">
                  
                  <div class="container-fluid">
                  
                  
                  
                  
                        
                  <!-- For per Page Options -->
                  <!-- <div style="float: right; padding:10px;" id="perPageOption"></div> -->
                  
                  <!-- After Ajax call ,return by filter -->
                  <div class="col-md-12">
                    <div class="row" id="showList"></div>
                  </div>
                    <!-- Image loader -->
                      <div id='loader' style='display: none;'>
                        <img src='<?php echo base_url('image/loading-gif.gif'); ?>' width='15%' height='12%'>
                      </div>

                      <!-- loader -->
                      <div id="loading"></div>
                      <hr>
                      <span id="pageNum"></span>
                      <!-- For Page Page Link -->                      
                      <div id ="pglink" style="padding-left:40%;"></div>
                    </div> <!-- Container -->
                </div>
                
            </div><!--col-md-10-->
            <!-------------------------- Main Body End -------------------------->
        </div><!--row-->
    </div>

  
  </body>
  <!------------------------------------ script --------------------------------------------->

<script>
 function clearRadioButtons(){
  var ele = document.querySelectorAll("input[type=radio]");
   for(var i=0;i<ele.length;i++){
      ele[i].checked = false;
   }
}

$(document).ready(function(){

  var brand_id = 0;
  var color_id = 0;
  var price_id = 0;
  var discount_id = 0;
  

  
 //  alert(brand_id)
  console.log("brand_id",brand_id)
  console.log("color_id",color_id)
  console.log("price_id",price_id)
  console.log("discount_id", discount_id)

  showProduct(1, brand_id, color_id,  price_id, discount_id);
 
//Get Checkbox value - Brand
document.brandForm.onclick = function(){
    var brand_flag = document.brandForm.brand_name.value;
   
    let color_flag = getCookie("color_flag");
    let price_flag = getCookie("price_flag");
    let discount_flag = getCookie("discount_flag");

    showProduct(1,brand_flag,color_flag,price_flag,discount_flag);
   
    console.log(brand_flag);
}

//Get Checkbox value - Color
document.colorForm.onclick = function(){
    var color_flag = document.colorForm.color_name.value;
    
    let brand_flag = getCookie("brand_flag");
    let price_flag = getCookie("price_flag");
    let discount_flag = getCookie("discount_flag");

    showProduct(1,brand_flag,color_flag,price_flag,discount_flag);

    console.log(color_flag);
}

//Get Checkbox value - Price
document.priceForm.onclick = function(){
    var price_flag = document.priceForm.price.value;
    
    let brand_flag = getCookie("brand_flag");
    let color_flag = getCookie("color_flag");
    let discount_flag = getCookie("discount_flag");

    showProduct(1, brand_flag, color_flag, price_flag,discount_flag);

   console.log(price_flag);
}

//Get Checkbox value - Discount
document.discountForm.onclick = function(){
    var discount_flag = document.discountForm.discount.value;

    let brand_flag = getCookie("brand_flag");
    let color_flag = getCookie("color_flag");
    let price_flag = getCookie("price_flag");

    showProduct(1,brand_flag,color_flag,price_flag,discount_flag);
    console.log(discount_flag);
}

});


function showProduct(pgNum, brand_flag, color_flag, price_flag, discount_flag)
{
  setCookie("selectedPage", pgNum, 1); //1-Day expire
  setCookie("brand_flag", brand_flag, 1);
  setCookie("color_flag", color_flag, 1);
  setCookie("price_flag", price_flag, 1);
  setCookie("discount_flag", discount_flag, 1);
 
  let perPg = $('#perPage').find(":selected").val();
     
    if(perPg === undefined){
        perPg = 12;
    }

  $.ajax({
                url: "<?= base_url('index.php/Filter_Controller/product_filter_ajax') ?>",
                type: 'POST',
                timeout: 1000000,
                data: {
                    brand_flag:brand_flag, 
                    color_flag:color_flag,
                    price_flag:price_flag,
                    discount_flag:discount_flag,
                    pgNum:pgNum,
                    perPg:perPg
                    // searchText:searchText
                },
                beforeSend: function(){
                  // Show image container
                  $("#loader").show();                   
                  $("#showList").hide();               
                },
                complete:function(data){
                  // Hide image container
                  $("#loader").hide();
                  $("#showList").show();                  
                },
                success: function(data, textStatus, jqXHR) {
                    // console.log(data); 
                   var jsonData = JSON.parse(data);  
                   console.log("JsonData",jsonData); 
   
                   $('#pglink').html(jsonData['pageLink']);
                   $('#perPageOption').html(jsonData['perPageOptions']);

                   
                   // -------------- On per page change by dropdown(optional) -----------------
                    $(document).ready(function() {
                            $('#perPage').on('change', function(){
                                let selectedPage = getCookie("selectedPage");
                            //     const brand_flag = document.getElementById("brand_flag");
                            //     const color_flag = document.getElementById("color_flag");

                            //     showMumbraData(selectedPage,brand_flag.value,color_flag.value)
                            const brand_flag = 0;
                            const color_flag = 0;
                                showProduct(selectedPage,brand_flag,color_flag);
                       });   
                    });
                    //--------------------------------------------------------------------------

                   
                      if(jsonData.tableData != null || jsonData.tableData != undefined){
                         var data_len = jsonData.tableData.length;   
                       //  console.log(data_len)                     
                      }

                      // console.log(jsonData.pagination_link);
                    var  htmlTemp= "";
                    var pageNum = '';
                    if(data_len != null){
                    
                    for (var i = 0; i < data_len; i++){
                      // <div class="d-flex align-items-stretch">...</div>

                      htmlTemp += `<div class="card my-2  mx-2 border-0 col-md-3f" style="">`;
                      htmlTemp += `<div class="card-img-overlay d-flex justify-content-end">
                                    <a href="#" class="card-link text-danger like">
                                      <i class="fa fa-heart-o"></i>
                                    </a>
                                  </div>`;
                                // htmlTemp += `<img class='mx-auto'  src="${jsonData.tableData[i].product_image}" width="auto" height="auto" />`;		  
                                htmlTemp += `<img class=''  src="${jsonData.tableData[i].product_image}" width="auto" height="300px" />`;		  
                                htmlTemp += `<div class="card-body">`;
                                htmlTemp += `<h5 class="card-title text-muted">${jsonData.tableData[i].product_name}</h5>`;    
                                // htmlTemp += `<h6 class="card-subtitle">${jsonData.tableData[i].product_short_description}</h6>`;    
                                // htmlTemp += `<h6 class="card-subtitle">Color_id:${jsonData.tableData[i].product_color_id}</h6>`;    
                                htmlTemp += `<div class="price">
                                <span class="mt-2 text-success">Rs. ${jsonData.tableData[i].product_actual_price}</span> &nbsp;
                                <span class="mt-2 text-secondary" id="mrp"><small>Rs. ${jsonData.tableData[i].product_mrp}</small></span> &nbsp;
                                <span class="mt-2 text-danger"><small>(${jsonData.tableData[i].product_discount}%OFF)</small></span>`; 
                        htmlTemp +=  `</div>                                                 
                        </div>
                      </div>`;
                      
                    }
                    
                    pageNum += `<span class="mt-2 text-muted">Page ${jsonData.currentPg} of ${jsonData.totalRow}</span>`;
                  // document.getElementById('showList').innerHTML = htmlTemp;
                   $('#showList').html(htmlTemp);
                   $('#pageNum').html(pageNum);
                  }else{                                        
                    $('#pglink').hide();
                    $('#pageNum').hide();
                    document.getElementById('showList').innerHTML = "<div id='NotFound'>No Data Found</div>";                    
                  }

                },//success-ends
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
            })
}
 

// -------------------------  Cookie setup  -------------------

function setCookie(cname, cvalue, exdays) {
                const d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                let expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }
function getCookie(cname){
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
                }
function deleteCookie(cname) {
                    document.cookie = cname+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }

</script>

</html>