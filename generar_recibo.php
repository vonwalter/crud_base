<?php
// Incluir la librería FPDF

require('./fpdf/fpdf.php');

// Crear la clase Factura que hereda de FPDF
class Factura extends FPDF {
  
  // Método para crear la cabecera de la factura
  function Header() {
    // Logo de la empresa
    $this->Image('./img/logo1.jpg', 10, 10, 50);
    // Título de la factura
    $this->SetFont('Arial', 'B', 20);
    $this->Cell(80);
    $this->Cell(30, 10, 'Factura', 0, 0, 'C');
    $this->Ln(20);
  }

  // Método para crear el cuerpo de la factura
  function CrearFactura($cliente, $productos) {
    // Información del cliente
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(50, 10, 'Cliente:', 0);
    $this->SetFont('Arial', '', 14);
    $this->Cell(0, 10, $cliente['nombre'], 0, 1);
    $this->Cell(50, 10, 'Dirección:', 0);
    $this->Cell(0, 10, $cliente['direccion'], 0, 1);
    $this->Cell(50, 10, 'Teléfono:', 0);
    $this->Cell(0, 10, $cliente['telefono'], 0, 1);
    $this->Ln(20);

    // Cabecera de la tabla de productos
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, 'Producto', 1);
    $this->Cell(30, 10, 'Cantidad', 1);
    $this->Cell(40, 10, 'Precio Unitario', 1);
    $this->Cell(40, 10, 'Precio Total', 1);
    $this->Ln();

    // Detalle de los productos
    $this->SetFont('Arial', '', 12);
    foreach ($productos as $producto) {
      $this->Cell(50, 10, $producto['nombre'], 1);
      $this->Cell(30, 10, $producto['cantidad'], 1);
      $this->Cell(40, 10, '$' . number_format($producto['precio_unitario'], 2), 1);
      $this->Cell(40, 10, '$' . number_format($producto['precio_total'], 2), 1);
      $this->Ln();
    }

    // Total de la factura
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(120);
    $this->Cell(40, 10, 'Total: $' . number_format(array_sum(array_column($productos, 'precio_total')), 2), 1);
  }
}

// Crear una instancia de la clase Factura
$pdf = new Factura();
$pdf->AddPage();

// Información del cliente y detalle de productos
$cliente = array(
  'nombre' => 'Juan Pérez',
  'direccion' => 'Av. Siempre Viva 123',
  'telefono' => '555-1234'
);

$productos = array(
  array(
    'nombre' => 'Producto1',
'cantidad' => 2,
'precio_unitario' => 10.50,
'precio_total' => 21.00
),
array(
'nombre' => 'Producto 2',
'cantidad' => 1,
'precio_unitario' => 25.00,
'precio_total' => 25.00
),
array(
'nombre' => 'Producto 3',
'cantidad' => 3,
'precio_unitario' => 5.75,
'precio_total' => 17.25
)
);

// Crear la factura con la información del cliente y detalle de productos
$pdf->CrearFactura($cliente, $productos);

// Generar el archivo PDF
$pdf->Output('factura001.pdf', 'D');