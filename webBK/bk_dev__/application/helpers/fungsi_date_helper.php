<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//untuk mengetahui bulan bulan
if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Agu";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}
 
//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
}

//format tanggal yyyy-mm-dd
if ( ! function_exists('format_date_db'))
{
    function format_date_db($tgl)
    {
        $pecah      = explode("/",$tgl);  //memecah variabel berdasarkan -
        $tanggal    = $pecah[0];
        $bulan      = $pecah[1];
        $tahun      = $pecah[2];
        return $tahun.'-'.$bulan.'-'.$tanggal; //hasil akhir
    }
}
 
if ( ! function_exists('format_date_form'))
{
    function format_date_form($tgl)
    {
        $pecah      = explode("-",trimTime($tgl));  //memecah variabel berdasarkan -
        $tanggal    = $pecah[0];
        $bulan      = $pecah[1];
        $tahun      = $pecah[2];
        return $tahun.'/'.$bulan.'/'.$tanggal; //hasil akhir
    }
}
 

 if ( ! function_exists('trimDate'))
{
    function trimDate($tgl)
    {
        $pecah      = explode(" ",$tgl);  //memecah variabel berdasarkan -
        $time    = $pecah[1];
        return $time; //hasil akhir
    }
}

 
//format tanggal timestamp
if( ! function_exists('tgl_indo_timestamp')){
 
function tgl_indo_timestamp($tgl)
{
    $inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
    $tglBaru=explode(" ",$inttime); //memecah berdasarkan spaasi
     
    $tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
    $tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
    $tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -
 
    $tgl=$tglBarua[2];
    $bln=$tglBarua[1];
    $thn=$tglBarua[0];
 
    $bln=bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
    $ubahTanggal="$tgl $bln $thn | $tglBaru2 "; //hasil akhir tanggal
 
    return $ubahTanggal;
}
}

/**
 * trimTime
 *
 * Mengambil bagian tanggal saja dari tipe data DATETIME (bagian waktu dihapus)
 *
 * @access    public
 * @param     string    tgl (yyyy-mm-dd hhhh:mm:dd)
 * @return    integer
 */
if (!function_exists('trimTime')) {
    function trimTime($tgl) {
        $temp = explode(' ', $tgl);
        return $temp[0];
    }
}

if (!function_exists('trimDate')) {
    function trimDate($tgl) {
        $temp = explode(' ', $tgl);
        return $temp[1];
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah($rupiah) {

        return "Rp. ". number_format($rupiah,2,',','.');

 }
}



if ( ! function_exists('tanggal_indo_lengkap')) {
    function tanggal_indo_lengkap($tanggal, $cetak_hari = false, $cetak_waktu = false) {

        if ($tanggal == '0000-00-00') {
            return $tanggal;
            exit;
        }

        $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split    = explode('-', trimTime($tanggal));
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        if ($cetak_hari && $cetak_waktu == FALSE) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }

        if ($cetak_hari && $cetak_waktu) {
            $time = trimDate($tanggal);
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . format_date_form($tanggal) . ' '.$time;
        }

        return $tgl_indo;
    }




     if ( ! function_exists('is_img'))
    {
         function is_img($link='')
        {
            $file = $link;
            $headers = get_headers($file, 1);
            if (strpos($headers['Content-Type'], 'image/') !== false) {
                return 1;
            } else {
                return 2;
            }
        }
    }


}