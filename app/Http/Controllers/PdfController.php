<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \setasign\Fpdi\Fpdi;

use App\Module\ShareData;


class PdfController extends Controller {
    private static function splitPdf($file, $endDirectory) {
        $tmp = explode("/", $file);
        $filename = end($tmp);
        $newPath = "$endDirectory/" . explode(".", $filename)[0];
        if (!is_dir($newPath)) {
            mkdir($newPath, 0777, true);
        }

        $pdf = new FPDI();
        $pagecount = $pdf->setSourceFile($file);

        // Split each page into a new PDF
        for ($i = 1; $i <= $pagecount; $i++) {
            $newPdf = new FPDI();
            $newPdf->AddPage();
            $newPdf->setSourceFile($file);
            $newPdf->useTemplate($newPdf->importPage($i));
            $newPdf->Image("$newPath/$i.pdf", 20, 155, 50);
            
            try {
                // $newFilename = "$newPath/$i.pdf";
                // $newPdf->Output($newFilename, "F");
            } 
            catch (Exception $e) {
                return [
                    "status" => False,
                    "error" => $e->getMessage(),
                ];
            }
        }
        return [
            "status" => True,
        ];
    }

    public static function convertPdfToImage($file, $endDirectory) {
        $response = [
            "status" => "fail"
        ];
        $tmp = explode("/", $file);
        $filename = end($tmp);
        $newPath = "$endDirectory/" . explode(".", $filename)[0];
        if (!is_dir($newPath)) {
            mkdir($newPath, 0777, true);
        }

        $result = exec("gswin64c -dBATCH -dNOPAUSE -sDEVICE=jpeg -sOutputFile=$newPath/%d.jpg -r300x300 -f $file");
        if (str_contains($result, "Last OS error")) {
            $response["error"] = $result;
            return $response;
        }
        $response["status"] = "success";
        return $response;
    }

    public static function uploadPdf($file) {
        $pdfPath = $file->store('pdf', 'public');
        $targetDirectory = "../storage/app/public";
        $pdfPath = "$targetDirectory/$pdfPath";
        return self::convertPdfToImage($pdfPath, "$targetDirectory/books");
    }
}
