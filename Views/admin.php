<?php
require_once("./navbar.php");
require_once "../settings.php";
require_once "../Game/GameItem.php";
require_once "../Admin/AdminItem.php";
require_once "../GameType/GameTypeItem.php";
$gameitem = new GameItem();
$gametypeitem = new GameTypeItem();
$adminitem = new AdminItem();

if (!isset($_SESSION['ADMIN_ID'])) {
    header('location: Views/index.php');
}

?>
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <!-- Main content -->
        <div class="col-lg-9 mb-3">
            <div class="row text-left mb-5">
                <div class="col-lg-6 mb-3 mb-sm-0">


                </div>
                <div class="col-lg-6 text-lg-right">

                </div>
            </div>
            <h2>You are currently logged in as admin <?= $_SESSION['USERNAME'] ?>
            </h2><br>
            <h3>Number of games you have published <?= count($adminitem->getGameTypes($_SESSION['ADMIN_ID'])) ?>
            </h3>
            <?php
            foreach ($adminitem->getGameTypes($_SESSION['ADMIN_ID']) as $type) {


            ?>


            <!-- End of post 1 -->
            <div
                class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                <div class="row align-items-center">
                    <div class="col-md-8 mb-3 mb-sm-0">
                        <h5>
                            <a href="#" class="text-primary">
                                <?=($type["GAME_NAME"]) ?>
                            </a>
                        </h5>

                        <div class="text-sm op-5"> Php: <a class="text-black mr-2" href="#">
                                <?= $type["PHP"] ?>
                            </a> </div>
                        <div class="text-sm op-5"> JS: <a class="text-black mr-2" href="#">
                                <?= $type["JS"] ?>
                            </a> </div>
                        <div class="text-sm op-5"> CSS: <a class="text-black mr-2" href="#">
                                <?= $type["CSS"] ?>
                            </a> </div>
                        <button type="button" class="btn btn-primary">EDIT</button>


                        <form action="../GameType/gameTypeDelete.php" method="post">
                            <input type="hidden" value=<?=($type["GAME_TYPE_ID"]) ?> name = "id">
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>

                    </div>
                    <div class="col-md-4 op-7">
                        <div class="row text-center op-7">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /End of post 1 -->
            <?php }
            ; ?>



        </div>
        <!-- Sidebar content -->
        <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
            <div
                style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;">
            </div>
            <div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}"
                data-toggle="sticky" class="sticky" style="top: 85px;">
                <div class="sticky-inner">
                    <a class="btn btn-lg btn-block btn-success rounded-0 py-4 mb-3 bg-op-6 roboto-bold" href="#">Ask
                        Question</a>
                    <div class="bg-white mb-3">

                        <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                            Stats
                        </h4>
                        <hr class="my-0">
                        <div class="row text-center d-flex flex-row op-7 mx-0">
                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a
                                    class="d-block lead font-weight-bold" href="games.php">
                                    <?= count($gameitem->getAllGames()) ?>
                                </a> Games </div>
                            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                    class="d-block lead font-weight-bold" href="gameTypes.php">
                                    <?= count($gametypeitem->getAllGames()) ?>
                                </a> Game Types</div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>