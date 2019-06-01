<?php
function print_first(){
$first_part=<<<HTML
<!DOCTYPE HTML>
<meta charset="utf-8">
<html>

<head> 
<title> MObiSEarch </title> 
 
 <link href='2.css' rel='stylesheet' type='text/css'> 
   <link href='3.css' rel='stylesheet' type='text/css'> 
	<link href='bootstrap.min.css' rel='stylesheet' type='text/css'> 
	<script src="/js/jquery.js"></script>
	<script src="/js/form.js"></script>
 
</head>

 <body>
 
 
  <header>
  <body class="s_layout_fixed">

<div id="wrapper"> 
  
  <!-- ********************** --> 
  <!--      H E A D E R       --> 
  <!-- ********************** --> 
 <div class="nav">
   <div class="wrapper">
    <nav>
     <ul>
	
	 
	 
      <li><a href="main.php">Главная</a></li>
      <li><a href="About us.html">О нас</a></li>
      <li><a href="index.html">Бренды</a>
       
     
      <li><a href="index.html">Новинки</a></li>
      <li><a href="index.html">Aксессуары</a></li>
      <li><a href="login.php">Управление</a></li>
     </ul>
    </nav>
   </div>
 </div>


   
  </header>
  
 <div class="container content">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			
			
			<div class="search">
  
	
			<form name="filter" action="main.php" method="post" id="filter">
			
			  <input type="text" name="model" placeholder="Искать здесь...">
			  
			  
			
			<option disabled>Объем Памяти</option>
            <input type="checkbox" name="memory0" value="16"  /> 16<br /> 
			
            <input type="checkbox" name="memory1" value="32" /> 32<br /> 
			
            <input type="checkbox" name="memory2" value="64" /> 64<br /> 
		
            <input type="checkbox" name="memory3" value="120" /> 120<br /> 
			
			<input type="checkbox" name="memory4" value="240" /> 240<br /> 
		
			
			
			<option disabled>Фирма</option> 
            <input type="checkbox" name="brand0" value="Apple"  /> Apple<br /> 
            <input type="checkbox" name="brand1" value="Meizu" /> Meizu<br /> 
            <input type="checkbox" name="brand2" value="Huawei" /> Huawei<br /> 
            <input type="checkbox" name="brand3" value="Samsung" /> Samsung<br /> 
			<input type="checkbox" name="brand4" value="Xiaomi" /> Xiaomi<br /> 
			
			
			
            <option disabled> Количество SIM:</option>
           <input type="checkbox" name="sim_card0" value="1" /> 1<br />
           <input type="checkbox" name="sim_card1" value="2" /> 2<br />

           
            <option disabled> Цена: </option>
            <p>До:<input type="text" name="price0" size="4">
		   <br>От:<input type="text" name= "price1" size="4">
			</p>
           
		   
            <option disabled> OS:</option>
           <input type="checkbox" name="OS0" value="Android" /> Android <br />
           <input type="checkbox" name="OS1" value="IOS" /> IOS<br />
		    <input type="checkbox" name="OS2" value="Flyme" /> Flyme <br />
		   
 

			
            <input type="submit" value="OK" />
            <input type="reset" value="Reset" />

           
</form>

</div> 
		
			</div>
		</div>
		<div class="col-md-8 products">
			<div id="table" class="row">
HTML;
print $first_part;

}

function print_content($arr){
	$plitka='';
foreach($arr as $ex){
	
		$model=$ex['model'];
		$memory=$ex['memory'];
		$price=$ex['price'];
		$img=$ex['img'];
		$plitka.="<div class=\"col-sm-4\"><a href=\"login.php\">
															<div class=\"product\">
																	<div class=\"product-img\">
																		<a href=\"#\"><img src=\"images/iphone6s.jpg\" alt=\"\"></a>
																	</div>
																	<p class=\"product-title\">
																		<a href=\"#\">$model</a>
																	</p>
																	<p class=\"product-desc\">Память:  $memory</br>
																			   Цвета: Silver / Rose Gold / Gold  </p>
																	<p class=\"product-price\">Цена: €$price</p>
																</div>
															</a></div>";
}
print $plitka;
}
function print_third(){
	$third_part="				
			</div>
		</div>
	</div>
</div>  

 
 


 
<footer>
 
 <div class=\"footer-bg\">
  <div class=\"copyright\">
   <p><strong>MObiSEarch</strong></p>
   <p>&copy; MK</p>
  </div>
 </div>
</footer>



</body>
</html>";
	
	print $third_part;
	
	
}
?>
