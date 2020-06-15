<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Perjalanan extends Model
{
	public function tambah($data)
	{
		// $query = $this->insert('tbl_perjalanan', $data);
		// $query = $this->execute();
		// return $query;

		$client = new Client();

		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function lihat()
	{
		// $query = $this->get('tbl_perjalanan');
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['records'];
	}

	public function lihat_id($id)
	{
		// $query = $this->get_where('tbl_perjalanan', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function ubah($data, $id)
	{
		// $query = $this->update('tbl_perjalanan', $data, ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();

		$response = $client->request('PUT', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan/' . $id, [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function cek($id)
	{
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus($id)
	{
		// $query = $this->delete('tbl_perjalanan', ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}
