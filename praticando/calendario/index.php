<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calendario</title>
</head>
<body>
    <?php 
        function linha($semana){
            echo "<tr>";
            for($i=0; $i<=6;$i++){
                if(isset($semana[$i])){
                    echo "<td>{$semana[$i]}</td>";
                }else{
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        function calendario(){
            $dia =1;
            $semana = array();
                while($dia <= 31){
                    array_push($semana, $dia);
                    if(count($semana) == 7){
                        linha($semana);
                        $semana= array();
                    }
                    $dia++;
                }
                linha($semana);
        }
    
    
    ?>
    <table border="1" id="cal">
        <tr>
            <th>Dom</th>
            <th>seg</th>
            <th>ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sáb</th>
        </tr>
        <?php calendario(); ?>
    </table>
    
</body>
</html>