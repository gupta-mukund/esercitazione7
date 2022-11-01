<?php
    $vocali = array("A", "E", "I", "O", "U");
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $giorno = $_POST["giorno"];
    $mese = $_POST["mese"];
    $anno = $_POST["anno"];
    $sesso = $_POST["sesso"];

    function selectCognome($dato) {
        $stringa = "";
        $rimanente = "";
        for ($i = 0; $i < strlen($dato); $i++) {
            $singolo = strtoupper($dato[$i]);
            if (!(in_array($singolo, $GLOBALS["vocali"]))) {
                $stringa = $stringa . $singolo;
            } else {
                $rimanente = $rimanente . $singolo;
            }
        }
        $stringa = $stringa . $rimanente;
        $stringa = $stringa . 'XXX';
        return substr($stringa, 0, 3);
    }
    function selectNome(dato) {
        $array = [];
        $consonanti = '';
        $tutto = '';
        $rimanente = '';
        for ($j = 0; $j < $dato.length; $j++) {
            $singola = $dato[$j].toUpperCase();
            if (!(vocali.includes(singola + ""))) {
                consonanti += singola;
                tutto += singola;
            } else {
                rimanente += singola;
            }    
        }
        tutto += (rimanente + 'XXX');
        array.push(consonanti);
        array.push(tutto);
        return generaNome(array);
    }
    
?>