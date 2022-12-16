<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
        height: 175px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 15px 15px 0 #EA5E00, -15px -15px #EA5E00;
        -webkit-transition : box-shadow ease-out 0.6s;
        transition : box-shadow ease-out 0.6s;  
    }
    .texto {
        font-family: 'Oswald', sans-serif;
        font-size: 20px;
        color: black;
        padding: 15px;
    }
</style>

<body>
<div class="container">
    <div class="box">
    <label for='' class='texto'>Digite o código:</label>
    <form action="roleta.php" method="GET">
        <div class="has-error" style="margin: 1em; width: 260px;">
        <div class="input-group">
            <input type="text" class="form-control" name="codigo" id="codigo">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">ENTRAR</button>
                </span>
        </div>
        </div>
    </form>
    <img src="grupo_brisanet.png" width="250" height="20">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
