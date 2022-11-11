<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="variabili.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <h1>Calcolo Codice Fiscale</h1>
    <form action="" method="post" class="container">
      <h4>Dati anagrafici</h4>
      <input type="text" name="nome" id="nome" placeholder="Nome" required />
      <input
        type="text"
        name="cognome"
        id="cognome"
        placeholder="Cognome"
        required
      />
      <div class="row">
        <h4>Data di nascita</h4>
        <input
          type="number"
          name="giorno"
          id="giorno"
          placeholder="DD"
          required
          min="1"
          max="31"
        />
        <input
          type="number"
          name="mese"
          id="mese"
          placeholder="MM"
          required
          min="1"
          max="12"
        />
        <input
          type="number"
          name="anno"
          id="anno"
          placeholder="YYYY"
          required
          min="1900"
          max="2022"
        />
        <h4>Sesso</h4>
        <div class="gender_container">
          <label for="maschio">Maschio</label>
          <input type="radio" name="sesso" value="M" id="maschio" required />
          <label for="femmmina">Femmina</label>
          <input type="radio" name="sesso" value="F" id="femmina" required />
        </div>
      </div>
      <h4>Comune</h4>
      <select id="comune" name="comune" required>
        <optgroup id="comuniItaliani"></optgroup>
      </select>
      <button type="submit">Submit</button>
    </form>
  </body>
  <script defer>
    console.log(comuni);
    for (let p = 0; p < comuni.length; p++) {
      var nuovoComune = document.createElement("option");
      nuovoComune.innerHTML = comuni[p].nome;
      nuovoComune.value = comuni[p].codiceCatastale;
      document.getElementById("comuniItaliani").appendChild(nuovoComune);
    }
  </script>
</html>


<?php
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

    if ($_POST) {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $giorno = $_POST["giorno"];
        $mese = $_POST["mese"];
        $anno = $_POST["anno"];
        $sesso = $_POST["sesso"];
        $comune = $_POST["comune"];
        $codiceFiscaleIncompleto = selectCognome($cognome) . selectNome($nome) . codiceAnni($sesso, $giorno, $mese, $anno) . $comune;
        $codiceFiscale = $codiceFiscaleIncompleto . creaCarattereControllo($codiceFiscaleIncompleto);
        ?>
        <div>
            <h1>Codice Fiscale:</h1>
            <h2><?php echo $codiceFiscale ?></h2>
        </div>
        <?php
    }
    ?>