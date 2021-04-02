<?php

function testeJeuGagnant($t,$p){
    // teste si gagnant sur une ligne
    for ($ligne = 0; $ligne<3; $ligne++){
        $col   = 0;
        $compteur = 0;
        while($col<3 and $t[$ligne][$col] == $p){
            $col++;
            $compteur++;
        }
        if ($compteur == 3){
            return True;
        }    
    }

    // teste si gagnant sur une colonne
    for ($col = 0; $col<3; $col++){
        $ligne   = 0;
        $compteur = 0;
        while($ligne<3 and $t[$ligne][$col] == $p){
            $ligne++;
            $compteur++;
        }
        if ($compteur == 3){
            return True;
        }    
    }
    // teste les diagonales
    if ($t[0][0] == $p and $t[1][1]==$p and $t[2][2]==$p){
        return True;
    }
    if ($t[2][0] == $p and $t[1][1]==$p and $t[0][2]==$p){
        return True;
    }
    
    return False;
}

function changePion($p){
    if ($p == "O"){
        return "X";
    }else{
        return "O";
    }
}

function jeuOrdi($t,$p){
    // Cherche une position gagnante
    $cherche = True;
    // teste si on peut gagner sur une ligne
    for ($ligne = 0; $ligne<3; $ligne++){
        $compteur = 0;
        for($col=0; $col<3;$col++){
            if($t[$ligne][$col] == $p){
//              echo "<br>LIGNE col $col ligne $ligne pion $p compteur $compteur";
                $compteur++;
            }
        }
        if ($compteur == 2){
            // Il y a une position gagnante
            for($col=0; $col<3; $col++){
                if ($t[$ligne][$col] == "_"){
                    $t[$ligne][$col] = $p;
                    $cherche = False;
                }    
            }
        }    
    }
    if($cherche){
        // teste si position gagnante sur une colonne
        for ($col = 0; $col<3; $col++){
            $compteur = 0;
            for($ligne=0;$ligne<3;$ligne++){
                if ($t[$ligne][$col] == $p){
//                  echo "<br>COL col $col ligne $ligne pion $p compteur $compteur";
                    $compteur++;
                }
            }
            if ($compteur == 2){
                // Il y a une position gagnante
                for($ligne=0; $ligne<3; $ligne++){
                    if ($t[$ligne][$col] == "_"){
                        $t[$ligne][$col] = $p;
                        $cherche = False;
                    }    
                }
            }    
        }
    }
    if ($cherche){
        if($t[0][0]=="_" or $t[0][2]=="_" or $t[2][0]=="_" or $t[2][2]=="_"){
            $cherche = True;
            while($cherche){
                $i = random_int(0,1)*2;
                $j = random_int(0,1)*2;
            
                if ($t[$i][$j] == "_"){
                    $t[$i][$j] = $p;
                    $cherche = False;
                }    
            }    
        }
    }

    return $t;
}

?>