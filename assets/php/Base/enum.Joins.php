<?php
ini_set('display_errors', 1);

/**
 * Enum dos Joins.
 * 
 * Enum que contem os valores do join
 * 
 */
class Joins
{
    const __default = self::INNER;
    
    const INNER = 'INNER'; // inner join
    const LEFT = 'LEFT'; // left join
    const RIGHT = 'RIGHT';  // rigth join
    const FULLOUTER = 'FULL OUTER'; // fullouter join
}
?>