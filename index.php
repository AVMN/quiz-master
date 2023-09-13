/**
 * @date : 13/09/2023
 * @author   : Franck GRIMONPONT
 * @copyright: UGA
 */

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>SONDAGE</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        /* #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }*/
        /* #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }*/
        /* #sortable li span { position: absolute; margin-left: -1.3em; }*/
        #sortable li {cursor: grab;}
        .ui-sortable-helper{
            box-shadow: 2px 2px 4px 4px rgba(0, 0, 0, .3);
        }


    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        } );

        function saveSondage(){
            var orders = new Array()
            $('.answer').each(function () {
                orders.push($(this).attr('id'));
            })
            if(orders.length > 0){
                $.ajax({
                    type: "POST",
                    url: "./treatment.php",
                    dataType: 'json',
                    data: {
                        action: 'saveSondage',
                        orders: JSON.stringify(orders)
                    },
                    async: false,
                    success: function(data) {

                    }
                });
            }
        }

    </script>
</head>
<body>

<?php

$responses = array();
$responses[] = "Etre capable d’analyser et de synthétiser";
$responses[1] = "Maîtriser les fondamentaux de la connaissance (mettre ses connaissances en pratique)";
$responses[2] ="Etre capable de s’organiser et de planifier";
$responses[3] = "Etre capable d’appliquer les connaissances acquises dans des situations réelles";
$responses[4] = "Etre capable de s’appuyer sur les savoirs de base du champ professionnel concerné";
$responses[5] = "Maîtriser la communication orale et écrite dans sa langue maternelle";
$responses[6] = "Connaître une seconde langue";
$responses[7] = "Avoir acquis les compétences de base en informatique";
$responses[8] = "Compétences à rechercher";
$responses[9] = "Savoir apprendre";
$responses[10] = "Avoir acquis les compétences nécessaires en matière de traitement de l’information";
$responses[11] = "Capacités à la critique et à l’autocritique";
$responses[12] = "Savoir s’adapter à des situations nouvelles";
$responses[13] = "Savoir générer des idées nouvelles (créativité)";
$responses[14] = "Compétence à la résolution de problèmes";
$responses[15] = "Compétence à la prise de décisions";
$responses[16] = "Capacité au travail en équipe";
$responses[17] = "Aisance relationnelle";
$responses[18] = "Etre capable de diriger";
$responses[19] = "Capacité à travailler en équipe interdisciplinaire";
$responses[20] = "Capacité à communiquer avec des experts d’autres domaines";
$responses[21] = "Reconnaître la valeur de la diversité et du multiculturalisme";
$responses[22] = "Capacité à travailler dans un contexte international";
$responses[23] = "Comprendre les cultures et les habitudes d’autres pays";
$responses[24] = "Etre capable de travailler de façon autonome";
$responses[25] = "Etre capable d’élaborer et de gérer un projet";
$responses[26] = "Faire preuve d’initiative et d’esprit d’entreprise";
$responses[27] = "Sens de la responsabilité";
$responses[28] = "Avoir la préoccupation de la qualité";
$responses[29] = "Avoir la volonté de réussir";


    /*for ($i = 3;  $i < 16 ; $i++){
        $responses[] = 'Question '.($i + 1);
    }*/

?>
<div class="container">
    <h1 class="numerote">Questionnaire</h1>
    <p>
        Selon vous, quels sont les critères principaux. merci de classer du plus important (1) au moins important (30) en bas.
    </p>
    <div class="row mb-3">
            <div class="col-1">&nbsp;&nbsp;</div>
            <div class="col-9">

            <small class="text-muted">cliquez et glissez les phrases vers le haut ou vers le bas</small>
            </div>
    </div>
    <div class="row">
        <div class="col-1">
            <ol id="fixe" class="list-group mb-5">
                <?php
                foreach ($responses as $key => $response) {
                    ?>
                    <li id="num<?php echo($key + 1) ?>" class="list-group-item">
                        <span class="badge badge-muted badge-pill "><?php echo($key + 1) ?></span>
                        </li>
                    <?php
                }
                ?>
            </ol>
        </div>
        <div class="col-9">
            <ol id="sortable" class="list-group mb-5">
                <?php
                foreach ($responses as $key => $response) {
                    ?>
                    <li id="<?php echo($key + 1) ?>" class=" ui-state-default answer list-group-item"><span class="float-left mr-2"><svg class="bi bi-grip-vertical" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg></span>
                        <?php echo $response; ?>
                        <span class="float-right"><svg class="bi bi-grip-vertical" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg></span></li>
                    <?php
                }
                ?>
            </ol>
        </div>
    </div>
    <div class="row">
        <button onclick="saveSondage()" class="btn btn-primary btn-large">Enregistrer</button>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<<!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->
</body>
</html>
