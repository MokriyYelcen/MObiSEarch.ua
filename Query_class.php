<?php

class Query{
	
		private $name;
		private $memory=array();
		private $brand=array();
		private $card=array();
		private $price=array();
		private $OS=array();
		private $query;
		private $connection;
		
		
		
		public function __construct($memory,$brand,$card,$price,$OS,$name=''){
			$this->connection = mysqli_connect('127.0.0.1','root','','test_db') ;
			$this->name=$name;
			$this->memory=$memory;
			
			//forming $this->brand by id
			$query_brand_id="SELECT   `manufecturers`.`id_manufacturer`
					   FROM  `manufecturers`
					   WHERE";
			if($brand){
				$size=count($brand);
				
				if($size>1){
					$count=0;
					foreach($brand as $br){
						$count++;
						$query_brand_id=$query_brand_id."`manufecturers`.`name`= '$br' OR";
						if($size==$count){
							$query_brand_id=substr($query_brand_id,0,-2);
						}
					}
					
					
				}
				else{
					$br=$brand;
					$a=$br[0];
					$query_brand_id=$query_brand_id."`manufecturers`.`name`= '$a'";
				}	


				if($this->connection){
							
							$resp=mysqli_query($this->connection,$query_brand_id);
							
							if($resp){
										while($row=mysqli_fetch_assoc($resp)){
											$this->brand[]=$row['id_manufacturer'];
										}
										
									 }
									 else{print'</br>'.'It was no response in constructor by brand';}
							}
							else{print '</br>'.'sorry no mysql connection in constructor by brand';}



				
			}
			//print'</br>'.$query_brand_id;
			//////forming this->brand by id END
			$this->card=$card;
			$this->price=$price;
			if($OS){
				$query_OS_id="SELECT`id_OS`FROM`OS`WHERE";
				$size=count($OS);
				if($size>1){
					$count=0;
					foreach($OS AS $one){
						$count++;
						$query_OS_id=$query_OS_id."`name`='$one' OR";
						if($count==$size){
							$query_OS_id=substr($query_OS_id,0,-2);
						}
					}
				}
				else{
					$tmp=$OS[0];
					$query_OS_id=$query_OS_id."`name`='$tmp'";
				}
				
				if($this->connection){
					$resp=mysqli_query($this->connection,$query_OS_id);
					if($resp){
						while($row=mysqli_fetch_assoc($resp)){
							$this->OS[]=$row['id_OS'];
						}	
					}
					else{print'</br>'.'It was no response in constructor by OS';}
				}
				else{print '</br>'.'sorry no mysql connection in constructor by OS';}
				
				
				
				
				
			}
			
		}
		
		
		
		
		
		
		
		
		
		
		public function print_br(){
			print '</br>';
			$tmp=$this->brand;
			foreach($tmp as $me){
				print $me.'</br>';
			}
		}
		
		
		public function create_query(){
			
			if(array_merge($this->memory,$this->brand,$this->card,$this->price,$this->OS)||$this->name){
			
			$query="SELECT `model`,`memory`,`price` FROM `mobile_phones` WHERE ";
			
			//поиск по имени
			if($this->name){
				$part=$this->name;
				$temp="(`model` LIKE '%$part%') ";
				$query= $query.$temp;
			}
			
			
			
			
			//поиск по количеству памяти
			// если первое условие сработало то запрос будет таким $query="SELECT `model`,`memory`,`price` FROM `mobile_phones` WHERE `model`='this->name' ";
			if($this->memory){
				$size=count($this->memory);
				if(Query::need_and($query)){
					$query=$query."AND (";
				}
				else{
					$query=$query."(";
				}
				
				
				if($size>1){
					$count=0;
					foreach($this->memory as $me){
						$count++;
						$query=$query."`memory`= '$me' OR";
						if($count==$size){
							$query=substr($query,0,-2);
						}
					}
					
				}
				else{
					$me=$this->memory;
					$a=$me[0];
					$query=$query."`memory`= '$a'";
				}
				$query=$query.")";
			}
			
			
			
			
			
			if($this->brand){
				$size=count($this->brand);
				if(Query::need_and($query)){
					$query=$query."AND (";
				}
				else{
					$query=$query."(";
				}
				
				
				if($size>1){
					$count=0;
					foreach($this->brand as $br){
						$count++;
						$query=$query."`id_manufacturer`= '$br' OR";
						if($count==$size){
							$query=substr($query,0,-2);
						}
					}
					
				}
				else{
					$me=$this->brand;
					$a=$me[0];
					$query=$query."`id_manufacturer`= '$a'";
				}
				$query=$query.")";
			}
			
			
			
			
			
			
			if($this->card){
				$size=count($this->card);
				if(Query::need_and($query)){
					$query=$query."AND (";
				}
				else{
					$query=$query."(";
				}
				
				if($size>1){
					$count=0;
					foreach($this->card as $card){
						$count++;
						$query=$query."`sim_card`=$card OR";
						if($count==$size){
							$query=substr($query,0,-2);
						}
					}
				}
				else{
					$me=$this->card;
					$a=$me[0];
					$query=$query."`sim_card`= '$a'";
				}
				$query=$query.")";	
			}
			
			
			if($this->price){
				if(Query::need_and($query)){
					$query=$query."AND (";
				}
				else{
					$query=$query."(";
				}
				$min=$this->price[1];
				$max=$this->price[0];
				$query=$query."`price` BETWEEN $min AND $max ";
				$query=$query.")";
				
			}
			
			if($this->OS){
				$size=count($this->OS);
				if(Query::need_and($query)){
					$query=$query."AND (";
				}
				else{
					$query=$query."(";
				}
				if($size>1){
					$count=0;
					foreach($this->OS AS $os){
						$count++;
						$query=$query."`id_OS`='$os' OR";
						if($count==$size){
							$query=substr($query,0,-2);
						}
					}
					
				}
				else{
					$me=$this->OS;
					$a=$me[0];
					$query=$query."`id_OS`= '$a'";
				}
				$query=$query.")";	
			}
			 
			
			
			
			
			
			
			return $query;
			}
			else{
				return 'SELECT `model`,`memory`,`price` FROM `mobile_phones`';
			}
		}
		
		
			
		public static function need_and($query){
			$pos=strlen(trim($query))-5;
			if($pos==strpos($query,'WHERE')){
				
				return false;
			}
			else {
				return true;
			}
			
		}
		

		public function get_searched(){
			if($this->connection){
							$query=$this->create_query();
							$resp=mysqli_query($this->connection,$query);
							
							if($resp){
										$plitka=array();
										
										while($row=mysqli_fetch_assoc($resp)){

											$plitka[]=$row;

										}	
										return $plitka;
									 }
									 else{print'</br>'.'It was no response from mysql';}
							}
							else{print '</br>'.'sorry no mysql connection in query class';}
		}
		
		public static function get_all(){
			$connection=mysqli_connect('127.0.0.1','root','','test_db');
			if($connection){
							$query='SELECT `model`,`memory`,`price` FROM `mobile_phones`';
							$resp=mysqli_query($connection,$query);
							
							if($resp){
										$plitka=array();
										
										while($row=mysqli_fetch_assoc($resp)){

											$plitka[]=$row;

										}	
										return $plitka;
									 }
									 else{print'</br>'.'It was no response from mysql';}
							}
							else{print '</br>'.'sorry no mysql connection in query class';}
		}
		
		
		
		
		
		

		
		
		
	}
?>