<?php
        header('Access-Control-Allow-Origin: *');
        include "polacz.php";
        if ($sql = $baza->prepare( "SELECT * FROM faktura"))
        {
                $sql->execute();
                $sql->bind_result($id,$data, $towar, $cena, $ilosc);
                while ($sql->fetch())
                  $faktury[] = array(
                     "numer_faktury" => $id,
                     "data" => $data,
                     "towar" => $towar,
                     "cena" => $cena,
                     "ilosc" => $ilosc,
                   );
                $sql->close();
        }
        $baza->close();
        echo json_encode($faktury, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
