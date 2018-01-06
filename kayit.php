<?php
if (post('submit')) {
  $data['user_name']=post('user_name');
  $data['user_url']=permalink($data['user_name']);
  $data['mail']=post('e-mail');
  $data['password']=post('password');

  if (!$data['user_url']) {
    $error='kullanıcı adını boş bırakma';
  } else {
    $query = $db->insert('users')
    ->set($data);


    if ($query) {
      header('Location:'.site_url('profil/'.$data['user_url']));
    } else {
      $error='kullanıcı kayıt edilemedi';
    }

  }
}
 require view('kayit');
