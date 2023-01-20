<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_perhitungan extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();

        $this->load->model('user/M_gejala');
        $this->load->model('user/M_perhitungan');
    }
    public function index()
    {
        $data['content'] = 'user/perhitungan/V_perhitungan';
        $data['gejala'] = $this->M_gejala->get('tbl_gejala')->result();
        $this->load->view('user/Main', $data);
    }

    //perhitungan
    public function hasil_perhitungan()
    {
        $id = $this->input->post('gejala');
        $cf_u = $this->input->post('cf_user');
        for ($i = 0; $i < count($id); $i++) { //sebanyak inputan gejala(pertanyyan user)
            if ($cf_u[$i] != "") {
                $id_gejala[] = $id[$i];
                $cf_user[] = $cf_u[$i];
            }
        }
        // var_dump($id_gejala);
        // echo "<br>";
        // echo "<br>";
        if (count($id_gejala) >= 2) {
            $d_penyakit = $this->M_perhitungan->get_detail_alternatif($id_gejala)->result();
            $nilai = $this->M_perhitungan->get_detail($id_gejala)->result();
            // var_dump($d_penyakit);
            // echo "<br>";
            // echo "<br>";

            foreach ($d_penyakit as $val) {
                $id_p[] = $val->id_penyakit;
                $kd[] = $val->kode_penyakit;
                $penyakit[] = $val->nama_penyakit;
            }

            foreach ($nilai as $val) {
                $id_penyakit[] = $val->id_penyakit;
                $cf_pakar[] = $val->nilai;
            }
            // var_dump($cf_user);
            // echo "<br>";
            // echo "<br>";
            // $id_p = 0;
            $x = 0;
            foreach ($d_penyakit as $key) { //sebanyak penyakit
                $cf_old = 0;
                foreach ($nilai as $val) { //sebanyak nilai pada setiap gejala
                    if ($key->id_penyakit == $val->id_penyakit) {
                        for ($i = 0; $i < count($cf_user); $i++) {
                            if ($id_gejala[$i] == $val->id_gejala) {
                                $cf[] = $cf_pakar[$x] * $cf_user[$i]; //CF
                                // echo $cf_pakar[$x] . "*" . $cf_user[$i] . "|";
                                // echo "<br>";

                                $cf_com[] = $cf_old + (($cf_pakar[$x] * $cf_user[$i]) * (1 - $cf_old)); //CF combine
                                // echo "com=" . $cf_old . "+" . ($cf_pakar[$x] * $cf_user[$i]) . " * (" . (1) . " - " . $cf_old .  ")= ";

                                $cf_old = $cf_old + ($cf_pakar[$x] * $cf_user[$i]) * (1 - $cf_old); //cf old
                                // echo ($cf_old + ($cf_pakar[$x] * $cf_user[$i])) * (1 - $cf_old) . " (";
                                // echo "(" . $cf_old . ")<br>";
                            }
                        }
                        // echo "<br>";
                        // echo "<br>";
                        $id_p[] = $id_penyakit[$x];
                        $x++;
                    }
                }
                // echo "pb";
                // echo "<br>";
                // echo "<br>";
                // var_dump($cf_com);
                // echo "<br>";
                // echo "<br>";
                $cf_akhir[] = end($cf_com) * 100;
                unset($cf); //meghilangkan nilai pada array cf
                unset($cf_com); //menghilangkan nilai pada array cf_com
            }

            //Perangkingan
            for ($i = 0; $i < count($penyakit); $i++) { //sebanyak baris
                $rank[$i]['id'] = $id_p[$i];
                $rank[$i]['kode'] = $kd[$i];
                $rank[$i]['penyakit'] = $penyakit[$i];
                $rank[$i]['nilai'] = $cf_akhir[$i];
            }
            array_multisort(array_column($rank, "nilai"), SORT_DESC, $rank); //sort dari nilai terbesar ke terkecil

            for ($i = 0; $i < count($penyakit); $i++) { //sebanyak baris
                $hasil[$i]['id'] = $rank[$i]['id'];
                $hasil[$i]['kode'] = $rank[$i]['kode'];
                $hasil[$i]['penyakit'] = $rank[$i]['penyakit'];
                $hasil[$i]['nilai'] = $rank[$i]['nilai'];
                $hasil[$i]['rank'] = $i + 1;
            }
            array_multisort(array_column($hasil, "rank"), SORT_ASC, $hasil); //sort dari rank terkecil ke terbesar

            // var_dump($id_penyakit);
            // echo "<br>";
            // echo "<br>";
            // var_dump($cf_akhir);
            $terpilih = $this->M_perhitungan->get_penyakit($hasil[0]['id'])->result(); //mengambil rincian data penyakit terpilih

            $data['id'] = $id;
            $data['id_gejala'] = $id_gejala;
            $data['cf_u'] = $cf_u;
            $data['d_penyakit'] = $d_penyakit;
            $data['nilai'] = $nilai;
            $data['cf_pakar'] = $cf_pakar;
            $data['cf_user'] = $cf_user;
            $data['cf_akhir'] = $cf_akhir;
            $data['terpilih'] = $terpilih;
            $data['hasil'] = $hasil;
            $data['id_penyakit'] = $hasil[0]['id'];

            $kondisi = $this->input->post('kondisi');
            if ($kondisi) { //jika telah melalui tahap diagnosa lanjutan
                foreach ($terpilih as $key) {
                    $nilai_gp[] = $key->nilai; //nilai pakar gejala
                }

                $tamp = 0;
                for ($i = 0; $i < count($nilai_gp); $i++) {
                    if ($kondisi[$i] == "YA") { //jika user menjawab "YA" pada diagnosa lanjutan
                        $tamp += $nilai_gp[$i];
                    }
                }
                $persentase_penyakit = ($tamp / array_sum($nilai_gp)) * 100;

                $data['kondisi'] = $kondisi;
                $data['persentase'] = $persentase_penyakit;
                $data['content'] = 'user/perhitungan/V_hasil_perangkingan';
                $this->load->view('user/Main', $data);
            } else { //jika belum melewati tahap diagnosa lanjutan
                $data['content'] = 'user/perhitungan/V_hasil_perhitungan';
                $this->load->view('user/Main', $data);
            }
        } else {
            $this->session->set_flashdata('error', ' Silahkan Pilih Minimal 2 Gejala!');
            redirect('c_perhitungan/');
        }
    }
}
