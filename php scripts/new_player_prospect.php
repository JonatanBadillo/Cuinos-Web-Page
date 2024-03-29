<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $positions = "";
    echo ("Debug: " . $_POST['Medio']);
    if (isset($_POST['Portero'])) {
        ($positions == "") ? $positions .= 'Portero' : $positions .= (", " . 'Portero');
    }
    if (isset($_POST['Defensa'])) {
        ($positions == "") ? $positions .= 'Defensa' : $positions .= (", " . 'Defensa');
    }
    if (isset($_POST['Medio'])) {
        ($positions == "") ? $positions .= 'Medio' : $positions .= (", " . 'Medio');
    }
    if (isset($_POST['Delantero'])) {
        ($positions == "") ? $positions .= 'Delantero' : $positions .= (", " . 'Delantero');
    }

    if ($positions == "") { // Si no se registró ninguna posición
        header("Location: ../index.html");
        //echo ("No hay posiciones");
    } else {
        if (isset($_POST['email'])) {
            include_once "connection.php";
            $insert_data = [$_POST['name'], $_POST['last_names'], $_POST['email'], $_POST['mobile'], intval($_POST['age']), $positions, $_POST['message']];
            $sql = ("INSERT INTO `" . "prospects" . "` VALUES ('', ?, ?, ?, ?, ?, ?, ?)");
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssssiss", $insert_data[0], $insert_data[1], $insert_data[2], $insert_data[3], $insert_data[4], $insert_data[5], $insert_data[6]);
            $stmt->execute();
            // Get the last inserted id to use as a foreign key in other tables
            $registered_id = $connection->insert_id;

            include "mail-configs.php";

            $mail->ClearAllRecipients();
            $mail->AddAddress("dantecc10@gmail.com");
            $mail->AddAddress("jonatanbadillo.19@gmail.com");
            $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
            $mail->Subject = 'Hay una nueva solicitud de registro';
            //
            $msg = ("<h1>¡" . $insert_data[0] . " quiere formar parte de Cuinos FC!</h1>
                    <p>Hola, directivos y programadores. Este correo es para notificar que hay una nueva solicitud para pertenecer al equipo, aquí está su información: </p>
                    <ul>
                        <li>Nombre completo:  " . $insert_data[0] . " " . $insert_data[1] . "</li>
                        <li>Edad: " . $insert_data[3] . " años</li>
                        <li>Correo electrónico: <a href='mailto:" . $insert_data[2] . "'>" . $insert_data[2] . "</a></li>
                        <li>Número telefónico: <a href='https://wa.me/52" . $insert_data[3] . "'>" . $insert_data[3] . "</a></li>
                        <li>Edad: " . $insert_data[4] . "</li>
                        <li>Posición(es): " . $insert_data[5] . "</li>
                        <li>Mensaje: " . $insert_data[6] . "</li>
                    </ul>
                    ");
            $mail->Body = $msg;
            try {
                $mail->Send();
                //echo ("Correo enviado 'con éxito'");
            } catch (Exception $e) {
                echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
                echo "Excepción lanzada: " . $e->getMessage();
            }

            $mail->ClearAllRecipients();
            $mail->AddAddress($insert_data[2]);
            $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
            $mail->Subject = '¡Cuinos FC recibió tu solicitud!';
            //
            $msg = ("<h1>¡Te queremos en Cuinos, " . $insert_data[0] . "!</h1>
                    <p>Este correo confirma que recibimos tu solicitud, y te hemos añadido a la base de datos  como un aspirante a jugador de nuestro club.</p>
                    <p>Tu solicitud ha sido recibida con exito y se encuentra siendo revisada por nuestro staff. En breve te contactaremos para saber más sobre tí.</p>
                    <p>Esta es la información que nos diste: </p>
                    <ul>
                        <li>Nombre completo:  " . $insert_data[0] . " " . $insert_data[1] . "</li>
                        <li>Edad: " . $insert_data[3] . " años</li>
                        <li>Correo electrónico: <a href='mailto:" . $insert_data[2] . "'>" . $insert_data[2] . "</a></li>
                        <li>Número telefónico: <a href='https://wa.me/52" . $insert_data[3] . "'>" . $insert_data[3] . "</a></li>
                        <li>Edad: " . $insert_data[4] . "</li>
                        <li>Posición(es): " . $insert_data[5] . "</li>
                        <li>Mensaje: " . $insert_data[6] . "</li>
                    </ul>
                    ");
            $mail->Body = $msg;
            try {
                $mail->Send();
                //echo ("Correo enviado 'con éxito'");
            } catch (Exception $e) {
                echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
                echo "Excepción lanzada: " . $e->getMessage();
            }
            echo ('<script>window.location.href = "../index.html";</script>');
            //header("Location: ../index.php");
        } else {
            header("Location: ../index.php?error=failed-register");
        }
    }
}
