<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
    

            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" />
     

       

         
            <script src="<?php echo base_url();?>js/jquery-1.8.3.js"></script>

            
            <script type="text/javascript">

            $(document).ready(function(){

                $("#simpan").live('click',function(){

                    var nama_supplier = $("#nama_supplier").val();
                    var alamat_supplier = $("#alamat_supplier").val();
                    var kota = $("#kota").val();
                    var kodepos = $("#kodepos").val();
                    var bank = $("#bank").val();
                    var bank_no = $("#bank_no").val();
                    var bank_an = $("#bank_an").val();
                    var cp = $("#cp").val();
                    var email = $("#email").val();

                    if (nama_supplier=="") {
                        alert("Nama Supplier Tidak Boleh  Kosong");
                        $("#nama_supplier").focus();

                    }
                    else if (alamat_supplier=="") {
                        alert("Alamat Supplier Tidak Boleh  Kosong");
                        $("#alamat_supplier").focus();

                    }
                    else if (bank=="") {
                        alert("Bank Tidak Boleh  Kosong");
                        $("#bank").focus();

                    }
                     else if (bank_no=="") {
                        alert("No Rekening Tidak Boleh  Kosong");
                        $("#bank_no").focus();

                    }
                    else if (bank_an=="") {
                        alert("an Bank Tidak Boleh  Kosong");
                        $("#bank_an").focus();

                    }
                    else if (cp=="") {
                        alert("Contact Tidak Boleh  Kosong");
                        $("#cp").focus();

                    }
                    else {

                    $.ajax({
                            type:"POST",
                            url :"<?php echo base_url();?>farmasi/apt_supplier/add",
                             data:"nama_supplier="+nama_supplier+"&alamat_supplier="+alamat_supplier+"&kota="+kota+"&kodepos="+kodepos+"&bank="+bank+"&bank_no="+bank_no+"&bank_an="+bank_an+"&cp="+cp+"&email="+email,
                            success : function (data) {

                                
                                window.parent.location.reload(true);
                        
                                
                            }


                        });
                }

                });

              

            });


            </script>
    
       

       



   </head>
    <body>


<div id="real">
  <div id="statusdonor">
   
    <table class="table table-striped">
       
            <tr>
                <td ><b>::. TAMBAH DATA MASTER SUPPLIER OBAT</b></td>
                
            </tr>
        
        </table>

        <table class="table table-striped">
            <tbody>
                
                <tr>
                    <td>Nama Supplier</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Alamat Supplier</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="alamat_supplier" id="alamat_supplier" placeholder="Alamat Supplier..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama_kota" id="nama_kota" placeholder="Kota..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="kodepos" id="kodepos" placeholder="Kode Pos..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Bank</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="bank" id="bank" placeholder="Bank..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Rekening Bank</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="bank_no" id="bank_no" placeholder="No Rekening..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>an Bank</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="bank_an" id="bank_an" placeholder="an Bank..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>No Telp/HP</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="cp" id="cp" placeholder="No Telp/Hp..."  size="30" maxlength="13" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" >
                    </td>
                     <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="email" id="email" placeholder="Email..."> 
                    </td>
                     <td>&nbsp;</td>
                </tr>
                

                 <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="1"> 
                    <button type="submit" class="btn btn-small" id="simpan">Simpan</button>
                    <!-- <INPUT Type="button" class="btn btn-small" VALUE="Kembali" onClick="history.go(-1);return true;"> -->

                </td>
                <td>&nbsp;</td>
                
                </tr>
                
            </tbody>
        </table>
        
        
    </div>
</div>



      
    </div>
  </body>
</html>
