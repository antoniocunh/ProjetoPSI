<?php
function get_pdf_dimensions($path, $box="MediaBox") {
    //$box can be set to BleedBox, CropBox or MediaBox 

    $stream = new SplFileObject($path); 

    $result = false;

    while (!$stream->eof()) {
        if (preg_match("/".$box."\[[0-9]{1,}.[0-9]{1,} [0-9]{1,}.[0-9]{1,} ([0-9]{1,}.[0-9]{1,}) ([0-9]{1,}.[0-9]{1,})\]/", $stream->fgets(), $matches)) {
            $result["width"] = $matches[1];
            $result["height"] = $matches[2]; 
            break;
        }
    }

    $stream = null;

    return $result;
}

var_dump(get_pdf_dimensions("./Certificates/Certificado2019_CC.pdf"));