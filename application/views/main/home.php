<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Puspanita Cawangan Melaka</title>
<link rel="stylesheet" type="text/css" href="<?= base_url("asset"); ?>/css/menu.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?= base_url("asset"); ?>/css/style.css" />

<!--<link href="css/main.css" rel="stylesheet" type="text/css" />

[if IE 6]>
    <script type="text/javascript" src="unitpngfix.js"></script>
<![endif]--> 
<script type="text/javascript" src="<?= base_url("asset"); ?>/js/jquery.js"></script>   
<script type="text/javascript">

function hideall() {
    $("#tab").hide();
    $("#tab1").hide();
    $("#tab2").hide();
    $("#tab3").hide();
    $("#tab4").hide();
                
}
$(document).ready(function(){
    $(".banner").hide(); 
    tryloop(1);
    
    
$(".hilang").hide();
$(".jumpa").hide();

$(".sorok").click(function() {
    $(this).hide();
    $(".hilang").show();
    $(".jumpa").show();
});
$(".jumpa").click(function() {
    $(this).hide();
    $(".hilang").hide();
    $(".sorok").show();
});

$("#icon1").mouseover(function () {
hideall();
$("#tab1").css("display","block");     
});

$("#icon2").mouseover(function () {
hideall();
$("#tab2").css("display","block");     
});

$("#icon3").mouseover(function () {
hideall();
$("#tab3").css("display","block");     
});  

hideall();
$("#tab").show();       

  });

function tryloop(x){
    $('.banner').hide('slow', function() {
        $('#'+x+'x').show('slow');        
    });
    if (x == 4) { x = 1 } else{x = x + 1;};
    timeout = setTimeout('tryloop('+x+')', 10000);
}
  
  
  
  
</script>


    
</head>
<body class="details">
<div class="wrap">
    <div class="header">
        <div class="logo"><a href="index.html"><img src="images/asset/banner.png" alt="" title="" border="0" width = "320px"   /></a></div>

      <ul class="menuTemplate1 decor1_1" license="mylicense">
    <li><a href="index.html">Utama</a></li>
    <li class="separator"></li>
    <li><a href="mengenai_kami.html" class="arrow">Mengenai Kami</a>
        <div class="drop decor1_2" style="width: 900px;">
            <div class='left'>
                <a href="mengenai_kami.html" class="arrow"><b>Mengenai Kami</b></a><br />
                <b>Carta Organisasi</b>
                <div>
                     <a href="cartaOrganisasi.html"> Jawatankuasa Kerja  Tertinggi</a><br />
                   
                </div>
            </div>
            <div class='left'>
                <b>Keahlian PUSPANITA</b>
                <div>
                   <a href="jenisKeahlian.html"> Jenis-jenis  Keahlian</a><br />
                    <a href="yuranKeahlian.html">Yuran Keahlian</a><br />
                    <a href="http://www.puspanita.org.my/website/html/mas/mas_system/index.html">Semakan Keahlian PUSPANITA Cawangan Negeri Melaka   </a><br />
                    <a href="#">Jumlah Keahlian PUSPANITA Cawangan Negeri Melaka</a>
                </div>
            </div>
            <div class='left'>
                <b>Biro - Biro</b>
                <div>
                    <a href="birokeagamaan.html">Biro Agama dan Kebajikan </a><br />
                    <a href="birososial.html"> Biro Sosial</a><br />
                    <a href="biropelajaran.html"> Biro Pelajaran </a><br />
                    <a href="birokeusahawanan.html">Biro Keusahawanan dan Penambahan Wang</a><br />
                    <a href="birosukan.html">Biro Sukan </a><br />
                    <a href="biropublisiti.html"> Biro Publisiti,ICT dan Seranta </a><br />
                    <a href="birokeahlian.html"> Biro Keahlian dan Ahli Seumur Hidup</a><br />
                    <a href="biropembangunan.html">Biro Kesihatan & Pembangunan Lestari  Hijau</a><br />
                   
                   
                </div>
            </div>
            
            <div style='clear: both;'></div>
        </div>
    </li>
    
    <li class="separator"></li>
    <li><a href="#Horizontal-Menus" class="arrow">Hubungi Kami</a>
        <div class="drop decor1_2" style="width: 300px;">
            <div class='left'>  
                <div>
                      <a href="jawatanKuasaPerhubungan.html">Jawatankuasa Perhubungan PUSPANITA </a><br />
                    <a href="rumahpuspanita.html">Rumah PUSPANITA Cawangan Negeri Melaka</a><br />
                    <a href="#">PUSPANITA Daerah Jasin</a><br />
                    <a href="#">PUSPANITA Daerah Alor Gajah</a><br />
                </div>
            </div>
            <div style='clear: both;'></div>
        </div>
    </li>

    
    <li class="separator"></li>
    <li><a href="#Horizontal-Menus" class="arrow">Galeri Aktiviti</a>
        <div class="drop decor1_2" style="width: 250px;">
            <div class='left'>
                <div>
                    <a href="album.html">Gambar</a><br />
                    <a href="video.html">Video</a><br />
                    <a href="#">Keratan Akhbar</a><br />
                    <a href="#">TAKWIM AKTIVITI PUSPANITA 2015</a><br />                
                </div>
            </div>
            
            
         
            <div style='clear: both;'></div>
        </div>
    </li>
    
    <li class="separator"></li>
    <li><a href="#Horizontal-Menus" class="arrow">Muat Turun</a>
          <div class="drop decor1_2 dropToLeft" style="width: 460px;">
          
            <div class='left'>
                <b>BORANG/PAMPLET/BROCHURE</b>
                <div>
                    <a href="pamplettabung.html">Pamplet Tabung PUSPADARA PUSPANITA</a><br />
                    <a href="pampletlatihan.html">Pamplet Brochure Tabung Latihan PUSPANITA</a><br />
                    <a href="asset/download/Permohonan Sumbangan Peralatan Perubatan TPP.pdf">Syarat-Syarat Permohonan & Borang Sumbangan Kewangan TPP</a><br />
                    <a href="asset/download/Syarat-syarat Permohonan & Borang Sumbangan Kewangan TPP.pdf">Permohonan Sumbangan Peralatan Perubatan TPP</a><br />
                    <a href="asset/download/Borang Keahlian Seumur Hidup.pdf">Borang Keahlian Seumur Hidup</a>
                </div>
            </div>
             <div class='left'>
                <b>BULETIN  </b>
                <div>
                    <a href="asset/download/BULETIN PUSPANITA 2012.pdf">2015</a><br />
                      <a href="asset/download/BULETIN PUSPANITA 2014.pdf">2014</a><br />
                </div>
            </div>
            
            <div class='left'>
                <b>SLIDE KURSUS/BENGKEL </b>
                <div>
                    <a href="asset/download/slidekursus/BENGKEL PELAN STRATEGIK PUSPANITA 2014 - 2018.ppsx">Bengkel Pelan Strategik PUSPANITA Cawangan Negeri Melaka 2014-2018</a><br />
                  
                </div>
            </div>
            
             <div class='left'>
                <b>DOKUMENTASI PUSPANITA  </b>
                <div>
                    <a href="asset/download/Perlembagaan_PUSPANITA.pdf">Perlembagaan PUSPANITA</a><br />
                  
                </div>
            </div>  
            
             <div class='left'>
                <b>TEKS UCAPAN  </b>
                <div>
                    <a href="asset/download/teksucapan/TEKS UCAPAN KSN PERASMIAN PERSIDANGAN PUSPANITA 2014.pdf">PERASMIAN PERSIDANGAN PUSPANITA 2014 OLEH KSN</a><br />
                   
                </div>
            </div>
            
             <div class='left'>
                <b>LAGU  </b>
                <div>
                    <a href="asset/download/lagu/MelakaMajuJaya.mp3">Melaka Maju Jaya </a><br />
                     <a href="asset/download/lagu/MelakaMajuNegerikuSayang.mp3">Melaka Maju Negeriku Sayang </a><br />
                      <a href="asset/download/lagu/MelakaMaju2010.mp3"> Melaka Maju Fasa II </a><br />
                       <a href="asset/download/lagu/PUSPANITA.mp3">PUSPANITA  </a><br />
                   
                </div>
            </div>
            
         
            <div style='clear: both;'></div>
        </div>
    </li>
    
        <li class="separator"></li>
    <li><a href="#Horizontal-Menus" class="arrow">Aplikasi/Sistem</a>
          <div class="drop decor1_2 dropToLeft" style="width: 300px;">            
            <div class='right'>
                <b>Aplikasi / Sistem PUSPANITA</b>
                <div>
                    <a href="#">Sistem Keahlian PUSPANITA </a><br />
                    <a href="#">Sistem Permohonana Sukarelawan Kesihatan </a><br />
               
                </div>
            </div>
            
                <div class='right'>
                <b>Sistem Atas Talian SUK MELAKA</b>
                <div>
                    <a href="https://ebayar.melaka.gov.my/">E-bayar</a><br />
                    <a href="https://ehartanah.melaka.gov.my">E-hartanah </a><br />
                    <a href="https://melaka.spab.gov.my">Sistem Pengurusan Aduan Awam </a><br />
                    <a href="https://tapemonline.melaka.gov.my">Tapemonline</a><br />
                    <a href="https://espeks.melaka.gov.my/espeks">E-speks</a><br />
                    <a href="https://niaga.melaka.gov.my">Niaga</a><br />
                    <a href="https://cw.melaka.gov.my">CW Melaka</a><br />
                    <a href="https://geoportal.melaka.gov.my">Geoportal Melaka</a><br />
               
                </div>
            </div>
            
         
            <div style='clear: both;'></div>
        </div>
    </li>
    
         <li class="separator"></li>
    <li><a href="#Web-Menus" class="arrow">Maklumbalas</a>
        <div class="drop decor1_2 dropToLeft" style="width: 250px;">
          
            <div class='left'>
                <b>Cadangan</b>
                <div>
                    <a href="borang.html">Borang Maklum Balas</a><br />
                    
                    <a href="#">WebMail</a><br />
                     <!--<a href="#">Info Pelancongan Melaka </a><br />-->
                </div>
                
            </div>
        </div>
    </li> 
    
        
    
    </ul>
        

           
    </div> <!--End of header-->
    
    
    <div class="home_center_content">
    

                    <div >
                        <div class = "banner" id = '1x'>
                        <img src="images/asset/banner/1.png" width = "900px" height ="auto" ></div>
                        <div class = "banner" id = '2x'>
                        <img src="images/asset/banner/2.png" width = "900px" height ="auto" ></div>
                        <div class = "banner" id = '3x'>
                        <img src="images/asset/banner/3.png" width = "900px" height ="auto" ></div>
                        <div class = "banner" id = '4x'>
                        <img src="images/asset/banner/4.png" width = "900px" height ="auto" ></div>
                    <!--<div class="box1" id="tab">
                    <div class="center_text">
                    <div class="big_title">Portal Rasmi <span>PUSPANITA</span> Cawangan <span>Melaka</span></div>
                        <p>Tulis kata aluan Kt sini </p>
                    
                    </div>
                    <div class="right_img"><img src="images/asset/ajk.jpg" alt="image" title="" width = '360' hight = '270'/></div>
                    </div>
                    
                    <div class="box1" id="tab1">
                    <div class="center_text">
                    <div class="big_title">Portal Rasmi <span>PUSPANITA</span> Cawangan <span>Melaka</span></div>
                        <p>Tulis kata aluan Kt sini </p>
                    </div>
                    
                    <div class="right_img"><img src="images/asset/ajk.jpg" alt="image" title="" width = '360' hight = '270' /></div>
                    </div>
                    
                    <div class="box1" id="tab2">
                    <div class="center_text">
                    <div class="big_title">Best <span>clients</span> and work <span>!</span></div>
                        <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                    <div class="right_img"><img src="images/pic2.jpg" alt="image" title="" /></div>
                    
                    </div>
                    
                    <div class="box1" id="tab3">
                    <div class="center_text">
                    <div class="big_title">Well <span>organized</span> team <span>!</span></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                    <div class="right_img"><img src="images/pic3.jpg" alt="image" title="" /></div>
                    </div>
                    
                    <ul class="center_button_icons tabset">
                    
                        <li id="icon1">
                        <a href="#tab1" class="tab">
                            <img src="images/icon_news.gif" border="0" alt="image" title="" /> 
                        </a>
                        </li>
                        
                        <li id="icon2">                     
                        <a href="#tab2" class="tab">
                            <img src="images/icon_work.gif" border="0"  alt="image" title=""/> 
                        </a>
                        </li>
                    
                        <li id="icon3">
                        <a href="#tab3" class="tab">             
                        <img src="images/icon_team.gif" border="0" alt="image" title="" />   
                        </a>                            
                        </li>
                    
                        <li>
                        <a href="#tab" class="tab active"></a>
                        </li>
                    </ul>-->
                    </div>

    
    </div> <!--End of home_center_content-->
    
    <div class="main_content">
            <div class="left_content">
                <h1>Perutusan Pengerusi</h1>
                <p align = "center"><img src="images/asset/utama/pic1.jpg" width = "80px" hight = 'auto'><br/></p>
                <span><strong>Assalamualaikum..</strong></span>
<br /><br />
Selamat datang dan terima kasih di atas kunjungan anda ke Portal Rasmi PUSPANITA Cawangan Negeri .
<br/><br/>Bersyukur saya kepada Allah S.W.T kerana dengan limpah kurnia dan inayahNya, Portal Rasmi PUSPANITA Cawangan Negeri Melaka ini dapat dibangunkan dengan jayanya. Sekalung penghargaan dan syabas diucapkan terutamanya kepada Biro Seranta,Publisiti dan ICT, PUSPANITA Cawangan Negeri Melaka 2015 di atas segala usaha yang dijalankan untuk membangunkan portal rasmi PUSPANITA Cawangan Negeri Melaka ini selaras dengan maklumat terkini.<br/><br/>

<a class = "sorok">Paparan Penuh</a><div class = "hilang">Usaha membangunkan portal ini bukanlah satu tugas yang mudah seperti kata pepatah " Kalau Tidak Dipecahkan Ruyung Manakan Dapat Sagunya". Oleh itu saya juga mengucapkan jutaan terima kasih di atas semua Jawatankuasa PUSPANITA Cawangan Negeri Melaka 2015 yang turut sama membantu menyediakan  maklumat yang berkaitan dengan PUSPANITA.Komitmen oleh semua Jawatankuasa adalah amat diperlukan dalam usaha membangunkan portal  ini.<br/><br/>

Portal Rasmi PUSPANITA Cawangan Negeri Melaka  ini merupakan salah satu saluran/medium untuk  mendapatkan maklumat dan info terkini berkenaan dengan aktiviti yang akan dilaksanakan oleh PUSPANITA Cawangan Negeri Melaka ini. Walaupun pada era ini, rangkaian media sosial seperti facebook,twitter,instagram,myspace dan pelbagai media sosial di gunakan secara meluas dikalangan masyarakat,namun portal Rasmi PUSPANITA Cawangan Negeri Melaka adalah merupakan saluran rasmi untuk menyampaikan maklumat dan info yang terkini.<br/><br/>

Selain maklumat dan info terkini PUSPANITA yang disediakan oleh PUSPANITA Cawangan Negeri Melaka, terdapat juga aplikasi baru yang disediakan oleh PUSPANITA Kebangsaan untuk kemudahan ahli PUSPANITA seperti semakan keahlian PUSPANITA.<br/><br/>

Disamping kesibukan melaksanakan tugas harian yang berdepan dengan orang awam serta tanggungjawab kepada keluarga,masa yang diluangkan untuk menyumbangkan idea dan tenaga masing-masing dalam memastikan pertubuhan ini terus bergerak cemerlang adalah amat dihargai.<br/><br/>

Tahniah kepada ahli-ahli PUSPANITA Cawangan Negeri Melaka yang begitu aktif menjalankan pelbagai aktiviti yang bermanfaat,<br/><br/>

Akhir kata bagi pihak PUSPANITA Cawangan Negeri Melaka,semoga portal rasmi ini dapat dijadikan sebagai rujukan ahli PUSPANITA untuk mendapatkan maklumat dan pihak kami akan  akan sentiasa mengemaskini maklumat-maklumat dari semasa ke semasa.<br/><br/>

<p>Selamat Melayari Portal Rasmi PUSPANITA Cawangan Negeri Melaka</p><br/>
Sekian Terima Kasih.<br/><br/>
YBhg Datin Wira Hjh Rafeah Hanim binti Hj. Johari<br/>
Pengerusi PUSPANITA Cawangan Negeri Melaka<br/></div>
<a class = "jumpa">Tutup Paparan</a>

                </p>
                <p>
<div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/pages/Puspanita-Kebangsaan/240754462700068" data-width="415px" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;color_scheme=light&amp;container_width=966&amp;header=true&amp;height=400&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FPuspanita-Kebangsaan%2F240754462700068&amp;locale=en_GB&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=true&amp;width=1400"><span style="vertical-align: bottom; width: 415px; height: 400px;"><iframe name="f2d9c6a23" width="1400px" height="400px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/v2.3/plugins/like_box.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df29d33e944%26domain%3Dwww.puspanita.org.my%26origin%3Dhttp%253A%252F%252Fwww.puspanita.org.my%252Ffe3e4a894%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=966&amp;header=true&amp;height=400&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FPuspanita-Kebangsaan%2F240754462700068&amp;locale=en_GB&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=true&amp;width=1400" style="border: none; visibility: visible; width: 415px; height: 400px;" class=""></iframe></span></div>
                </p>
                <!--<h1>Email Newsletter</h1>
                <p>
Subscribe to our newsletter to stay up to date with us.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                </p> 
                <div class="newsletter">
                <input type="text" class="input" value="email" onclick="this.value=''"/>
                <input type="image" src="images/subscribe.gif" class="subscribe" />
                </div>-->       
                
            
            </div> <!--End of left_content-->
            
            <div class="right_content">
                <h1>Aktiviti Terkini</h1>
                <div class="project_box">                    
                    <a href="#"><img src="images/asset/aktiviti/pic1.jpg" alt="" title="" border="0" class="feat_project" width = "381px" height = "200px" /></a>
                    <div class="project_details">
                    <span class="left">Program 1M4U Walk For SEN</span><br/>
                    <span class="left"><a href="galeri14.html" class="view">Papar Aktiviti</a></span>
                    </div>
                </div>
                
                <h1 class="orange">KALENDAR AKTIVITI PUSPANITA 2015</h1>
                <div class="news_box">
                <!--<img src="images/news_thumb1.gif" class="news_thumb" alt="image" title="" />--> 
                <p class="news_content">
                <iframe src="https://www.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=puspanitacawanganmelaka%40gmail.com&amp;color=%23AB8B00&amp;ctz=Asia%2FKuala_Lumpur" style=" border-width:0 " width="381" height="300" frameborder="0" scrolling="no"></iframe>
                </p>               
                </div>
                
                <!--<div class="news_box">
                <img src="images/news_thumb2.gif" class="news_thumb" alt="image" title="" /> 
                <p class="news_content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>               
                </div> -->      
            
            
            </div> <!--End of right_content-->          
            
        <div class="clear"></div>
    </div><!--End of main_content-->
    
    
</div><!--End of wrap-->

<div class="footer">
    <div class="footer_content">
        <div class="footer_tab1">
            <h2>Hubungi Kami</h2>
            <span class="email">Email: admin@puspanitamelaka.esy.es</span>
            
            <div class="footer_info">
                <span class="orange">Adress:</span>
                <p class="info">
                Persatuan Suri Dan Anggota Wanita Perhikmatan Awam Malaysia (PUSPANITA),<br/>
                Cawangan Negeri Melaka, <br/>
                No 1, Bukit Peringgit,<br/>
                75400 Melaka.
                </p>           
            </div>
            
            <div class="footer_info">
                <span class="orange">Tel:</span>
                <p class="info">
                06-2812111   /    06-2324916 
                </p>           
            </div> 
            <div class="footer_copyrights">
            <br />
            <b>-></b><a href="soalan_lazim.html">Soalan Lazim</a> &nbsp;<b>||</b>&nbsp;<a href="petalaman.html">Peta Laman</a><b><-</b>
            </div>  
            
        
        </div> <!--End of footer_tab1-->
        
        <div class="footer_tab2">
            <div>
                <h2>PAUTAN PUSPANITA CAWANGAN NEGERI-NEGERI</h2>
                <div>
                    <table width="330px"><tbody>
<!--<tr><th colspan = "4">
<p style="text-align: center; "><a class="external-link" href="http://www.puspanita.org.my/" target="_blank"><img width="50" height="50" alt="PUSPANITA Kebangsaan" title="lmbg_johor.png" class="image-inline" src="images/asset/utama/logo.png"></a></p>
</th>
</tr>-->
<tr><td>
<p style="text-align: center; "><a href="#"><img width="50" height="50" alt="Negeri Sembilan" title="lmbg_negeri9.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_negeri9.png"></a></p>
</td>
<td>
<p style="text-align: center; "><a href="#"><img width="53" height="50" alt="Pulau Pinang" title="lmbg_pulaupinang.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_pulaupinang.png"></a></p>
</td>
<td>
<p style="text-align: center; "><a href="#"><img width="50" height="50" alt="sabah" title="lmbg_sabah.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_sabah.png"></a></p>
</td>
<td>
<p style="text-align: center; "><a href="#"><img width="49" height="49" alt="Sarawak" title="lmbg_sarawak.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_sarawak.png"></a></p>
</td>
</tr><tr style="text-align: center; "><td>

<p style="text-align: center; font-size:12px;">N.Sembilan</p>
</td>
<td>

<p style="text-align: center; font-size:12px;">P.Pinang</p>
</td>
<td style="text-align: center; font-size:12px;">Sabah</td>
<td style="text-align: center; font-size:12px;">Sarawak</td>
</tr>
                        <tr><th>
<p style="text-align: center; "><a href="#"><img width="50" height="50" alt="Johor" title="lmbg_johor.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_johor.png"></a></p>
</th>
<th>
<p style="text-align: center; "><a href="https://www.puspanita.selangor.gov.my"><img width="53" height="50" alt="Selangor" title="lmbg_selangor.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_selangor.png"></a></p>
</th><th>
<p style="text-align: center; "><a href="#"><img width="50" height="50" alt="Pahang" title="lmbg_pahang.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_pahang.png"></a></p>
</th><th>
<p style="text-align: center; "><a href="#"><img width="50" height="50" alt="Kelantan" title="lmbg_kelantan.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_kelantan.png"></a></p>
</th>
</tr><tr><td style="text-align: center; font-size:12px;">Johor</td>
<td style="text-align: center; font-size:12px;">Selangor</td>
<td style="text-align: center; font-size:12px;">Pahang</td>
<td style="text-align: center; font-size:12px;">Kelantan</td>
</tr><tr><td>
<p style="text-align: center; "><a href="https://www.puspanita.perak.gov.my"><img width="47" height="47" alt="Perak" title="lmbg_perak.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_perak.png"></a></p>
</td>
<td>
<p style="text-align: center; "><a href="#"><img width="47" height="47" alt="Perlis" title="lmbg_perlis.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_perlis.png"></a></p>
</td>
<td>
<p style="text-align: center; "><a href="#"><img width="46" height="46" alt="Kedah" title="lmbg_kedah.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_kedah.png"></a></p>
</td>
<td>
<p style="text-align: center; "><a href="#"><img width="47" height="47" alt="Terengganu" title="lmbg_terengganu.png" class="image-inline" src="http://www.melaka.gov.my/my/images/logo2/negeri/lmbg_terengganu.png"></a></p>
</td>
</tr><tr style="text-align: center; "><td style="text-align: center; font-size:12px;">Perak</td>
<td style="text-align: center; font-size:12px;">Perlis</td>
<td style="text-align: center; font-size:12px;">Kedah</td>
<td style="text-align: center; font-size:12px;">Terengganu</td>
</tr></tbody></table>
                </div>
            </div>
        </div> <!--End of footer_tab2--> 
        
        
        
        <div class="footer_tab3">
            <!--<h2>Links</h2>
                <div class="footer_links">
                    <ul>
                    <li><a href="index.html">Utama</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Clients</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Terms &amp; conditions</a></li>
                    <li><a href="#">RSS</a></li>
                    <li><a href="#">Contact</a></li>
                    </ul>
                </div>-->
                <p></p><p></p>
            <div align = "center"><a href="https://www.puspanita.org.my"><img src="images/asset/utama/logo.png" alt="" title="" width = "200px" height = "auto" /></a></div>       
        </div> <!--End of footer_tab3-->      
        
        
        
             
        
    <div class="clear"></div>
    </div> <!--End of footer_content-->
</div><!--End of footer-->

</body>
</html>