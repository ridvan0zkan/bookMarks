<?php
if ($_POST) {
  if ($_POST['gelen']=="1") {
    echo "Hemen Takipten Çıkartıyoruz...";
    $query=$db->delete('takip')
    ->where('takip_eden_id',$_SESSION['userid'])
    ->where('takip_edilen_id',$_SESSION['foregin'])
    ->done();
    $takip=0;
  }
  if ($_POST['gelen']=="2") {
    echo "Hemen Takip Ediyoruz...";
    $query = $db->insert('takip')
            ->set(array(
                 'takip_eden_id' => $_SESSION['userid'],
                 'takip_edilen_id' => $_SESSION['foregin']
            ));
            echo '<script>$("#cikar").style.display="block";</sciprt>';
  }
  if ($_POST['gelen']=="3") {
    echo "Hemen Profil Düzenleme Yapıyoruz...";
  }
}
