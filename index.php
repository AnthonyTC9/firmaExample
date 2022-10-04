<?php
ob_start();
?><html>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<head>
    <style>
        table {
            color:rgb(66, 74, 79);
            font-family: PlayfairDisplay-Regular, Playfair Display;
            font-weight: 400;
            line-height: 20px;
            max-width: 360px;
            padding: 0;
            width: 500px;

        }


        table .phone {
            text-decoration: none;
        }
        .link a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php $headerCode = ob_get_flush(); ?>
<h1>Signatures Generator</h1>
<?php
$data = json_decode(file_get_contents('data.json'));
foreach($data->people as $id => $element) {
    ?>
    <hr>
    <table >
        <tr>
            <th><button onclick="copyHTML('html<?= $id; ?>')">COPY</button></th>
            <th>Code</th>
        </tr>
        <tr>
            <td>
                <?php
                ob_start();
                ?>
                <div id="html<?= $id; ?>">
                    <table>
                        <tbody >
                            <tr>
                                <td style="padding:20px; background-image:url(pictures/fondo1.png); background-size: cover;">
                                    <table >
                                        <tbody>
                                            <tr>
                                                <td style="width:46px;">
                                                    <img src="/pictures/pilarname.png" style=" width: 12px;" alt="">                                        
                                                </td>
                                            <td>
                                                <table>
                                                    <tr style="display: block; padding-top: 20px;">                                  
                                                        <td> 
                                                            <div class="position" style=" display: inline-block; font-size: 38px;"><?= $element->name ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 5px;" ></tr>
                                                    <tr>
                                                        <td>
                                                            <div class="position" style=" font-lighter: 700; display: inline-block; font-size: 18px; font-style: italic; color:rgb(189, 129, 62);"><?= $element->position ?></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>                                                    

                                            </tr>
                                        </tbody>

                                    </table>
                                    <table style="margin: 34px;">
                                        <tr>
                                            <td style="width:43px;"><img src="/pictures/telefono.png" style=" width: 20px;" alt="">                                        
                                            </td>
                                            <td>
                                                <div style=" font-size: 21px; font-style: italic;"><?= $element->phone ?></div>
                                            </td>
                                        </tr>
                                        <tr style="height: 10px;" ></tr>
                                        <tr>
                                            <td ><img src="/pictures/ubicacion.png" style=" width: 17px;" alt=""></td>
                                            <td>
                                                <div style=" font-size: 21px; font-style: italic;"><?= $element->location ?></div>
                                                <div>
                                                <div style=" font-size: 21px; font-style: italic;"><?= $element->location2 ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="height: 10px;" ></tr>
                                        <tr>
                                            <td style="width:46px;"><img src="/pictures/pagweb.png" style=" width: 20px;" alt="">                                        
                                            </td>
                                            <td>
                                                <div ><a style="text-decoration:none; color:rgb(189, 129, 62); font-size: 21px; font-style: italic;" href="https://www.polacekplasticsurgery.com/" target="_blank"><?= $element->link ?></a></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="background-image:url(pictures/fondo2.png); padding-left:18px;">
                                    <table>
                                        <tr>
                                            <td><img src="/pictures/foto.png" style=" width: 198px;" alt="">                                        
                                            </td>

                                            <td style="vertical-align: inherit !important; text-align: center;"> 
                                                <img src="/pictures/logo.png" style=" width: 266px;" alt="">
                                                <table>
                                                    <tr style="display:flex; justify-content:space-evenly; padding-right: 85px;  padding-left: 84px;">
                                                        <td><a href="https://www.facebook.com/" target="_blank"><img src="/pictures/facebook.png" style="width: 26px;" alt=""></a></td>
                                                        <td><a href="https://www.instagram.com/" target="_blank"><img src="/pictures/instagram.png" style="width: 26px;" alt=""></a></td>
                                                        <td><a href="https://twitter.com/" target="_blank"><img src="/pictures/twitter.png" style="width: 26px;" alt=""></a></td>
                                                        <td><a href="https://www.youtube.com/" target="_blank"><img src="/pictures/youtube.png" style="width: 26px;" alt=""></a></td>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> 
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php $htmlCode = ob_get_flush(); ?>
            </td>
            <td>
                <textarea name="" id="" cols="30" rows="10" style="width: 43vw; height: 321px !important;">
                    <?= $headerCode.$htmlCode.'</body></html>' ?>
                </textarea>
            </td>
        </tr>
    </table>
    <?php
}
?>
<script>
    function copyHTML(element_id){
        var aux = document.createElement("div");
        aux.setAttribute("contentEditable", true);
        aux.innerHTML = document.getElementById(element_id).innerHTML;
        aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)");
        document.body.appendChild(aux);
        aux.focus();
        aux.contentEditable = true;
        document.execCommand("copy");
        document.body.removeChild(aux);
        document.getElementById(element_id).scrollIntoView();
        var sBrowser, sUsrAg = navigator.userAgent;
        if (sUsrAg.indexOf("Firefox") > -1) {
            window.location.reload();
        }
        //window.location.href = window.location.href + '#' + element_id;
    }

</script>
</body>
<script src="./script.js?v=<?php echo time(); ?>"></script>
</html>