<?php 

$data = file_get_contents('https://api.kawalcorona.com/indonesia');
		$data = json_decode($data);
		// var_dump($data[0]);
		$_SESSION['positif'] = $data[0]->{'positif'};
		$_SESSION['meninggal'] = $data[0]->{'meninggal'};
		$_SESSION['sembuh'] = $data[0]->{'sembuh'};

	// DUNIA
		$positif_dunia = file_get_contents('https://api.kawalcorona.com/positif');
		$positif_dunia = json_decode($positif_dunia);

		$sembuh_dunia = file_get_contents('https://api.kawalcorona.com/sembuh');
		$sembuh_dunia = json_decode($sembuh_dunia);

		$meninggal_dunia = file_get_contents('https://api.kawalcorona.com/meninggal');
		$meninggal_dunia = json_decode($meninggal_dunia);
		// var_dump($positif_dunia);

		$_SESSION['positif_dunia'] = $positif_dunia->{'value'};
		$_SESSION['meninggal_dunia'] = $meninggal_dunia->{'value'};
		$_SESSION['sembuh_dunia'] = $sembuh_dunia->{'value'};

		// PROVINSI DI INDONESIA

		$dataProvinsi = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
		$dataProvinsi = json_decode($dataProvinsi);
		$_SESSION['dataProvinsi'] = $dataProvinsi;


		// Negara di Dunia
		$dataNegara = file_get_contents('https://api.kawalcorona.com/');
		$dataNegara = json_decode($dataNegara);
		$_SESSION['dataNegara'] = $dataNegara;

		
 ?>