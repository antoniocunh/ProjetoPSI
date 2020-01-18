<?php
// your variables
$filename = 'laboratory-report.pdf';
$page = 1;

require_once('library/SetaPDF/Autoload.php');
// or if you use composer require_once('vendor/autoload.php');

// load the document
$document = SetaPDF_Core_Document::loadByFilename($filename);

// create an extractor instance
$extractor = new SetaPDF_Extractor($document);

// create the word strategy and pass it to the extractor instance
$strategy = new SetaPDF_Extractor_Strategy_Word();
$extractor->setStrategy($strategy);

// ensure a valid page number
$currentPageNo = min(max($page, 1), $document->getCatalog()->getPages()->count());

// extract the data through the default strategy:
$result = $extractor->getResultByPageNumber($currentPageNo);

// Demonstration output
echo 'Found ' . count($result) . ' words on page ' . $currentPageNo . ':<br />';

echo '<table border="1">';
echo '<tr>'
        . '<th>Word</th>'
        . '<th>llx</th>'
        . '<th>lly</th>'
        . '<th>ulx</th>'
        . '<th>uly</th>'
        . '<th>urx</th>'
        . '<th>ury</th>'
        . '<th>lrx</th>'
        . '<th>lry</th>'
    . '</tr>';

foreach ($result AS $word) {
    echo '<tr>';
    echo '<td><b>' . htmlspecialchars($word) . '</b></td>';

    $allBounds = $word->getBounds();
    foreach ($allBounds as $bounds) {
        echo '<td>' . $bounds->getLl()->getX() . '</td>';
        echo '<td>' . $bounds->getLl()->getY() . '</td>';
        echo '<td>' . $bounds->getUl()->getX() . '</td>';
        echo '<td>' . $bounds->getUl()->getY() . '</td>';
        echo '<td>' . $bounds->getUr()->getX() . '</td>';
        echo '<td>' . $bounds->getUr()->getY() . '</td>';
        echo '<td>' . $bounds->getLr()->getX() . '</td>';
        echo '<td>' . $bounds->getLr()->getY() . '</td>';
    }

    echo '</tr>';
}
echo '</table>';