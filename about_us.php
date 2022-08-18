<?php
require_once('session.php');
require_once('header.php');
?>

<?php
$upload_user = $_SESSION['user'];
?>
      <tr>
<div class="container">
  <div class="row">
    <div id="eg2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <br>
        
        <h1>About us</h1>
        
        <br>	


<h3>We are the doujinshi e-platform with promoting the Hong Kong local doujinshi without any charges. We aim to promote the local doujin culture in Hong Kong. No matter which types of creations you are produce. You are welcome to add the doujin creations and share with the people who are interested. The reason of the website named "Doujin KZN", which KZN in here equal to "kizuna" of the Japanese characters which mean the bond of friendship connecting with Doujinshi."</h3>
<br>

                    <br><br><br><br><br>
        </div>
              </tr>

 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 order-lg-first
      order-md-first order-sm-first" >
      <tr>
        <?php include 'book_update.php'?>
      </tr>
    </div>
    
      
  </div>
</div>
<br><br><br><br><br><br>
    <?php include 'footer.php'?>
</body>
</html>