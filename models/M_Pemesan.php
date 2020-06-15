<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Pemesan extends Model
{
	public function lihat()
	{
		// $query = $this->get('tbl_pemesan', ['nama', 'jenis_kelamin', 'id']);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['records'];
	}

	public function tambah($data)
	{
		// $query = $this->insert('tbl_pemesan', $data);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function lihat_id($id)
	{
		// $query = $this->get_where('tbl_pemesan', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function ubah($data, $id)
	{
		// $query = $this->update('tbl_pemesan', $data, ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('PUT', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan/' . $id, [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function cek($id)
	{
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function detail($id)
	{
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus($id)
	{
		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}
