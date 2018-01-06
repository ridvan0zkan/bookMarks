<?php
//profil düzenleme butonu
/*if (post('profilDuzenle')) {
echo "<script>alert('geldi')</script>";
}*/
global $foregin;
  if (url(1)==null) {
    $userNameProfil=$_SESSION['username'];
    $userProfilPhoto=$_SESSION['resim'];
    $foregin=false;
  } else {
    $url=url(1);
    $query = $db->from('users')
    ->where('user_url',$url)
    ->first(true);
    if ($query) {
      $userNameProfil= $query['user_name'];
      $userProfilPhoto=$query['photo'];
      $_SESSION['foregin']=$query['user_id'];
      $query=$db->from('takip')
      ->where('takip_eden_id',$_SESSION['userid'])
      ->where('takip_edilen_id',$_SESSION['foregin'])
      ->first(true);
      $takip=0;
      if ($query) {
          $takip=1;
      }
    }
     else {
      //header('Location:'.site_url());
    }
  }


require view('profil');
