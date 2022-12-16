<!DOCTYPE html>
<html lang="en">

	<head>
	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
		
		<title>ROLETA PREMIADA (GRUPO VENDEDORES EXTERNOS)</title>
		<script src="jquery.js"></script>
		<script src="phaser.js"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		
		<style>
			body{
				text-align: center;
				background-color: #FF6600;
				background-image: url('bg_laranja.jpg');
			}
			.box {
				margin-top: 5%;
			}
			.titulo {
				position: absolute;
				font-size: 40px;
				padding: 10px;
				border: solid 2px white;
				width: 478px;
				border-style: dashed;
				color: white;
				z-index: 10;
				margin-top: 5px;
				margin-left: 5px;
				font-family: 'Oswald', sans-serif;
			}
			.codigo {
				position: absolute;
				font-size: 40px;
				padding: 10px;
				border: solid 2px white;
				width: 478px;
				border-style: dashed;
				color: white;
				z-index: 10;
				margin-top: 680px;
				margin-left: 5px;
				font-family: 'Oswald', sans-serif;
			}
			@media screen and (max-width: 600px) {
			.codigo {
				position: fixed;
				font-size: 40px;
				padding: 10px;
				border: solid 2px white;
				width: 478px;
				border-style: dashed;
				color: white;
				z-index: 10;
				margin-top: 680px;
				margin-left: 5px;
				font-family: 'Oswald', sans-serif;
			}
			}
		</style>
		
	</head>
	<script>
		$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
        window.location.reload(); 
    }
	});
	</script>
	<body>
		



		

	<?php
    include 'conexao.php';
    $local = "roleta";

    $query = "SELECT * FROM $local WHERE codigo='".$_GET["codigo"]."'";
    $result = mysqli_query($cx, $query);

    if (mysqli_num_rows($result) == 0) {
    	echo "<div class='titulo'>Código não registrado!!!</div>";
    }else{
		while ($row = mysqli_fetch_array($result))
		{
			$codigo =  $row['codigo'];
			$premio = $row['premio'];
			if($codigo <> "" AND $premio == ""){
				echo "<div class='box'>";
				echo "<div id='dwheel' style='display: inline-block; padding: 10px; margin: 0 auto; width: 100%; max-width: 512px;'>";
				echo "<div class='titulo'>Clique na roleta!!!</div>";
				echo "<div class='codigo'>Código: ".$_GET["codigo"]."</div>";
			}else{
				echo "<script>location.href='premio.php?codigo=".$_GET["codigo"]."&situacao=PREMIO'</script>";	
			}
		}
	}
	?>
	</div>
		
		<script>
			var game = new Phaser.Game(512, 768, Phaser.AUTO, "dwheel")
			var dwheel = {}
			
			var wheelstarted = false
			
			var randomstops = [
				{ rot : 685, value : "VOCE GANHOU UM BRINDE" },
				{ rot : 725, value : "NAO FOI DESTA VEZ" },
				{ rot : 1550, value : "VOCE GANHOU UM BRINDE" },
				{ rot : 1580, value : "NAO FOI DESTA VEZ" },
				{ rot : 1610, value : "VOCE GANHOU UM BRINDE" },
			]
			
			
			dwheel.Main = {
				preload : function(){		
					game.load.image("wheel", "Wheel.png")
					game.load.image("needle", "Needle.png")
					game.load.image("base", "Base.png")
					game.stage.backgroundColor = "#EA5E00"
				},
				create : function(){
					
					base = game.add.sprite(game.width/2, game.height/2, "base")
					base.anchor.setTo(.5)
					base.scale.setTo(1.35)
					
					wheel = game.add.sprite(game.width/2, game.height/2-20, "wheel")
					wheel.anchor.setTo(.5)
					wheel.scale.setTo(.5)
					wheel.inputEnabled = true;
					wheel.events.onInputDown.add(rotateTheWheel);
					
					needle = game.add.sprite(game.width/2, game.height/2-185, "needle")
					needle.anchor.setTo(.5)
					needle.scale.setTo(.5)
					
					function rotateTheWheel(){
						if(!wheelstarted){
							wheelstarted = true
							var randomnumber = game.rnd.integerInRange(0, randomstops.length-1)
							game.add.tween(wheel).to( {angle : randomstops[randomnumber].rot }, 5000, "Cubic", true ).onComplete.add(function(){
								//alert(""+ randomstops[randomnumber].value +"!")
								console.log("Congratulation, you won $"+ randomstops[randomnumber].value +"!")
								location.href='premio.php?codigo=<?php echo $codigo; ?>&resultado=' + randomstops[randomnumber].value
								wheelstarted = false;
							})
						}
					}
					
				},
			}
			
			game.state.add("Main", dwheel.Main)
			game.state.start("Main")

		</script>
		</div>
	</body>

</html>
