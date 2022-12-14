<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container {
        border-radius: 20px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-content: center;
        border: 3px solid black;
        width: 50%;
        height: 30%;
        position: absolute;
        left: 25%;
        top: 35%;
        text-align: center;
    }
</style>
</head>
<body>
    <table id="mytable" class="table table-bordred table-striped">
    <!-- <thead>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Posting Date</th>
    <th>Edit</th>
    <th>Delete</th>
    </thead> -->
    <tbody>
<?php
    require_once 'dbconfig.php';
    $vocali = array("A", "E", "I", "O", "U");
    $lettereMese = [
        "01" => "A",
        "02" => "B",
        "03" => "C",
        "04" => "D",
        "05" => "E",
        "06" => "H",
        "07" => "L",
        "08" => "M",
        "09" => "P", 
        "10" => "R", 
        "11" => "S",
        "12" => "T",
    ];
    $caratteriPari = [
        "0" => 0,
        "1" => 1,
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "A" => 0,
        "B" => 1,
        "C" => 2,
        "D" => 3,
        "E" => 4,
        "F" => 5,
        "G" => 6,
        "H" => 7,
        "I" => 8,
        "J" => 9,
        "K" => 10,
        "L" => 11,
        "M" => 12,
        "N" => 13,
        "O" => 14,
        "P" => 15,
        "Q" => 16,
        "R" => 17,
        "S" => 18,
        "T" => 19,
        "U" => 20,
        "V" => 21,
        "W" => 22,
        "X" => 23,
        "Y" => 24,
        "Z" => 25,
      ];
      
      $caratteriDispari = [
        "0" => 1,
        "1" => 0,
        "2" => 5,
        "3" => 7,
        "4" => 9,
        "5" => 13,
        "6" => 15,
        "7" => 17,
        "8" => 19,
        "9" => 21,
        "A" => 1,
        "B" => 0,
        "C" => 5,
        "D" => 7,
        "E" => 9,
        "F" => 13,
        "G" => 15,
        "H" => 17,
        "I" => 19,
        "J" => 21,
        "K" => 2,
        "L" => 4,
        "M" => 18,
        "N" => 20,
        "O" => 11,
        "P" => 3,
        "Q" => 6,
        "R" => 8,
        "S" => 12,
        "T" => 14,
        "U" => 16,
        "V" => 20,
        "W" => 22,
        "X" => 25,
        "Y" => 24,
        "Z" => 23,
      ];
      
      $caratteriRisultanti = [
        "0" => "A",
        "1" => "B",
        "2" => "C",
        "3" => "D",
        "4" => "E",
        "5" => "F",
        "6" => "G",
        "7" => "H",
        "8" => "I",
        "9" => "J",
        "10" => "K",
        "11" => "L",
        "12" => "M",
        "13" => "N",
        "14" => "O",
        "15" => "P",
        "16" => "Q",
        "17" => "R",
        "18" => "S",
        "19" => "T",
        "20" => "U",
        "21" => "V",
        "22" => "W",
        "23" => "X",
        "24" => "Y",
        "25" => "Z",
      ];

    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $giorno = $_POST["giorno"];
    $mese = $_POST["mese"];
    $anno = $_POST["anno"];
    $sesso = $_POST["sesso"];
    $comune = $_POST["comune"];

    function selectCognome($dato) {
        $stringa = "";
        $rimanente = "";
        for ($i = 0; $i < strlen($dato); $i++) {
            $singolo = strtoupper($dato[$i]);
            if (!(in_array($singolo, $GLOBALS["vocali"]))) {
                $stringa .= $singolo;
            } else {
                $rimanente .= $singolo;
            }
        }
        $stringa .= $rimanente;
        $stringa .= 'XXX';
        return substr($stringa, 0, 3);
    }
    function selectNome($dato) {
        $array = [];
        $consonanti = '';
        $tutto = '';
        $rimanente = '';
        for ($j = 0; $j < strlen($dato); $j++) {
            $singola = strtoupper($dato[$j]);
            if (!(in_array($singola, $GLOBALS["vocali"]))) {
                $consonanti .= $singola;
                $tutto .= $singola;
            } else {
                $rimanente .= $singola;
            }    
        }
        $tutto .= ($rimanente . "XXX");
        array_push($array, $consonanti);
        array_push($array, $tutto);
        return generaNome($array);
    }
    
    function generaNome($lettere) {
        $codici = "";
        if (strlen($lettere[0]) >= 4) {
            $codici .= ($lettere[0][0] . $lettere[0][2] . $lettere[0][3]);
        } else {
            for ($z = 0; $z < 3; $z++) {
                $codici .= $lettere[1][$z];
            }
        }
        return $codici;
    }

    function codiceAnni($sesso, $giorno, $mese, $anno) {
        global $lettereMese;
        $stringa = "";
        $stringa .= ($anno[2] . $anno[3]);
        $stringa .= $lettereMese[$mese];
        if ($sesso == "M") {
            $stringa .= $giorno;
        } else if ($sesso == "F") {
            $stringa .= (((int)$giorno) + 40);
        }
        return $stringa;
    }
    function creaCarattereControllo($scritta) {
        global $caratteriPari;
        global $caratteriDispari;
        global $caratteriRisultanti;
        $sommaPari = 0;
        $sommaDispari = 0;
        $carattereControllo = '';
        for ($l = 0; $l < strlen($scritta); $l++) {
            $singolaCifra = $scritta[$l];
            if (($l+1)%2 == 0) {
                $sommaPari += $caratteriPari[$singolaCifra];
            } else {
                $sommaDispari += $caratteriDispari[$singolaCifra];
            }                       
        }
        $resto = (($sommaPari + $sommaDispari) % 26);
        $carattereControllo = $caratteriRisultanti[$resto];
        return $carattereControllo;
    }

    $codiceFiscaleIncompleto = selectCognome($cognome) . selectNome($nome) . codiceAnni($sesso, $giorno, $mese, $anno) . $comune;
    $codiceFiscale = $codiceFiscaleIncompleto . creaCarattereControllo($codiceFiscaleIncompleto);
    
    $sql = "SELECT Nome, Cognome, Giorno, Mese, Anno, Sesso, Comune, CodiceFiscale from dati";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach($results as $result) { ?>
            <tr>
                <td><?php echo htmlentities($cnt);?></td>
                <td><?php echo htmlentities($result->FirstName);?></td>
                <td><?php echo htmlentities($result->LastName);?></td>
                <td><?php echo htmlentities($result->EmailId);?></td>
                <td><?php echo htmlentities($result->ContactNumber);?></td>
                <td><?php echo htmlentities($result->Address);?></td>
                <td><?php echo htmlentities($result->PostingDate);?></td>
                <td><a href="update.php?id=<?php echo htmlentities($result->id);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                <td><a href="index.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
            </tr>
            <?php
            $cnt++;
            
        }
    }
    $sql="INSERT INTO dati(Nome, Cognome, Giorno, Mese, Anno, Sesso, Comune, CodiceFiscale) VALUES(:nm,:cg,:gio,:mes,:ann,:sex,:com,:codf)";
    $query = $dbh->prepare($sql);
    // Bind the parameters
    $query->bindParam(':nm',$nome,PDO::PARAM_STR);
    $query->bindParam(':cg',$cognome,PDO::PARAM_STR);
    $query->bindParam(':gio',$giorno,PDO::PARAM_STR);
    $query->bindParam(':mes',$mese,PDO::PARAM_STR);
    $query->bindParam(':ann',$anno,PDO::PARAM_STR);
    $query->bindParam(':sex',$sesso,PDO::PARAM_STR);
    $query->bindParam(':com',$comune,PDO::PARAM_STR);
    $query->bindParam(':codf',$codiceFiscale,PDO::PARAM_STR);
    // Query Execution
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    // Message for successfull insertion
    echo "<script>alert('Record inserted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>"; 
    }
    else 
    {
    // Message for unsuccessfull insertion
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='index.php'</script>"; 
    }
    ?>
    
    <!-- echo "<div class='container'>
        <div><h1>Codice Fiscale:</h1></div>
        <div><h2>$codiceFiscale</h2></div>
    </div>"; -->
</tbody>
</body>
</table>
<html>