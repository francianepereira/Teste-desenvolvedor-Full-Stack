<div class="form-group">
    <img src="./img/img_background_desktop_top.jpg" class="bg hidden-sm-down" />
    <img src="./img/img_filter_background_desktop_top.jpg" class="bg filter hidden-sm-down" />
    <img src="./img/img_background_celular_top.jpg" class="bg-md hidden-md-up" />
    <img src="./img/img_filter_background_celular_top.jpg" class="bg-md filter hidden-md-up" />
    <h1>Teste desenvolvedor Full Stack</h1>
    <div id="result" class="container">
        <div class="row">
            <div class="col-12 score">
                <h5>Score:</h5>
                <span class="badge badge-pill badge-success"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5>Número do Endereço:</h5>
                <span class="badge badge-pill number-address badge-primary"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5>Endereço IP:</h5>
                <span class="badge badge-pill ip-address-user badge-warning"><?php echo $_SERVER["REMOTE_ADDR"]; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="back">
                <a href="./index.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>