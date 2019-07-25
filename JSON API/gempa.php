<?php
	//link url data gempa
	$xml_string = file_get_contents("http://data.bmkg.go.id/gempaterkini.xml");

	//memuat data xml nya
	$xml = simplexml_load_string($xml_string);

	//konversi dari string ke json format
	$json = json_encode($xml);

	//cetak jsonnya
	echo $json;
?>