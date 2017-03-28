<?php
    //TODO: Crear validacion de datos por GET para evitar un ID inexistente

    require_once "../config.php";


    //Verificar datos por GET, Si no hay nada, redirecciona al INDEX
    if( !isset($_GET['userID']) )
        header("Location: index.php");

    //Inicia una session
    session_start();
    // if( !isset($_SESSION['IDestudiante'] ) )
    $_SESSION['IDestudiante'] = $_GET['userID'];

    use Negocio\Controles\ControlHorario;
    $controlHorario = new ControlHorario();

    //Verifica si tiene un horario creado


    // use Datos\Materias;
    // $listMaterias = $controlHorario->obtenerMaterias();
?>


<?php include TEMP_PATH . DS . "header.php"; ?>


    <div id="horario">

        <table width="100%">
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
            <?php $hora=8; while($hora <= 18): ?>
                <tr>
                <?php $dia=1; while($dia <= 5): ?>

                    <td>
                        <a href="javascript:void(0)" class="item-hora" data-dia="<?= $dia; ?>" data-hora="<?= $hora.":00:00"; ?>"> 
                            <?= $hora.":00"; ?> 
                        </a>
                    </td>

                <?php $dia++; endwhile; ?>
                </tr>
            <?php $hora++; endwhile; ?>
        </table>

        <button id="btn-continuar" class="btn">Continuar</button>
        <button id="btn-reset-horario" class="btn">Reiniciar</button>

    </div>

<?php include TEMP_PATH . DS . "footer.php"; ?>