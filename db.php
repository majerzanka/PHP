<?php

class db
{
		private $sql;
		private $wynik;
		private $nazwa_tabeli;
		private $nazwa_pola;
		private $wartosc_pola;
		private $host;
		private $login;
		private $password;
		private $database;
		private $tablica;
		private $link;

		
		

		

		public function __Construct()
		{
			printf("Kreator Edycji  Bazy danych utworzony KURWA");
		}
		
		public function open($ht , $lg , $pw , $db)
		{
			$this->database = $db;
			$this->host = $ht;
			$this->login = $lg;
			$this->password = $pw;
			
			
			
			$this->link = mysqli_connect($this->host , $this->login , $this->password , $this->database);
			
			if(!$this->link)
			{
				printf("blad polaczenia z baza danych");
				$error =  mysqli_connect_error($this->link);
				return $error;
				
			}
			
			return $this->link;
		}
		
		/*function debug($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			$this->tablica = mysqli_fetch_array($this->wynik);
			
			print_r($this->tablica[0]);
			
		}
		*/
		
		
		public function insert($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if($this->wynik)
				return $this->wynik;
			else
				return false;
			
		}
		public function update($nt , $np , $wp , $link)
		{
			$this->nazwa_tabeli = $nt;
			$this->nazwa_pola = $np;
			$this->wartosc_pola = $wp;
			$this->sql = $link;
			
			$this->wynik = mysqli_query($this->sql , "insert into" 
			. $this->nazwa_tabeli .
			"(" . $this->nazwa_pola .") VALUES" . $this->wartosc_pola . ";");
			
			if($this->wynik)
				return $this->wynik;
			else
				return false;
			
		}
		
		public function fetchAll($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "select * from produkty");
			
			
			if(!$this->wynik)
				return false;
			
			$cal = array();
			
			while($this->tablica = mysqli_fetch_array($this->wynik))
				$cal[] = $this->tablica;
		
			return $cal;
			
			
			
			
		}
		
		public function fetchOne($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
	
	
			if(!$this->wynik)
				return false;
			
			$this->tablica = mysqli_fetch_array($this->wynik);
			
			
			if(!$this->tablica)
				return false;
			
			
			return $this->tablica[0];
			
			
			
			
		}
		
		public function fetch($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			$this->tablica = mysqli_fetch_array($this->wynik);
			
			if(!$this->wynik)
				return false;
			
			if(!$this->tablica)
				return false;
			
			return $this->tablica;
			
			
		}
		
		
		public function fetchPrint($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if(!$this->wynik)
				return false;
			
			$this->tablica = mysqli_fetch_array($this->wynik);
			
			if(!$this->tablica)
				return false;
			
			echo "<table border = 1>";
			foreach($this->tablica as $key => $val)
				if(is_numeric($key))
				{
					echo "<tr>";
						echo "<td>";
							echo $val;
						echo "</td>";
				}
			
		}
		
		public function fetchPrintOne($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if(!$this->wynik)
				return false;
			$this->tablica = mysqli_fetch_array($this->wynik);
			
			if(!$this->tablica)
				return false;
			
			echo "<table border = 1>";
			foreach($this->tablica as $key => $val)
				if(is_numeric($key) && $key == 0)
				{
					echo "<tr>";
						echo "<td>";
							echo $val  . "<br>";
						echo "</td>";
				}
			
			
			
		}
		
		public function fetchPrintAll($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if(!$this->wynik)
				return false;
			
			
			echo "<table border = 1>";
			while($this->tablica = mysqli_fetch_array($this->wynik))
			{
				echo "<tr>";
					echo "<td>";
						echo $this->tablica[0];
					echo "</td>";
					
					echo "<td>";
						echo $this->tablica[1];
					echo "</td>";
					echo "<td>";
						echo $this->tablica[2];
					echo "</td>";
					echo "<td>";
						echo $this->tablica[3];
					echo "</td>";
					echo "<td>";
						echo $this->tablica[4];
					echo "</td>";
					echo "<td>";
						echo $this->tablica[5];
					echo "</td>";
					echo "<td>";
						echo $this->tablica[6];
					echo "</td>";
					echo "<td>";
						echo $this->tablica[7];
					echo "</td>";
				echo "</tr>";
			
			
				
			}
			echo "</table>";
				
		}
		
		public function close($link)
		{
			$this->sql = $link;
			mysqli_close($this->sql);
		}
				
		public function __Destruct()
		{
			
		}
		
		


}

/*$db = new db;

$con = $db->open("localhost" , "root" , "" , "3i_sklep");

$wyn = $db->fetchPrintOne($con);

print_r($wyn)
*/










?>