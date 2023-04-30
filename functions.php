<?php


function addPlate($floor, $slot, $plate, $conn)
{
    $mysqli = $conn;
    try {
        $stmt = $mysqli->prepare("SELECT `plate` ,`floor`, `slot` FROM parking WHERE (floor = ? AND slot = ?) OR (plate = ?)");
        $stmt->bind_param(
            "sss",
            $floor,
            $slot,
            $plate
        );
        $stmt->execute();

        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        // print_r($floor . " " . $slot . " " . $plate);
        // print_r($data);

        if ($data != NULL) {
            if (isset($data["plate"]) && $data["plate"] == $plate) {
                return  "รถทะเบียน " . $plate . " จองอยู่แล้ว";
            }
            if (isset($data["slot"]) or isset($data["floor"])) {
                return "มีการจองชั้น " . $floor . " Slot " . $slot . " อยู่แล้ว ";
            }
        }
    } catch (Exception $e) {
        $error_date = date("F j, Y, g:i a");
        $message = "{$e} | {$error_date} \r\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);
        return "ไม่สามารถเข้าถึง";
    }

    try {

        $stmt = $mysqli->prepare("INSERT INTO parking(`plate`, `floor`, `slot`) VALUE(?, ?, ?)");
        $stmt->bind_param(
            "sss",
            $plate,
            $floor,
            $slot
        );
        $stmt->execute();
        return "เพิ่มทะเบียน " . $plate . " สำเร็จ";
    } catch (Exception $e) {
        $error_date = date("F j, Y, g:i a");
        $message = "{$e} | {$error_date} \r\n\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);
        return "เพิ่มไม่ได้";
    }
}


function search($plate, $conn)
{
    $mysqli = $conn;
    try {
        $stmt = $mysqli->prepare("SELECT * FROM parking WHERE plate = ?;");
        $stmt->bind_param(
            "s",
            $plate,
        );
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if ($data != NULL) {
            if (isset($data["plate"])) {
                return $data;
            }
        }

    } catch (Exception $e) {
        $error_date = date("F j, Y, g:i a");
        $message = "{$e} | {$error_date} \r\n\r\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);
        return "ไม่สามารถค้นหาได้";
    }
}
