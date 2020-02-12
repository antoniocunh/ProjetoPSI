<?php
ini_set('display_errors', 1);

/**
 * Enum dos OrderBy.
 * 
 * Enum que contem os valores do orderby
 * 
 */
Class OrderBy
{
    const __default = self::ASC;
    
    const ASC = 'ASC'; // ascendente
    const DESC = 'DESC'; // descendente
}
?>