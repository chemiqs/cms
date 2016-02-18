<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Convert RUB to PLN</title>
<style type="text/css">

#main {
  position:relative;
  height:800px;
}

#content {
  position:absolute;
  top: 50%;
  left: 50%;
  width:auto;
  height:auto;
  margin-left: -100px;
  margin-top: -150px; 
}

#title
{
	font-weight:bold;
	font-size:26px;	
}

#result
{
	text-align:center;
	background-color:#F9B01E;
	padding:10px;
}
#error
{
	color:red;
	background-color:#F9B01E;
}

</style>
</head>

<body>
<div id="main">
	<div id="content">
        <div id="title">CONVERTER</div><br>
        <form method="post" action="" >
        RUB <input type="text" name="amount" value="<?php 
			echo (!empty($_POST['amount']) ? $_POST['amount'] : "");
		?>" /><br>
        <p><input type="submit" name="convert" value="Convert to PLN" /></p>
        </form>
	
		<p></p>
        <p>
        <?php
        if(isset($_POST['convert']) && !empty($_POST['convert']) && is_int((int)$_POST['amount']))
        {
            if($_POST['amount']>0)
            {
                $amount = $_POST['amount'];
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "https://www.google.com/finance/converter?a=$amount&from=RUB&to=PLN");
                curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($curl);
                curl_close($curl);
                
                //echo $response;
                preg_match("/<span class=bld\>(.+?)\<\/span>/", $response, $result);
                echo "<div id=\"result\">";
                echo $amount." RUB = ".$result[0];
                echo "</div>";
            }
            else if(empty($_POST['amount']))
            {
                echo "<span id=\"error\">Please, complete all fields on the form!</span>";
            }
			else if(!is_int($_POST['amount']))
			{
				echo "<span id=\"error\">The data is not a number!</span>";
			}
                
        }
        ?>
        </p>
	</div>
</div>
</body>
</html>