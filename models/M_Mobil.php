<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Mobil extends Model
{
	// private $_client;

	// public function __construct()
	// {
	// 	$this->_client = new Client([
	// 		'base_uri' => 'http://localhost/php-crud-api/api.php/records/'
	// 	]);
	// }

	public function lihat()
	{
		// $query = $this->setQuery('SELECT nama, tbl_merk.merk AS merk, jumlah_kursi, tbl_mobil.id as id FROM tbl_mobil INNER JOIN tbl_merk ON tbl_merk.id = tbl_mobil.id_merk');
		// $query = $this->execute();

		// return $query;

		$client = new Client();

		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_mobil');

		$result1 = json_decode($response->getBody()->getContents(), true);

		$response2 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_merk');

		$result2 = json_decode($response2->getBody()->getContents(), true);

		for ($i = 0; $i < count($result1['records']); $i++) {
			for ($j = 0; $j < count($result2['records']); $j++) {
				if ($result1['records'][$i]['id_merk'] === $result2['records'][$j]['id']) {
					$query[] = [
						'nama' => $result1['records'][$i]['nama'],
						'merk' => $result2['records'][$j]['merk'],
						'jumlah_kursi' =>
						$result1['records'][$i]['jumlah_kursi'],
						'id' =>
						$result1['records'][$i]['id']
					];
				}
			}
		}
		return $query;
	}

	public function tambah($data)
	{
		// $query = $this->insert('tbl_mobil', $data);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_mobil', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function lihat_id($id)
	{
		// $query = $this->setQuery("SELECT *, tbl_mobil.id AS id_mobil, tbl_mobil.id_merk AS id_merk FROM tbl_mobil INNER JOIN tbl_merk ON tbl_merk.id = tbl_mobil.id_merk where tbl_mobil.id = $id");
		// $query = $this->execute();
		// return $query;
		$client = new Client();

		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_mobil/' . $id);

		$result1 = json_decode($response->getBody()->getContents(), true);

		$response2 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_merk');

		$result2 = json_decode($response2->getBody()->getContents(), true);

		for ($j = 0; $j < count($result2['records']); $j++) {
			if ($result1['id_merk'] === $result2['records'][$j]['id']) {
				$merk = $result2['records'][$j]['merk'];
			}
		}
		$query[] = [
			'nama' => $result1['nama'],
			'warna' => $result1['warna'],
			'merk' => $merk,
			'jumlah_kursi' =>
			$result1['jumlah_kursi'],
			'no_polisi' =>
			$result1['no_polisi'],
			'tahun_beli' =>
			$result1['tahun_beli'],
			'gambar' =>
			$result1['gambar'],
			'id' =>
			$result1['id'],
			'id_merk' =>
			$result1['id_merk']

		];
		return $query[0];
	}

	public function ubah($data, $id)
	{
		// $query = $this->update('tbl_mobil', $data, ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('PUT', 'http://localhost/php-crud-api/api.php/records/tbl_mobil/' . $id, [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function cek($id)
	{
		// $query = $this->get_where('tbl_mobil', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_mobil/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function detail($id)
	{
		// $query = $this->setQuery("SELECT *, tbl_mobil.id AS id_mobil, tbl_mobil.id_merk AS id_merk FROM tbl_mobil INNER JOIN tbl_merk ON tbl_merk.id = tbl_mobil.id_merk where tbl_mobil.id = $id");
		// $query = $this->execute();
		// return $query;
		$client = new Client();

		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_mobil/' . $id);

		$result1 = json_decode($response->getBody()->getContents(), true);

		$response2 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_merk');

		$result2 = json_decode($response2->getBody()->getContents(), true);

		for ($j = 0; $j < count($result2['records']); $j++) {
			if ($result1['id_merk'] === $result2['records'][$j]['id']) {
				$merk = $result2['records'][$j]['merk'];
			}
		}
		$query[] = [
			'nama' => $result1['nama'],
			'warna' => $result1['warna'],
			'merk' => $merk,
			'jumlah_kursi' =>
			$result1['jumlah_kursi'],
			'no_polisi' =>
			$result1['no_polisi'],
			'tahun_beli' =>
			$result1['tahun_beli'],
			'gambar' =>
			$result1['gambar'],
			'id' =>
			$result1['id'],
			'id_merk' =>
			$result1['id_merk']

		];
		return $query[0];
	}

	public function hapus($id)
	{
		// $query = $this->delete('tbl_mobil', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_mobil/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}
