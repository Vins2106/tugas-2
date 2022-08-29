<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'functions.php';
/**
* This is Example Controller
*/
class Example extends CI_Controller
{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('apotek_data');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
       
        $data['nullstock'] = $this->apotek_data->countstock();
        $data['nullex'] = $this->apotek_data->countex();
        $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		$this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
	}

	

	function index() {
		$data['stockobat'] = $this->apotek_data->count_med();
		$data['stockkat'] = $this->apotek_data->count_cat();
		$data['sup'] = $this->apotek_data->count_sup();
		$data['unit'] = $this->apotek_data->count_unit();
		$data['inv'] = $this->apotek_data->count_inv();
		$data['pur'] = $this->apotek_data->count_pur();
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();

		$this->template->write('title', 'Beranda', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/mypage', $data, true);

		$this->template->render();
	}

	

	function dashboard() {
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write('header', 'Dashboard');
		$this->template->write_view('content', 'tes/dashboard', '', true);

		$this->template->render();
	}

	

	function table_exp() {
		$data['table_exp'] = $this->apotek_data->expired()->result();
		$data['table_alex'] = $this->apotek_data->almostex()->result();
		$this->template->write('title', 'Obat kedaluwarsa', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_exp', $data, true);

		$this->template->render();

	}

	function table_stock() {
		$data['table_stock'] = $this->apotek_data->outstock()->result();
		$data['table_alstock'] = $this->apotek_data->almostout()->result();
		$this->template->write('title', 'Obat Habis', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_stock', $data,  true);

		$this->template->render();
	}

	function form_cat() {
		$this->template->write('title', 'Tambah Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_cat', '', true);

		$this->template->render();
	}

	function form_unit() {
		$this->template->write('title', 'Tambah Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_unit', '', true);

		$this->template->render();
	}

	function form_med() {
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$this->template->write('title', 'Tambah Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_med', $data, true);

		$this->template->render();
	}


	function table_med() {
		
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$this->template->write('title', 'Lihat Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_med', $data, true);

		$this->template->render();
	}

	function table_unit() {
		
		$data['table_unit'] = $this->apotek_data->unit()->result();
		$this->template->write('title', 'Lihat Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_unit', $data, true);

		$this->template->render();
		
	}


	function invoice_report() {		
		$this->template->write('title', 'Grafik Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/invoice_report', true);

		$this->template->render();
		
	}

	function purchase_report() {

		$this->template->write('title', 'Grafik Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/purchase_report', true);

		$this->template->render();
		
	}

	function report() {
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();
		$data['report'] = $this->apotek_data->get_report();
		$this->template->write('title', 'Laporan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/report', $data, true);

		$this->template->render();
		
	}

	function table_cat() {
		
		$data['table_cat'] = $this->apotek_data->category()->result();
		$this->template->write('title', 'Lihat Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_cat', $data, true);

		$this->template->render();
	}

	function table_sup() {
		$data['table_sup'] = $this->apotek_data->supplier()->result();
		
		$this->template->write('title', 'Lihat Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_sup', $data, true);

		$this->template->render();
	}

	

	function form_sup() {
		$this->template->write('title', 'Tambah Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_sup', '', true);

		$this->template->render();
	}


	

	function form_invoice() {
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_med'] = $this->apotek_data->get_medicine();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$this->template->write('title', 'Tambah Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_invoice', $data, true);

		$this->template->render();
	}


	function form_purchase() {
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		
		$data['get_med'] = $this->apotek_data->get_medicine();
		
		$this->template->write('title', 'Tambah Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_purchase', $data, true);

		$this->template->render();
	}

	function table_purchase() {
		$data['table_purchase'] = $this->apotek_data->purchase()->result();
		
		$this->template->write('title', 'Lihat Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_purchase', $data, true);

		$this->template->render();
	}

	function getmedbysupplier(){
        $nama_pemasok=$this->input->post('nama_pemasok');
        $data=$this->apotek_data->getmedbysupplier($nama_pemasok);
        echo json_encode($data);
    }


	

	function form_customer() {
		$this->template->write('title', 'Tambah Pelanggan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_customer', '', true);

		$this->template->render();
	}

	

	function table_customer() {
		$this->template->write('title', 'Lihat Pelanggan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_customer', '', true);

		$this->template->render();
	}

	function table_invoice() {
		$data['table_invoice'] = $this->apotek_data->invoice()->result();
		$this->template->write('title', 'Lihat Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_invoice', $data, true);

		$this->template->render();
	}



	function add_medicine()
	{
		$nama_obat = $this->input->post('nama_obat');
		$penyimpanan = $this->input->post('penyimpanan');
		$stok = $this->input->post('stok');
		$unit = $this->input->post('unit');
		$nama_kategori = $this->input->post('nama_kategori');
		$kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
		$des_obat = $this->input->post('des_obat');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pemasok = $this->input->post('nama_pemasok');
 
		$data = array(
			'nama_obat' => $nama_obat,
			'penyimpanan' => $penyimpanan,
			'stok' => $stok,
			'unit' => $unit,
			'nama_kategori' => $nama_kategori,
			'kedaluwarsa' => $kedaluwarsa,
			'des_obat' => $des_obat,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'nama_pemasok' => $nama_pemasok,
			
			);
		$this->apotek_data->insert_data($data,'table_med');

		$this->session->set_flashdata('med_added', 'Obat berhasil ditambahkan');
		redirect('example/table_med');

	}


	function add_category(){
		$nama_kategori = $this->input->post('nama_kategori');
		$des_kat = $this->input->post('des_kat');
 
		$data = array(
			'nama_kategori' => $nama_kategori,
			'des_kat' => $des_kat,
			
			);
		$this->apotek_data->insert_data($data,'table_cat');

		$this->session->set_flashdata('cat_added', 'Kategori berhasil ditambahkan');
		redirect('example/table_cat');
	}

	function add_unit(){
		$unit = $this->input->post('unit');
		$data = array(
			'unit' => $unit,
			
			
			);
		$this->apotek_data->insert_data($data,'table_unit');

		$this->session->set_flashdata('unit_added', 'Unit berhasil ditambahkan');
		redirect('example/table_unit');
	}


	function add_supplier(){
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
 
		$data = array(
			'nama_pemasok' => $nama_pemasok,
			'alamat' => $alamat,
			'telepon' => $telepon,
			);
		$this->apotek_data->insert_data($data,'table_sup');

		$this->session->set_flashdata('sup_added', 'Pemasok berhasil ditambahkan');
		redirect('example/table_sup');
	}

	


	function add_invoice(){
		 
			$nama_pembeli = $this->input->post('nama_pembeli');
			$tgl_beli = date("Y-m-d",strtotime($this->input->post('tgl_beli')));
			$grandtotal = $this->input->post('grandtotal');
			$ref = generateRandomString();
			$nama_obat = $this->input->post('nama_obat');
			$harga_jual = $this->input->post('harga_jual');
			$banyak = $this->input->post('banyak');
			$subtotal = $this->input->post('subtotal');

		foreach($nama_obat as $key=>$val){
		   
		$data[] = array(
				'nama_pembeli' => $nama_pembeli,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $ref,
				'nama_obat' => $val,
				'harga_jual' => $harga_jual[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
				
				);

		$this->db->set('stok', 'stok-'.$banyak[$key], FALSE);
	    $this->db->where('nama_obat', $val);
	    $updated = $this->db->update('table_med');
		
		}
		
		$this->db->insert_batch('table_invoice', $data);

		$this->session->set_flashdata('inv_added', 'Penjualan berhasil ditambahkan');
		redirect('example/table_invoice');
	}

	function add_purchase(){
		 
			$nama_pemasok = $this->input->post('nama_pemasok');
			$tgl_beli = date("Y-m-d",strtotime($this->input->post('tgl_beli')));
			$grandtotal = $this->input->post('grandtotal');
			$ref = generateRandomString();
			$nama_obat = $this->input->post('nama_obat');
			$harga_beli = $this->input->post('harga_beli');
			$banyak = $this->input->post('banyak');
			$subtotal = $this->input->post('subtotal');

		foreach($nama_obat as $key=>$val){
		   
		$data[] = array(
				'nama_pemasok' => $nama_pemasok,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $ref,
				'nama_obat' => $val,
				'harga_beli' => $harga_beli[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
				
				);

		$this->db->set('stok', 'stok+'.$banyak[$key], FALSE);
	    $this->db->where('nama_obat', $val);
	    $updated = $this->db->update('table_med');
		
		}
		
		$this->db->insert_batch('table_purchase', $data);
		$this->session->set_flashdata('pur_added', 'Pembelian berhasil ditambahkan');
		redirect('example/table_purchase');
		
	}



	function invoice_page($ref) {
		$where = array('ref' => $ref);
		$data['table_invoice'] = $this->apotek_data->show_data($where, 'table_invoice')->result();
		$data['show_invoice'] = $this->apotek_data->show_invoice($where, 'table_invoice')->result();
		$this->template->write('title', 'Invoice Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/invoice', $data, true);

		$this->template->render();
	}


	function purchase_page($ref) {
		$where = array('ref' => $ref);
		$data['table_purchase'] = $this->apotek_data->show_data($where, 'table_purchase')->result();
		$data['show_invoice'] = $this->apotek_data->show_invoice($where, 'table_purchase')->result();
		$this->template->write('title', 'Invoice Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/purchase', $data, true);

		$this->template->render();
	}


	function edit_form_cat($id_kat) {
		$where = array('id_kat' => $id_kat);
		$data['table_cat'] = $this->apotek_data->edit_data($where,'table_cat')->result();
		$this->template->write('title', 'Ubah Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_cat', $data, true);

		$this->template->render();
	}

	function update_category(){
		$id_kat = $this->input->post('id_kat');
		$nama_kategori = $this->input->post('nama_kategori');
		$des_kat = $this->input->post('des_kat');

		$data = array(
			'nama_kategori' => $nama_kategori,
			'des_kat' => $des_kat,
		);

		$where = array(
			'id_kat' => $id_kat
		);

		$this->apotek_data->update_data($where,$data,'table_cat');

		$this->session->set_flashdata('cat_added', 'Data kategori berhasil diperbarui');
		redirect('example/table_cat');
	}

	function edit_form_med($id_obat) {
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$where = array('id_obat' => $id_obat);
		$data['table_med'] = $this->apotek_data->edit_data($where,'table_med')->result();
		$this->template->write('title', 'Ubah Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_med', $data, true);

		$this->template->render();
	}

	function update_medicine(){
		$id_obat = $this->input->post('id_obat');
		$nama_obat = $this->input->post('nama_obat');
		$penyimpanan = $this->input->post('penyimpanan');
		$stok = $this->input->post('stok');
		$unit = $this->input->post('unit');
		$nama_kategori = $this->input->post('nama_kategori');
		$kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
		$des_obat = $this->input->post('des_obat');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pemasok = $this->input->post('nama_pemasok');
	
		$data = array(
			'nama_obat' => $nama_obat,
			'penyimpanan' => $penyimpanan,
			'stok' => $stok,
			'unit' => $unit,
			'nama_kategori' => $nama_kategori,
			'kedaluwarsa' => $kedaluwarsa,
			'des_obat' => $des_obat,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'nama_pemasok' => $nama_pemasok,
		);

		$where = array(
			'id_obat' => $id_obat
		);

		$this->apotek_data->update_data($where,$data,'table_med');
		$this->session->set_flashdata('med_added', 'Data obat berhasil diperbarui');
		redirect('example/table_med');
	}


	function edit_form_sup($id_pem) {
		$where = array('id_pem' => $id_pem);
		$data['table_sup'] = $this->apotek_data->edit_data($where,'table_sup')->result();
		$this->template->write('title', 'Ubah Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_sup', $data, true);

		$this->template->render();
	}

	function edit_form_unit($id_unit) {
		$where = array('id_unit' => $id_unit);
		$data['table_unit'] = $this->apotek_data->edit_data($where,'table_unit')->result();
		$this->template->write('title', 'Ubah Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_unit', $data, true);

		$this->template->render();
	}


	function update_supplier(){
		$id_pem = $this->input->post('id_pem');
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$data = array(
			'nama_pemasok' => $nama_pemasok,
			'alamat' => $alamat,
			'telepon' => $telepon,
		);

		$where = array(
			'id_pem' => $id_pem
		);

		$this->apotek_data->update_data($where,$data,'table_sup');

		$this->session->set_flashdata('sup_added', 'Data pemasok berhasil diperbarui');
		redirect('example/table_sup');
	}

	function update_unit(){
		$id_unit = $this->input->post('id_unit');
		$unit = $this->input->post('unit');
		
		$data = array(
			'unit' => $unit,
		
		);

		$where = array(
			'id_unit' => $id_unit
		);

		$this->apotek_data->update_data($where,$data,'table_unit');

		$this->session->set_flashdata('unit_added', 'Data unit berhasil diperbarui');
		redirect('example/table_unit');
	}


	function remove_med($id_obat){
		$where = array('id_obat' => $id_obat);
		$this->apotek_data->delete_data($where,'table_med');
		redirect('example/table_med');
	}

	function remove_cat($id_kat){
		$where = array('id_kat' => $id_kat);
		$this->apotek_data->delete_data($where,'table_cat');
		redirect('example/table_cat');
	}

	function remove_sup($id_pem){
		$where = array('id_pem' => $id_pem);
		$this->apotek_data->delete_data($where,'table_sup');
		redirect('example/table_sup');
	}

	function remove_unit($id_unit){
		$where = array('id_unit' => $id_unit);
		
		$this->apotek_data->delete_data($where,'table_unit');
		redirect('example/table_unit');
	}


	function remove_inv($ref){
		$where = array('ref' => $ref);
		$this->apotek_data->delete_data($where,'table_invoice');


		redirect('example/table_invoice');
	}

	function remove_purchase($ref){
		$where = array('ref' => $ref);
		$this->apotek_data->delete_data($where,'table_purchase');
		redirect('example/table_purchase');
	}


	 function product()
	{
	    $nama_obat=$this->input->post('nama_obat');
        $data=$this->apotek_data->get_product($nama_obat);
        echo json_encode($data);
	}

	 


	function chart()
	{
       $data = $this->apotek_data->get_chart_cat();
		echo json_encode($data);
	}

	function chart_unit()
	{
       $data = $this->apotek_data->get_chart_unit();
		echo json_encode($data);
	}


	function chart_trans()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_chart_trans($tahun_beli);
		echo json_encode($data);
	}

	function chart_purchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_chart_purchase($tahun_beli);
		echo json_encode($data);
	}

	function gabung()
	{
       $tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_gabung($tahun_beli);
		echo json_encode($data);
	}

	function topdemand()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->topDemanded($tahun_beli);
		echo json_encode($data);
	}

	function leastdemand()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->leastDemanded($tahun_beli);
		echo json_encode($data);
	}

	function highearn()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->highestEarners($tahun_beli);
		echo json_encode($data);
	}

	function lowearn()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->lowestEarners($tahun_beli);
		echo json_encode($data);
	}

	function toppurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->topPurchase($tahun_beli);
		echo json_encode($data);
	}

	function leastpurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->leastPurchase($tahun_beli);
		echo json_encode($data);
	}

	function highpurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->highestPurchase($tahun_beli);
		echo json_encode($data);
	}

	function lowpurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->lowestPurchase($tahun_beli);
		echo json_encode($data);
	}



	function totale()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_tot($tahun_beli);
		echo json_encode($data);
	}

	

    

	

}









