<?php
/**
* This is Data Model
*/
class Apotek_data extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	function medicine()
    {
        return $this->db->get('table_med');
    }

    function category()
    {
        return $this->db->get('table_cat');
    }

    function supplier()
    {
        return $this->db->get('table_sup');
    }

    function unit()
    {
        return $this->db->get('table_unit');
    }

    function invoice()
    {
        $this->db->select('*');
            
            $this->db->select_sum('table_invoice.banyak');
        
            $this->db->group_by('ref');
            $this->db->order_by ('tgl_beli', 'DESC');

            $run_q = $this->db->get('table_invoice');
            return $run_q;
    }


    function purchase()
    {
        $this->db->select('*');
            
            $this->db->select_sum('table_purchase.banyak');
        
            $this->db->group_by('ref');
            $this->db->order_by ('tgl_beli', 'DESC');

            $run_q = $this->db->get('table_purchase');
            return $run_q;
    }

    function get_category()
    {
        $data = array();
        $query = $this->db->get('table_cat')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_kategori']] = $row['nama_kategori'];
        }
        }
        asort($data);
        return $data;
    }  

    function get_supplier()
    {
        $data = array();
        $query = $this->db->get('table_sup')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_pemasok']] = $row['nama_pemasok'];
        }
        }
        asort($data);
        return $data;
    }

     

    function get_unit()
    {
        $data = array();
        $query = $this->db->get('table_unit')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['unit']] = $row['unit'];
        }
        }
        asort($data);
        return $data;
    }


    function get_medicine()
    {
        $data = array();
        $query = $this->db->get('table_med')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_obat']] = $row['nama_obat'];
        }
        }
        asort($data);
        return $data;
    }

      function get_product($nama_obat)
    {   $hasil = array();
        $hsl=$this->db->query("SELECT * FROM table_med WHERE nama_obat='$nama_obat'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nama_obat' => $data->nama_obat,
                    'stok' => $data->stok,
                    'unit' => $data->unit,
                    'harga_jual' => $data->harga_jual,
                    'harga_beli' => $data->harga_beli,
                    
                    );
            }
        }
        return $hasil;
    }

    function getmedbysupplier($nama_pemasok){
        $hasil=$this->db->query("SELECT * FROM table_med WHERE nama_pemasok='$nama_pemasok'");
        return $hasil->result();
    }

    
    function insert_data($data,$table){
        $this->db->insert($table,$data);
    }

    function edit_data($where,$table){      
        return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }  

    function delete_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    }

    function show_data($where, $table){      
        $this->db->select('*');
            $this->db->select_sum('banyak');
            $run_q = $this->db->get_where($table,$where);
            return $run_q;
    }

    function show_invoice($where, $table){      
        $this->db->select('*');
            $run_q = $this->db->get_where($table,$where);
            return $run_q;
    }


    function topDemanded($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_invoice.banyak) as 'totSold' FROM table_med 
                INNER JOIN table_invoice ON table_med.nama_obat=table_invoice.nama_obat AND YEAR(table_invoice.tgl_beli)= '$tahun_beli' GROUP BY table_invoice.nama_obat ORDER BY totSold DESC ";

        $run_q = $this->db->query($q);

        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totSold" => $data['totSold'],
                    
                );
            }
            return $hasil;
    }


    public function leastDemanded($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_invoice.banyak) as 'totSold' FROM table_med 
                INNER JOIN table_invoice ON table_med.nama_obat=table_invoice.nama_obat AND YEAR(table_invoice.tgl_beli)= '$tahun_beli' GROUP BY table_invoice.nama_obat ORDER BY totSold ASC ";

        $run_q = $this->db->query($q);

        
        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totSold" => $data['totSold'],
                    
                );
            }
            return $hasil;
    }

    public function highestEarners($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_invoice.subtotal) as 'totEarned' FROM table_med 
                INNER JOIN table_invoice ON table_med.nama_obat=table_invoice.nama_obat
                AND YEAR(table_invoice.tgl_beli)= '$tahun_beli' 
                GROUP BY table_invoice.nama_obat 
                ORDER BY totEarned DESC ";

        $run_q = $this->db->query($q);

         $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totEarned" => $data['totEarned'],
                    
                );
            }
            return $hasil;
    }

    public function lowestEarners($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_invoice.subtotal) as 'totEarned' FROM table_med 
               INNER JOIN table_invoice ON table_med.nama_obat=table_invoice.nama_obat
               AND YEAR(table_invoice.tgl_beli)= '$tahun_beli' 
               GROUP BY table_invoice.nama_obat 
               ORDER BY totEarned ASC ";
       
        $run_q = $this->db->query($q);


        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totEarned" => $data['totEarned'],
                    
                );
            }
            return $hasil;
    }



    public function topPurchase($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_purchase.banyak) as 'totSold' FROM table_med 
                INNER JOIN table_purchase ON table_med.nama_obat=table_purchase.nama_obat
                AND YEAR(table_purchase.tgl_beli)= '$tahun_beli'
                GROUP BY table_purchase.nama_obat ORDER BY totSold DESC ";

        $run_q = $this->db->query($q);

        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totSold" => $data['totSold'],
                    
                );
            }
            return $hasil;
    }


    public function leastPurchase($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_purchase.banyak) as 'totSold' FROM table_med 
                INNER JOIN table_purchase ON table_med.nama_obat=table_purchase.nama_obat 
                 AND YEAR(table_purchase.tgl_beli)= '$tahun_beli'
                GROUP BY table_purchase.nama_obat ORDER BY totSold ASC ";

        $run_q = $this->db->query($q);

        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totSold" => $data['totSold'],
                    
                );
            }
            return $hasil;
    }

    public function highestPurchase($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_purchase.subtotal) as 'totEarned' FROM table_med 
                INNER JOIN table_purchase ON table_med.nama_obat=table_purchase.nama_obat
                 AND YEAR(table_purchase.tgl_beli)= '$tahun_beli' 
                GROUP BY table_purchase.nama_obat 
                ORDER BY totEarned DESC ";

        $run_q = $this->db->query($q);

        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totEarned" => $data['totEarned'],
                    
                );
            }
            return $hasil;
    }

    public function lowestPurchase($tahun_beli){
        $q = "SELECT table_med.nama_obat, SUM(table_purchase.subtotal) as 'totEarned' FROM table_med 
               INNER JOIN table_purchase ON table_med.nama_obat=table_purchase.nama_obat
                AND YEAR(table_purchase.tgl_beli)= '$tahun_beli'
               GROUP BY table_purchase.nama_obat 
               ORDER BY totEarned ASC ";
       
        $run_q = $this->db->query($q);

        $hasil = array();
        
            foreach($run_q->result_array() as $data){
                $hasil[] = array(
                    "nama_obat" => $data['nama_obat'],
                    "totEarned" => $data['totEarned'],
                    
                );
            }
            return $hasil;
    }



  

    


    function expired(){
        return $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 40 YEAR) AND NOW()'); 
    }

    function almostex(){
        return $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 DAY)');
    }

    function outstock(){        
        return $this->db->query('SELECT * FROM table_med WHERE stok BETWEEN 0 AND 0');           
    }

    function almostout(){        
        return $this->db->query('SELECT * FROM table_med WHERE stok BETWEEN 1 AND 8');           
    }

     function countstock(){       
      $cs =  $this->db->query('SELECT * FROM table_med WHERE stok BETWEEN 0 AND 0'); 
        $nullstock = $cs->num_rows();
        return $nullstock;    
    }

    function countex(){       
    $ce = $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 100 YEAR) AND NOW()');
        $nullex = $ce->num_rows();
        return $nullex;     
    }

    function count_med(){       
      $cm =  $this->db->query('SELECT *, SUM(table_med.stok) as totStock FROM table_med'); 
        if ($cm->num_rows() > 0) {
            foreach ($cm->result() as $get) {
                return $get->totStock;
            }
        }
        else {
            return FALSE;
        }   
    }

    

    function count_cat(){       
      $ck =  $this->db->query('SELECT * FROM table_cat'); 
        $stockkat = $ck->num_rows();
        return $stockkat;    
    }

    function count_sup(){       
      $cp =  $this->db->query('SELECT * FROM table_sup'); 
        $sup = $cp->num_rows();
        return $sup;    
    }

    function count_unit(){       
      $cu =  $this->db->query('SELECT * FROM table_cat'); 
        $cunit = $cu->num_rows();
        return $cunit;    
    }

    function count_inv(){       
       $q = "SELECT count(DISTINCT REF) as 'totalTrans' FROM table_invoice";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        }
        else {
            return FALSE;
        }  
    }

    function count_pur(){       
       $q = "SELECT count(DISTINCT REF) as 'totalTrans' FROM table_purchase";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        }
        else {
            return FALSE;
        }  
    }

    function count_totpur(){       
       $q = "SELECT *, SUM(table_purchase.subtotal) as 'totalTrans' FROM table_purchase ";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        }
        else {
            return FALSE;
        }  
    }

    function count_totinv(){       
       $q = "SELECT *, SUM(table_invoice.subtotal) as 'totalTrans' FROM table_invoice";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        }
        else {
            return FALSE;
        }  
    }



    function get_chart_cat(){
        $query = $this->db->query('SELECT nama_kategori, SUM(stok) AS stok FROM table_med GROUP BY nama_kategori');
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "nama_kategori" => $data['nama_kategori'],
                    "stok" => $data['stok'],
                );
            }
            return $hasil;
    }


    function get_chart_unit(){
        $query = $this->db->query('SELECT unit, SUM(stok) AS stok FROM table_med GROUP BY unit');
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "unit" => $data['unit'],
                    "stok" => $data['stok'],
                );
            }
            return $hasil;
    }



    function get_chart_trans($tahun_beli){
        
        $query = $this->db->query("SELECT month.month_name as month, SUM(table_invoice.subtotal) AS total 
            FROM month LEFT JOIN table_invoice ON (month.month_num = MONTH(table_invoice.tgl_beli) AND YEAR(table_invoice.tgl_beli)= '$tahun_beli')
     GROUP BY month.month_name  ORDER BY month.month_num  ");
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "month" => $data['month'],
                    "total" => $data['total'],
                );
            }
            return $hasil;

    }


    function get_chart_purchase($tahun_beli){
        
        $query = $this->db->query("SELECT month.month_name as month, SUM(table_purchase.subtotal) AS total 
            FROM month 
            LEFT JOIN table_purchase ON (month.month_num = MONTH(table_purchase.tgl_beli)  
            AND YEAR(table_purchase.tgl_beli)= '$tahun_beli')
        GROUP BY month.month_name ORDER BY month.month_num");
        
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "month" => $data['month'],
                    "total" => $data['total'],
                );
            }
            return $hasil;

    }

   
    function get_gabung($tahun_beli){
        
       $query = $this->db->query("SELECT m.month_name as month, 
                   i.total_inv, 
                   p.total_pur
                FROM month m
                LEFT JOIN (SELECT MONTH(tgl_beli) as month, 
                            SUM(subtotal) as total_inv  
                            FROM table_invoice
                            WHERE YEAR(tgl_beli)= '$tahun_beli'
                            GROUP BY month) i  ON (m.month_num = i.month)    
                LEFT JOIN (SELECT MONTH(tgl_beli) as month, 
                            SUM(subtotal) as total_pur
                            FROM  table_purchase 
                            WHERE YEAR(tgl_beli)= '$tahun_beli'
                            GROUP BY month) p ON (m.month_num = p.month )
                ORDER BY m.month_num");
        
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "month" => $data['month'],
                    "total_inv" => $data['total_inv'],
                    "total_pur" => $data['total_pur'],
                    
                    
                );
            }
            return $hasil;

    }



   


    public function get_report(){
        $q = "SELECT month.month_name as month, 
            SUM(table_purchase.subtotal) AS total1,
            SUM(table_invoice.subtotal) AS total2  
            FROM month 
            LEFT JOIN table_purchase ON month.month_num = MONTH(table_purchase.tgl_beli)
            AND YEAR(table_purchase.tgl_beli)= '2018'  
            LEFT JOIN table_invoice ON month.month_num = MONTH(table_invoice.tgl_beli)
            AND YEAR(table_invoice.tgl_beli)= '2018' 
            GROUP BY month.month_name ORDER BY month.month_num";
       
        $run_q = $this->db->query($q);

        if($run_q->num_rows() > 0){
            return $run_q->result();
        }

        else{
            return FALSE;
        }
    }


     


     function get_tot($tahun_beli){       
         $query = $this->db->query("SELECT *, (SELECT *, 
                            SUM(subtotal) as total_inv  
                            FROM table_invoice
                            WHERE YEAR(tgl_beli)= '2018'
                            )  
                LEFT JOIN (SELECT *, 
                            SUM(subtotal) as total_pur
                            FROM  table_purchase 
                            WHERE YEAR(tgl_beli)= '2018'
                            )  
                ");
        
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "month" => $data['month'],
                    "total_inv" => $data['total_inv'],
                    "total_pur" => $data['total_pur'],
                    
                    
                );
            }
            return $hasil;
    }







    



}







