<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Akun extends Model
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
		// $query = $this->get('tbl_akun', ['nama', 'username', 'id']);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_akun');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['records'];
	}

	public function tambah($data)
	{
		// $query = $this->insert('tbl_akun', $data);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_akun', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function lihat_id($id)
	{
		// $query = $this->get_where('tbl_akun', ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_akun/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function cek($id)
	{
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_akun/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function cek_login($username)
	{
		// $query = $this->get_where('tbl_akun', ['username' => $username]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_akun');

		$result = json_decode($response->getBody()->getContents(), true);

		// if ($result['records'] === $username) {
		// 	return $result;
		// }
		for ($i = 0; $i < count($result['records']); $i++) {
			if ($result['records'][$i]['username'] === $username) {
				return $result['records'][$i];
			}
		}
	}

	public function detail($id)
	{
		// $query = $this->get_where('tbl_akun', ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_akun/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus($id)
	{
		// $query = $this->delete('tbl_akun', ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_akun/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}
