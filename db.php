<?php

class db
{
		private $sql;
		private $wynik;
		private  $nazwa_tabeli;
		private $nazwa_pola;
		private $wartosc_pola;
		private $host;
		private $login;
		private $password;
		private $database;
		private $error;
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
			
			
			
			$this->link = mysqli_connect($host , $login , $password , $database);
			
			if(!$this->link)
			{
				printf("blad polaczenia z baza danych");
				return $this->error = mysqli_connect_error($this->link);
				
			}
			
			return $this->link;
		}
		
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
		
		public function fetch($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if(!$this->wynik)
				return false;
			
			return $this->tablica = mysqli_fetch_array($this->wynik);
			
			
			
			
		}
		
		public function fetchAll($link , $id)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty where" . $id = "0");
	
	
			if(!$this->wynik)
				return false;
			
			return $this->tablica = mysqli_fetch_array($this->wynik);
			
			
			
			
		}
		
		public function fetchOne($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			$this->tablica = mysqli_fetch_array($this->wynik);
			
			if(!$this->wynik)
				return false;
			
			return $this->tablica[0];
			
			
		}
		
		
		public function fetchPrint($link , $id)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty where"
			. $id = "0");
			
			if(!$this->wynik)
				return false;
			
			printf("<table>");
			echo "<tr>";
			
			foreach($this->wynik as $val)
			{
				echo "<td>";
					echo $val;
				echo "</td>";
			}
			
			echo "<tr>";
			printf("</table>");
			
		}
		
		public function fetchPrintOne($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if(!$this->wynik)
				return false;
			
			printf("<table>");
			echo "<tr>";
			
			foreach($this->wynik[0] as $val)
			{
				echo "<td>";
					echo $val;
				echo "</td>";
			}
			
			echo "<tr>";
			printf("</table>");
			
			
		}
		
		public function fetchPrintAll($link)
		{
			$this->sql = $link;
			$this->wynik = mysqli_query($this->sql , "SELECT * FROM produkty");
			
			if(!$this->wynik)
				return false;
			
			printf("<table>");
			echo "<tr>";
			
			foreach($this->wynik as $val)
			{
				echo "<td>";
					echo $val;
				echo "</td>";
			}
			
			echo "<tr>";
			printf("</table>");
			
		}
		
		public function close($link)
		{
			$this->sql = $link;
			mysqli_close($this->sql);
		}
				
		public function __Destruct()
		{
			$this->sql = $link;
			mysqli_close($this->sql);
		}
		


}






?>