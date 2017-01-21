<html>
    <head>
        <title> Sortiranje reci </title>
        <meta charset='utf-8'>
    </head>
    <body>
        <form action='' method='GET' id='f'>
            <textarea id='reci' name='reci' cols='50' rows='50'></textarea>
            <br><br>
            <input type='radio' name='poredak' value='r'> rastuce
            <input type='radio' name='poredak' value='o'> opadajuce
            <br><br>
            format:
            <input type='checkbox' name='boja' > crvena boja
            <input type='checkbox' name='podebljano' > podebljana slova
            <br><br><br>
            <input type='submit' name='submit_dugme' value='prikazi listu' > 
        </form>
<?php

if(isset($_GET['submit_dugme']))
{
    $reci_tekst=$_GET['reci'];
        $reci_niz=explode(",",$reci_tekst);
        $n=count($reci_niz)
            for($i=0;$i<$n;$i++)
            {
                $reci_niz[$i]=trim($reci_niz[$i]);
            }
        $poredak=$_GET['poredak'];
        
        switch($poredak)
        {
            case "r":
                asort($reci_niz,SORT_STRING);
                break;
            case "o":
                arsort($reci_niz,SORT_STRING);
                break;
        }
        $stil="";
        if(isset($_GET['boja']))
        {
            $stil.="color:red;";
        }
        
        if(isset($_GET['podebljano']))
        {
            $stil.="font-weight:bold;";
        }
         echo "<ul style='$stil'>";
        foreach($reci_niz as $index=>$rec)
        {
            echo "<li> $rec </li>" ;
        }
        echo "</ul>";
    

    
?>
        
    <script type='text/javascript'>
        document.querySelector("#f").onsubmit=function()
        {
            var reci=document.querySelector("#reci").value;
            var odabran_poredak = false;
            var dugmici_za_poredak=document.querySelectorAll("input[name='poredak']");
            for(var i=0;i<dugmici_za_poredak.length;i++)
                {
                    if(dugmici_za_poredak[i].checked)
                        {
                            odabran_poredak=true;
                            break;
                        }
                    
                }
            if(reci==""|| odabran_poredak==false)
                {
                    window.alert("Popunite sva obavezna polja!");
                    return false;
                }
            
        }
    </script>    
    </body>

</html>   