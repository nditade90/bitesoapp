<?php
        $mysqli = new mysqli("localhost", "my_user", "my_password", "microfinances");

		#DEBUT structure de la table tp_comptes
		# tb_comptes (id,nom,prenom,numero_compte_client,montant, type_compte);
		#FIN

		//recuperation de tous les comptes des clients
		$requete = "SELECT * FROM tb_comptes";
		$comptes = $mysqli->query($requete);

		//Tenu de compte mensuel
		$montant_tenu_compte = 500;

		while ($compte = $comptes->fetch_object()) {
			# code...

            #DEBUT structure de la table tb_tresor
            # tb_tresor (id,numero_compte_client,montant, numero_compte_tenu, type_operation, date_operation);
            #FIN
            
            $numero_compte_tenu = "CMPT_10000";
            $type_operation = "TENU_COMPTE";
            $date_operation = date('Y-m-d H:i:s'); 

            $requete = "INSERT INTO tb_tresor (id,numero_compte_client,montant, numero_compte_tenu, type_operation, date_operation) VALUES (0,?,?,?,?,?)";
            $stmt = $mysqli->prepare($requete);
            $stmt->bind_param("$compte->numero_compte_client", "$montant_tenu_compte", "$numero_compte_tenu","$type_operation",$date_operation);
            $stmt->execute();


			//crediter le compte du client
            $requete = "UPDATE tb_comptes SET montant = ? WHERE id = ?";
            $stmt = $mysqli->prepare($requete);
            $stmt->bind_param($compte->montant-$montant_tenu_compte, $compte->id);
            $stmt->execute();

		}
	

