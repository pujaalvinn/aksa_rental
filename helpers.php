<?php 
class helpers{

    function hitung_diskon($harga,$diskon_persen){
        $nominal_diskon = $diskon_persen/100*$harga;
        $harga_stlh_diskon = $harga - $nominal_diskon;
    return $harga_stlh_diskon;
    }
}

?>