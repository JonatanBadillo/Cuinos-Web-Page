<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuinos FC</title>
    <link rel="icon" href="SRC/img/logo.png" type="image/png">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/styles.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body>


    <header>

        <!-- FALTA MENU-->
        <!--
            Añadí un h1 en el container del banner, por cuestiones de calidad
            y SEO, pero si creas una barra de navegación, lo quitas de ahí y lo pones aquí -idealmente-.
        -->
        <!--TODO: NAV BAR -->

    </header>


    <!-----------container banner---------------->
    <div class="container__banner">
        <div class="banner">
            <div class="banner__icon-ball">
                <img src="SRC/img/ball.png" id="icon_ball" alt="">
            </div>
            <div class="banner__icon-player">
                <img src="SRC/img/player_banner.png" id="icon_player" alt="">
            </div>
            <div class="banner__text">
                <h1>Cuinos FC</h1>
                <h2>Cuinos FC: donde el fútbol se convierte en una pasión compartida por todos.</h2>
                <a href="https://www.instagram.com/cuinos.fc/" target="_blank">Contáctanos</a>
            </div>
        </div>
    </div>


    <!-- CARDS -->

    <div class="container__cards">

        <?php
        include_once "php scripts/functions.php"; // Incluyo archivo donde guardo funciones de PHP

        $dynamicDOM = '<div class="card" id="playerFLAG">
                           <div class="cover">
                               <img src="/SRC/img/playerFLAG.png" alt="">
                               <div class="img__back"></div>
                           </div>
                           <div class="description">
                               <h2>FLAG FLAG FLAG</h2>
                               <p><b>POSITION</b><br><b>Torneos:</b> FLAG <br> <b>Goles:</b> FLAG</p>
                               <input type="button" value="Leer Más" class="open-button">
                               <div class="window-background">
                                   <div class="window-container">
                                       <button class="close-button">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon-x">
                                               <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                                           </svg>
                                       </button>
                                       <h1>hola 3</h1>
                                   </div>
                               </div>
                           </div>
                       </div>';
        $fields = ["id_player", "name_player", "last_names_player", "nickname_player", "description_player", "positions_player", "goals_player", "tournaments_player", "titles_player", "status_player"];
        $players = fetch_fields("players", $fields, null, null);

        $fields = ["name_position"];
        $positions = fetch_fields("positions", $fields, null, null);
        $indexes = [0, 0, 1, 2, 3, 7, 6];
        for ($i = 0; $i < sizeof($players); $i++) {
            $playerDOM = flag_replacer($dynamicDOM, "FLAG", $players[$i], $indexes);
            $playerPositions = splitter($players[$i][5], ",");
            // print_r($playerPositions);
            $text_positions = "";
            $k = 0;
            foreach ($playerPositions as $positionIndex) {
                ($k == 0) ? $text_positions .= positions_proccesor($positionIndex, $positions) : $text_positions .= (" / " . positions_proccesor($positionIndex, $positions));
                $k++;
            }
            $playerDOM = str_replace("POSITION", $text_positions, $playerDOM);

            echo ($playerDOM);
        }
        ?>
    </div>
    <br>

    <!----------- TABLE --------------------->

    <center>
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Goleadores Historicos</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <img src="SRC/img/search.png" alt="">
                </div>

            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Posición <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Torneos <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Goles <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Estatus <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td><a href="#player11"> Quique </a></td>
                            <td> 2 </td>
                            <td> 40 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td><a href="#player15"> Manuel Reyes </a></td>
                            <td> 4 </td>
                            <td> 25 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>
                        <tr>
                            <td> 3 </td>
                            <td><a href="#player9"> Jesus Posadas </a></td>
                            <td> 3 </td>
                            <td> 22 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>
                        <tr>
                            <td> 4 </td>
                            <td><a href="#player10"> Santiago Robles </a></td>
                            <td> 4 </td>
                            <td> 17 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>
                        <tr>
                            <td> 5 </td>
                            <td>Jimmy</td>
                            <td> 2 </td>
                            <td> 17 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 6 </td>
                            <td><a href="#player13"> Angel Garcia </a></td>
                            <td> 4 </td>
                            <td> 15 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 7 </td>
                            <td><a href="#player7"> Adrian Balle </a></td>
                            <td> 2 </td>
                            <td> 12 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 8 </td>
                            <td><a href="#player14"> Santiago Cordova </a></td>
                            <td> 2 </td>
                            <td> 11 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 9 </td>
                            <td>Zizar</td>
                            <td> 1 </td>
                            <td> 9 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 10 </td>
                            <td>Hugo</td>
                            <td> 1 </td>
                            <td> 7 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>
                        <tr>
                            <td> 11 </td>
                            <td>Irving</td>
                            <td> 2 </td>
                            <td> 6 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 12 </td>
                            <td>Ricardo</td>
                            <td> 3 </td>
                            <td> 6 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 13 </td>
                            <td><a href="#player8"> Josue Jimenez </a></td>
                            <td> 2 </td>
                            <td> 5 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 14 </td>
                            <td><a href="#player3"> Jonatan Badillo </a></td>
                            <td> 4 </td>
                            <td> 5 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 15 </td>
                            <td>Leo Olivarez</td>
                            <td> 2 </td>
                            <td> 4 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 16 </td>
                            <td>Johan</td>
                            <td> 2 </td>
                            <td> 3 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 17 </td>
                            <td>Galina</td>
                            <td> 2 </td>
                            <td> 3 </td>
                            <td>
                                <p class="status inactive">Inactivo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 18 </td>
                            <td><a href="#player5"> Diego Cordova</a></td>
                            <td> 2 </td>
                            <td> 1 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                        <tr>
                            <td> 19 </td>
                            <td><a href="#player4"> Olaf Baez</a></td>
                            <td> 2 </td>
                            <td> 1 </td>
                            <td>
                                <p class="status active">Activo</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </section>
        </main>
    </center>

    <br>

    <!--------------- SLIDERS --------------------->
    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="SRC/img/sliders-team/slider-1.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-2.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-3.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-4.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-5.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-6.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-7.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-8.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-9.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-10.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-11.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-12.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-13.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-14.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-15.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-16.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-17.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-18.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-19.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-20.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-21.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-22.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-23.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-24.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-25.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-26.jpg" alt="">
            </div>
            <div class="item">
                <img src="SRC/img/sliders-team/slider-27.jpg" alt="">
            </div>
        </div>
        <div class="buttons">
            <button id="prev">
                << /button>
                    <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>


    <!----------------- FOOTER ----------------------->
    <Footer>
        <div class="container__footer">

            <div class="box__footer">
                <div class="logo">
                    <img src="Images/logo-magtimus.png" alt="">
                </div>
                <div class="terms">
                    Cuinos FC: Más que un equipo, una familia unida por la pasión por el fútbol, luchando con coraje y determinación en cada encuentro. </div>
            </div>



            <div class="box__footer">
                <h2>Equipo</h2>
                <a href="#">Acerca de</a>
            </div>

            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="https://www.instagram.com/cuinos.fc/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://www.tiktok.com/@cuinos_fc" target="_blank"><i class="fa-brands fa-tiktok"></i> TikTok</a>

            </div>
        </div>

        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados © 2024 <b>Cuinos FC</b></p>
        </div>
    </Footer>



    <script src="main.js"></script>
</body>

</html>