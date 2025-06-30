<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Form API</title>
    </head>
    <body>
        <h3>Direktori Inovasi</h3>
        <form method="post" action="<?= base_url('index.php/api/get_direktori') ?>" target="_blank">
            <label>Kabupaten/Kota</label>
            <select name="kabkota" required="">
                <option value="">--Pilih--</option>
                <option value="kk3304">Kabupaten Banjarnegara</option>
                <option value="kk3302">Kabupaten Banyumas</option>
                <option value="kk3325">Kabupaten Batang</option>
                <option value="kk3316">Kabupaten Blora</option>
                <option value="kk3309">Kabupaten Boyolali</option>
                <option value="kk3329">Kabupaten Brebes</option>
                <option value="kk3301">Kabupaten Cilacap</option>
                <option value="kk3321">Kabupaten Demak</option>
                <option value="kk3315">Kabupaten Grobogan</option>
                <option value="kk3320">Kabupaten Jepara</option>
                <option value="kk3313">Kabupaten Karanganyar</option>
                <option value="kk3305">Kabupaten Kebumen</option>
                <option value="kk3324">Kabupaten Kendal</option>
                <option value="kk3310">Kabupaten Klaten</option>
                <option value="kk3319">Kabupaten Kudus</option>
                <option value="kk3308">Kabupaten Magelang</option>
                <option value="kk3318">Kabupaten Pati</option>
                <option value="kk3326">Kabupaten Pekalongan</option>
                <option value="kk3327">Kabupaten Pemalang</option>
                <option value="kk3303">Kabupaten Purbalingga</option>
                <option value="kk3306">Kabupaten Purworejo</option>
                <option value="kk3317">Kabupaten Rembang</option>
                <option value="kk3322">Kabupaten Semarang</option>
                <option value="kk3314">Kabupaten Sragen</option>
                <option value="kk3311">Kabupaten Sukoharjo</option>
                <option value="kk3328">Kabupaten Tegal</option>
                <option value="kk3323">Kabupaten Temanggung</option>
                <option value="kk3312">Kabupaten Wonogiri</option>
                <option value="kk3307">Kabupaten Wonosobo</option>
                <option value="kk3371">Kota Magelang</option>
                <option value="kk3375">Kota Pekalongan</option>
                <option value="kk3373">Kota Salatiga</option>
                <option value="kk3374">Kota Semarang</option>
                <option value="kk3372">Kota Surakarta</option>
                <option value="kk3376">Kota Tegal</option>                          
            </select>
            <input type="submit" name="submit" value="Get data">
        </form>
        
        <h3>Detail inovasi</h3>
        <form method="post" action="<?= base_url('index.php/api/get_inovasi') ?>" target="_blank">
            <label>ID proper</label>
            <input type="text" name="id_proper">
            <input type="submit" name="submit" value="Get data">
        </form>        
    </body>
</html>
