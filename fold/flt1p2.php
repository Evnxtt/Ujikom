<?php 
$conn = mysqli_connect("localhost","u775523084_root","Putnet1234!!","u775523084_23paskal");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;
	
	date_default_timezone_set("ASIA/JAKARTA");
	$time = date("H:i:s");
	$date = date("Y/m/d");
	$tgl = $date.' '.$time;

	$nama = htmlspecialchars($data["nama"]);
	$no = htmlspecialchars($data["no"]);
	$umur = htmlspecialchars($data["umur"]);
	$masukan = htmlspecialchars($data["masukan"]);
	$rating = htmlspecialchars($data["rating"]);

	$file = upload();

	if (!$file) {
		return false;
	}

	$query = "INSERT INTO lt1p2 VALUES
				('','$nama','$no','$umur','$masukan','$file','$rating','$tgl')";

				mysqli_query($conn, $query);

				return mysqli_affected_rows($conn);
}
function upload() {
	
	$namaFile = $_FILES['file']['name'];
	$ukuranFile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpName = $_FILES['file']['tmp_name'];


	if ( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {

		echo "<script>
				alert('Yang anda Upload bukan Gambar!');
			</script>";
		return false;

	}

	if ( $ukuranFile > 100000000 ) {
		# code...
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar!');
			</script>";
		return false;
	}

	// Gambar siap di upload
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, 'file/'.$namaFileBaru);

	return $namaFileBaru;


}
?>