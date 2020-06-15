<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Merk extends Model
{
	public function tambah($data)
	{
		// $query = $this->insert('tbl_merk', ['merk' => $data]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();

		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_merk', [
			'form_params' => [
				'merk' => $data
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function lihat()
	{
		// $query = $this->get('tbl_merk');
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_merk');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['records'];
	}

	public function lihat_id($id)
	{
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_merk/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function ubah($merk, $id)
	{
		// $query = $this->update('tbl_merk', ['merk' => $merk], ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();

		$response = $client->request('PUT', 'http://localhost/php-crud-api/api.php/records/tbl_merk/' . $id, [
			'form_params' => [
				'merk' => $merk
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function cek($id)
	{
		// $query = $this->get_where('tbl_merk', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_merk/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus($id)
	{
		// $query = $this->delete('tbl_merk', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_merk/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}
