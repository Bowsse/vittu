<?php
session_start();
/*
Vaihtaa videon tilaksi 'poistettu'.			!muokkaa error viestit!
							!vaihda oikea tietokanta!
*/


//					!Lisää if(admin) tähän!

if($_SESSION["user_name"] == "admin") { // käyttäjä databeissis ei rooli kenttää niin tutkitaan nimen perusteella

	if(isset($_POST['Id'])){
		try{
		$db = new SQLite3('/var/Databases/testdb.db'); //tietokanta

		$updateSql = $db->prepare("UPDATE Video SET tila='poistettu' WHERE id=:id"); //tietokantahaun alustus
		$updateSql->bindValue(':id',$_POST['Id']);
	
		$update = $updateSql->execute();
		echo "Poistettu";
		}
		catch(Exception $e){
			echo "db remove error";
		}
	}
	else{
		echo "error: ei ID:tä";
	}
}
?>
