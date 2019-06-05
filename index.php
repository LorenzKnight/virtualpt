<html>
<head>
<meta charset="iso-8859-1">
<title>Virtual PT</title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/_colors.scss" />
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<script>
</script>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="menu">
            </div>
            <div class="head">
                <div class="col_2">
                    <div class="lin_3">
                    <h1>VIRTUAL PT</h1>
                    <h4>Your virtual personal trainer live</h4>
                    </div>
                </div>
                <div class="col_2">
                    <div class="formular_front">
                        <form action="reg_edit.php" method="post" name="forminsert" id="forminsert">
                            <table width="70%" align="center" cellspacing="0" class="list">
                                <tr>
                                    <td style="" colspan="6" height="30" align="center" valign="middle"><h3>You can get free advice from me every day on how to get in shape.</h3></td>      
                                </tr>
                                <tr valign="baseline" height="50">
                                    <td colspan="6" valign="middle" align="center">
                                    <input class="text_input" type="text" name="given_id" value="<?php echo $row_DatosConsulta["given_id"] ?>" size="55" />
                                    </td>
                                </tr>
                                <tr valign="baseline" height="50">
                                    <td style="" colspan="6" valign="middle" align="center">
                                    <input class="text_input" type="text" name="name" value="<?php echo $row_DatosConsulta["name"] ?>" size="55" />
                                    </td>
                                </tr>
                                <tr valign="baseline">
                                    <td style=" padding-bottom:10px;" nowrap="nowrap" align="center"><input style="padding: 20px 90px;" type="submit" class="button" value="WELCOME TO VIRTUAL PT" /></td>
                                </tr>
                            </table>
                            <input type="hidden" name="MM_insert" id="MM_insert" value="forminsert" />
                            <input type="hidden" name="id" id="id" value="<?php echo $row_DatosConsulta["id"];?>"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>