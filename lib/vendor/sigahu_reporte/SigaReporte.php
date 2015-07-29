<?php

class SigaReporte
{

    /**
    * PDF que se va a generar.
    * @private
    */
    private $pdf;

    /**
    * Timestamp del pdf generado.
    * @private
    */
    private $pdfTimestamp;

    /**
    * Este es el constructor de la clase, configura los datos por default del documento pdf.
    * @param $titulo (string) Título del pdf.
    * @param $asunto (string) Asunto del pdf.
    */
    public function __construct($titulo, $asunto)
    {
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // Configurar la información del pdf.
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor(PDF_AUTHOR);
      $pdf->SetTitle($titulo);
      $pdf->SetSubject($asunto);

      // Configurar cabecera del PDF
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $titulo, "{$asunto}\nHospital Universitario");

      // Configurar la presentación del pdf.
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      $this->pdf = $pdf;

      $date = date_create();
      $this->pdfTimestamp = date_timestamp_get($date);
    }

    /**
    * Este método permite agregar una sección HTML.
    * @param $titulo (string) Título de la sección.
    * @param $html (string) Sección HTML que se desea agregar.
    */
    public function agregarSeccionHTML($titulo, $html)
    {
      $this->pdf->AddPage();
      $this->pdf->SetFont('helvetica', 'B', 20);
      $this->pdf->Write(0, $titulo, '', 0, 'C', true, 0, false, false, 0);
      $this->pdf->SetFont('helvetica', '', 8);
      $this->pdf->writeHTML($html, true, false, true, false, '');
    }
    /**
    * Regresa una timestamp que representa cuando fue creado el pdf.
    */
    public function getTimestamp() {
      return $this->pdfTimestamp;
    }

    /**
    * Generar PDF.
    */
    public function generarPDF()
    {
      $date = date_create();
      $name = date_timestamp_get($date);
      $this->pdf->Output(__DIR__."/{$this->pdfTimestamp}reporte.pdf", 'F');
    }
}
