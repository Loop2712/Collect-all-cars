<?php

use Dompdf\Dompdf;

// Create a new Dompdf instance
$dompdf = new Dompdf();

// Load the HTML template
$html = view('/hello_pdf')->render();

// Set the encoding and font for Thai language
$dompdf->set_option('defaultFont', 'IBM Plex Sans Thai');
$dompdf->set_option('isHtml5ParserEnabled', true);

// Load the HTML into Dompdf
$dompdf->loadHtml($html, 'UTF-8');

// Render the PDF
$dompdf->render();

// Output the PDF to the browser
$dompdf->stream('report.pdf');