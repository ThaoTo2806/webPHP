<?php
ob_start();
ini_set('default_charset', 'UTF-8');
require_once('../controller/TCPDF-main/tcpdf.php');
include_once '../controller/donHang.php';

$dh = new donHang();

if (isset($_GET['id'])) {
    $ma = $_GET['id'];
    $donHangInfos = $dh->getTTDonDaDuyet($ma);
} 

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();

$pdf->SetFont('dejavusans', '', 14);

// Add title
$pdf->Cell(0, 18, 'HÓA ĐƠN THANH TOÁN', 0, 1, 'C');

// Define table cell widths
$cellWidth = 60;
$cellHeight = 10;

foreach ($donHangInfos as $donHangInfo) {
    // Define data for the table
    $data = array(
        array('Mã hóa đơn:', $donHangInfo->getMaDDH()),
        array('Tên khách hàng:', $donHangInfo->tv->getHoTen()),
        array('Ngày đặt hàng:', date('d-m-Y H:i:s', strtotime($donHangInfo->getNgayDatHang()))),
        array('Ngày giao:', ($donHangInfo->getNgayGiao() ? date('d-m-Y H:i:s', strtotime($donHangInfo->getNgayGiao())) : 'Chưa có')),
        array('Trạng thái:', ($donHangInfo->getDaThanhToan() ? 'Đã thanh toán' : 'Chưa thanh toán')),
        array('Quà tặng:', $donHangInfo->getQuaTang())
    );

    // Output table
    foreach ($data as $row) {
        $pdf->MultiCell($cellWidth, $cellHeight, $row[0], 0, 'L', false, 0, '', '', true, 0, false, true, 0, 'T');
        $pdf->MultiCell($cellWidth, $cellHeight, $row[1], 0, 'L', false, 1, '', '', true, 0, false, true, 0, 'T');
    }
    // Add a blank line between each set of data
    $pdf->Ln();
}

ob_end_clean();
$pdf->Output();
?>
