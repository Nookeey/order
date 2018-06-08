<?php
ob_start();
	require_once "connect.php";
    

        if (isset($_POST['userOrder'])) {
            
            $imie = strip_tags($_POST['imie']);
            $co = strip_tags($_POST['co']);
            $cena = $_POST['cena'];
                
            $sql = ('INSERT INTO `orders` (`imie`, `co`, `cena`) VALUES (:imie, :co, :cena)');
            
            $stmt = $pdo->prepare($sql);  
            $stmt -> bindValue(':imie', $imie);
            $stmt -> bindValue(':co', $co);
            $stmt -> bindValue(':cena', $cena);
            $stmt->execute(); 
            
            exit(header("Location: ../index.php"));
            


        }else if (isset($_POST['adminOrder'])) {
    
            $imie = strip_tags($_POST['imie']);
            $co = strip_tags($_POST['co']);
            $cena = $_POST['cena'];
            $gets = $_POST['gets'];
                
            $sql = ('INSERT INTO `orders` (`imie`, `co`, `cena`) VALUES (:imie, :co, :cena)');
            
            $stmt = $pdo->prepare($sql);  
            $stmt -> bindValue(':imie', $imie);
            $stmt -> bindValue(':co', $co);
            $stmt -> bindValue(':cena', $cena);
            $stmt->execute(); 

            exit(header("Location: ../index.php"));
           

        }

ob_end_flush();

?>