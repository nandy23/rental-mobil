<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Jenis_Bayar extends Model
{
	public function tambah($jenis_bayar)
	{
		// $query = $this->insert('tbl_jenis_bayar', ['jenis_bayar' => $data]);
		// $query = $this->execute();
		// return $query;
		$data = [
			'jenis_bayar' => $jenis_bayar
		];
		$client = new Client();
		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function lihat()
	{
		// $query = $this->get('tbl_jenis_bayar');
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['records'];
	}

	public function lihat_id($id)
	{
		// $query = $this->get_where('tbl_jenis_bayar', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function ubah($jenis_bayar, $id)
	{
		// $query = $this->update('tbl_jenis_bayar', ['jenis_bayar' => $jenis_bayar], ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$data = [
			'jenis_bayar' => $jenis_bayar
		];

		$client = new Client();
		$response = $client->request('PUT', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar/' . $id, [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function cek($id)
	{
		// $query = $this->get_where('tbl_jenis_bayar', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus($id)
	{
		// $query = $this->delete('tbl_jenis_bayar', ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}
