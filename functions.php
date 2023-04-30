<?php


function addPlate($floor, $slot, $plate, $conn)
{
    $plate = str_replace(" ","", $plate);
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
        if ($data != NULL) {
            if (isset($data["plate"]) && $data["plate"] == $plate) {
                return  "<font color='red'>รถทะเบียน " . $plate . " จองอยู่แล้ว</font>";
            }
            if (isset($data["slot"]) or isset($data["floor"])) {
                return "<font color='red'>มีการจองชั้น " . $floor . " Slot " . $slot . " อยู่แล้ว </font>";
            }
        }
    } catch (Exception $e) {
        return "<font color='red'>ไม่สามารถเข้าถึง</font>";
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
        return "เพิ่มไม่ได้";
    }
}


function search($plate, $conn)
{
    $plate = str_replace(" ","", $plate);
    $mysqli = $conn;
    try {
        $stmt = $mysqli->prepare("SELECT  `plate` ,`floor`, `slot`,TIMESTAMPDIFF(MINUTE, start_date, NOW()) as timediff FROM parking WHERE plate = ?;");
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

    }
}
