<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

<title>ROLETA PREMIADA</title>
<script>

const myInterval = setInterval(myTimer, 1000);
  
function myTimer() {
    var btn = document.querySelector("#startConfetti");
    btn.click();
    clearInterval(myInterval);
}


</script>

<style>
    body { 
        background-color:#FF6600; 
        color:#fff;
        margin: 0px;
        background-image: url('bg_laranja.jpg');
    }
    .titulo {
		color: black;
		font-family: 'Oswald', sans-serif;
        z-index: 10;
        font-size: 24px;
        padding: 10px;
        text-align: center;
    }
    .container {
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .box {
        width: 300px;
        height: 300px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 15px 15px 0 #EA5E00, -15px -15px #EA5E00;
        -webkit-transition : box-shadow ease-out 0.6s;
        transition : box-shadow ease-out 0.6s;  
    }
</style>
</head>

<?php
    include 'conexao.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM roleta WHERE codigo='".$_GET['codigo']."'";
    $result = mysqli_query($cx, $query);
    while ($row = mysqli_fetch_array($result))
    {
        if($row['premio'] == "" AND $_GET["resultado"] == "VOCE GANHOU UM BRINDE"){

            $local = "premio";
            $query = "SELECT * FROM $local WHERE realizado = '' ORDER BY RAND() LIMIT 1";
        
            $result = mysqli_query($cx, $query);
            while ($row = mysqli_fetch_array($result))
            {
                $codigo =  $row['produto'];
                $premio =  $row['id'];
        
                $sql = "UPDATE $local SET realizado='sim' WHERE id = '".$row['id']."'";  
        
                if ($conn->query($sql) === TRUE) {
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
        }else{

                $premio =  $row['premio'];

        }

        $resultado_premio = $row['premio'];
    }

    if (mysqli_num_rows($result) == 0) {
    echo 'nenhum evento';
    }

	?>
    
<?php  

    include 'conexao.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['codigo']))
    {
        
        if(@$_GET["situacao"] == "PREMIO"){

        }
        elseif($_GET["resultado"] == "NAO FOI DESTA VEZ"){
            $sql = "UPDATE roleta SET 
            resultado='".$_GET['resultado']."', 
            premio='0' WHERE codigo = '".$_GET['codigo']."'";  

            if ($conn->query($sql) === TRUE) {
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }elseif($_GET["resultado"] == "VOCE GANHOU UM BRINDE" AND $resultado_premio == ""){
            $sql = "UPDATE roleta SET 
            resultado='".$_GET['resultado']."', 
            premio='".$premio."' WHERE codigo = '".$_GET['codigo']."'"; 
            
            if ($conn->query($sql) === TRUE) {
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
        }
            
    }
?>
  <body>
    <div style="position:relative;z-index:99;">
      <div id="startConfetti"></div>
    </div>
    <div class="container">
    <div class="box">
        <?php
        if(@$_GET["situacao"] == "PREMIO" AND $premio <> 0){
            echo "<div class='titulo'>PARABÉNS VOCE GANHOU!! <br><img src='".$premio.".png' width='150' height='150'><br> VAMOS ENTRAR EM CONTATO COM VOCE!</div>";
            //echo "<div class='titulo'>NAO FOI DESTA VEZ! <BR>QUEM SABE NA PROXIMA!!!<br><img src='https://images.emojiterra.com/twitter/v13.1/512px/1f97a.png' width='200' height='200'><br></div>";
        }
        elseif(@$_GET["situacao"] == "PREMIO" AND $premio == 0){
            //echo "<div class='titulo'>PARABÉNS VOCE GANHOU!! <br><img src='".$premio.".png' width='150' height='150'><br> VAMOS ENTRAR EM CONTATO COM VOCE!</div>";
            echo "<div class='titulo'>NAO FOI DESTA VEZ! <BR><img src='https://images.emojiterra.com/twitter/v13.1/512px/1f97a.png' width='200' height='200'><br>QUEM SABE NA PROXIMA!!!</div>";
        }
        elseif($_GET["resultado"] == "NAO FOI DESTA VEZ" OR @$_GET["situacao"] == "PREMIO"){
            echo "<div class='titulo'>NAO FOI DESTA VEZ! <BR><img src='https://images.emojiterra.com/twitter/v13.1/512px/1f97a.png' width='200' height='200'><br>QUEM SABE NA PROXIMA!!!</div>";
        }
        else{
            echo "<div class='titulo'>PARABÉNS VOCE GANHOU!! <br><img src='".$premio.".png' width='150' height='150'><br> VAMOS ENTRAR EM CONTATO COM VOCE!</div>";
        }
        ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Confetti-Animation-jQuery-Canvas-Confetti-js/jquery.confetti.js"></script>
  </body>
</html>
