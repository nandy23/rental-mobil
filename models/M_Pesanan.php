<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class M_Pesanan extends Model
{
	public function tambah($data)
	{
		// $query = $this->insert('tbl_pesanan', $data);
		// $query = $this->execute();
		// return $query;

		$client = new Client();

		$response = $client->request('POST', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function lihat()
	{
		// $query = $this->setQuery("SELECT tbl_pesanan.id, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id");
		// $query = $this->execute();
		// return $query;

		$client = new Client();

		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_mobil');

		$result1 = json_decode($response->getBody()->getContents(), true);

		$response2 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan');

		$result2 = json_decode($response2->getBody()->getContents(), true);

		$response3 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan');

		$result3 = json_decode($response3->getBody()->getContents(), true);

		$response4 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar');

		$result4 = json_decode($response4->getBody()->getContents(), true);

		//$data = [];

		for ($j = 0; $j < count($result2['records']); $j++) {
			for ($k = 0; $k < count($result3['records']); $k++) {
				for ($l = 0; $l < count($result4['records']); $l++) {
					for ($i = 0; $i < count($result1['records']); $i++) {
						if ($result2['records'][$j]['id_pemesan'] === $result3['records'][$k]['id']) {
							if ($result2['records'][$j]['id_mobil'] === $result1['records'][$i]['id']) {
								if ($result2['records'][$j]['id_jenis_bayar'] === $result4['records'][$l]['id']) {
									$data[] = [
										'id' => $result2['records'][$j]['id'],
										'nama_pemesan' => $result3['records'][$k]['nama'],
										'nama_mobil' => $result1['records'][$i]['nama'],
										'jenis_bayar' => $result4['records'][$l]['jenis_bayar']
									];
								}
							}
						}
					}
				}
			}
		}
		// for ($j = 0; $j < count($result2['records']); $j++) {
		// 	for ($k = 0; $k < count($result3['records']); $k++) {
		// 		return $result2['records'][$j]['id_pemesan'] === $result3['records'][$k]['id'];
		// 	}
		// }
		return $data;
	}

	public function lihat_id($id)
	{
		// $query = $this->get_where('tbl_pesanan', ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function ubah($data, $id)
	{
		// $query = $this->update('tbl_pesanan', $data, ['id' => $id]);
		// $query = $this->execute();
		// return $query;

		$client = new Client();
		$response = $client->request('PUT', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan/' . $id, [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function cek($id)
	{
		$client = new Client();
		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus($id)
	{
		// $query = $this->delete('tbl_pesanan', ['id' => $id]);
		// $query = $this->execute();
		// return $query;
		$client = new Client();
		$response = $client->request('DELETE', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan/' . $id);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function detail($id)
	{
		// $query = $this->setQuery("SELECT tbl_pesanan.*, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, tbl_perjalanan.asal, tbl_perjalanan.tujuan, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id INNER JOIN tbl_perjalanan ON tbl_pesanan.id_perjalanan = tbl_perjalanan.id WHERE tbl_pesanan.id = $id");
		// $query = $this->execute();
		// return $query;

		$client = new Client();

		$response = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_mobil');

		$result1 = json_decode($response->getBody()->getContents(), true);

		$response2 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pesanan/' . $id);

		$result2 = json_decode($response2->getBody()->getContents(), true);

		$response3 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_pemesan');

		$result3 = json_decode($response3->getBody()->getContents(), true);

		$response4 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_jenis_bayar');

		$result4 = json_decode($response4->getBody()->getContents(), true);

		$response5 = $client->request('GET', 'http://localhost/php-crud-api/api.php/records/tbl_perjalanan');

		$result5 = json_decode($response5->getBody()->getContents(), true);

		for ($i = 0; $i < count($result1['records']); $i++) {
			for ($k = 0; $k < count($result3['records']); $k++) {
				for ($l = 0; $l < count($result4['records']); $l++) {
					for ($m = 0; $m < count($result5['records']); $m++) {
						if ($result2['id_pemesan'] === $result3['records'][$k]['id']) {
							if ($result2['id_mobil'] === $result1['records'][$i]['id']) {
								if ($result2['id_jenis_bayar'] === $result4['records'][$l]['id']) {
									if ($result2['id_perjalanan'] === $result5['records'][$m]['id']) {
										$nama_pemesan = $result3['records'][$k]['nama'];
										$nama_mobil = $result1['records'][$i]['nama'];
										$jenis_bayar = $result4['records'][$l]['jenis_bayar'];
										$asal = $result5['records'][$m]['asal'];
										$tujuan = $result5['records'][$m]['tujuan'];
									}
								}
							}
						}
					}
				}
			}
		}

		$harga = $result2['harga'];
		$tgl_pinjam = $result2['tgl_pinjam'];
		$tgl_kembali = $result2['tgl_kembali'];
		$id_pemesan = $result2['id_pemesan'];
		$id_mobil = $result2['id_mobil'];
		$id_perjalanan = $result2['id_perjalanan'];
		$id_jenis_bayar = $result2['id_jenis_bayar'];

		$query[] = [
			'id' => $result2['id'],
			'nama_pemesan' => $nama_pemesan,
			'nama_mobil' => $nama_mobil,
			'jenis_bayar' => $jenis_bayar,
			'harga' => $harga,
			'asal' => $asal,
			'tujuan' => $tujuan,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'id_pemesan' => $id_pemesan,
			'id_mobil' => $id_mobil,
			'id_perjalanan' => $id_perjalanan,
			'id_jenis_bayar' => $id_jenis_bayar
		];
		return $query;
	}
}
