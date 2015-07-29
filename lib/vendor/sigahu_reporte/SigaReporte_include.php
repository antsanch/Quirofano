<?php
/*
* Este archivo se encarga de cargar la librería TCPDF y la fachada SigaReporte para
* su fácil utilización.
* @author Omar
*/

// Carga la configuración para el reporte.
require_once('config/siga_config.php');

// Librería TCPDF
require_once('lib/vendor/tcpdf/tcpdf.php');

// Fachada SigaReporte
require_once('SigaReporte.php');