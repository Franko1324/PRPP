<?php
$xml = simplexml_load_file('sadrzaj.xml') or die('Error: Cannot create object');
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title> Kalendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
        }
        td {
            font-size: 16px;
        }
        .event {
            background-color: #d4edda;
            color: #155724;
        }
        .no-event {
            background-color: #f8d7da;
            color: #721c24;
        }
        .event, .no-event {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1> Kalendar</h1>
    <table>
        <tr>
            <th>Vrijeme</th>
            <?php
            foreach($xml->day as $day) {
                echo '<th>' . $day['name'] . '</th>';
            }
            ?>
        </tr>
        <?php
        // Define the time slots
        $time_slots = [
            '08:00-09:30', '09:30-12:00', '10:30-12:00', '12:00-13:30', '16:30-18:00', '08:00-12:30', '09:00-10:30', '10:15-13:15', '13:30-15:00', '09:00-15:00', '10:00-12:00', '12:00-14:00'
        ];
        
        foreach($time_slots as $slot) {
            echo '<tr>';
            echo '<td>' . $slot . '</td>';
            foreach($xml->day as $day) {
                $found = false;
                foreach($day->event as $event) {
                    if ((string)$event->time == $slot) {
                        echo '<td class="event">' . $event->description . '</td>';
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    echo '<td class="no-event">Nema događaja</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
