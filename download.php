<?php

	$filename = "Formation/" . $_GET['formationChoisie'] . ".pdf";

    //$filename = './pdf/jobs/pdffile.pdf';

    $fileinfo = pathinfo($filename);
    $sendname = $fileinfo['filename'] . '.' . strtoupper($fileinfo['extension']);

    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=\"$sendname\"");
    header('Content-Length: ' . filesize($filename));
    readfile($filename);
