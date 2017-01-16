<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="agenda.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script>
    $(function() {

        $("#text-one").change(function() {
            $("#text-two").load("textdata/" + $(this).val() + ".txt");
        });

        $("#json-one").change(function() {

            var $dropdown = $(this);

            $.getJSON("jsondata/data.json", function(data) {

                var key = $dropdown.val();
                var vals = [];

                switch(key) {
                    case 'maandag':
                        vals = data.maandag.split(",");
                        break;
                    case 'dinsdag':
                        vals = data.dinsdag.split(",");
                        break;
                    case 'woensdag':
                        vals = data.woensdag.split(",");
                        break;
                    case 'donderdag':
                        vals = data.donderdag.split(",");
                        break;
                    case 'vrijdag':
                        vals = data.vrijdag.split(",");
                        break;
                    case 'zaterdag':
                        vals = data.zaterdag.split(",");
                        break;
                    case 'zondag':
                        vals = data.zondag.split(",");
                        break;
                    case 'base':
                        vals = ['Please choose from above'];
                }

                var $jsontwo = $("#json-two");
                $jsontwo.empty();
                $.each(vals, function(index, value) {
                    $jsontwo.append("<option>" + value + "</option>");
                });

            });
        });

    });
</script>



<!--PHP Code for dates-->
<?php

setlocale(LC_TIME, 'NL_nl');
echo strftime('%A %e %B %Y om %H:%M',time());
$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');
?>

<!--Body-->
<body>
<h1>Sentosa sessie reservering</h1>
<div class="container">
    <div class="datums">
        <ul>
            <li class="prev">
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">&#10094;</a> <!--Previous week-->
            </li>
            <li class="next">
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">&#10095;</a><!--Next week-->
            </li>
            <li class="maand">
                <?php echo "Week " . $week . " "?>
                <span><?php echo $dt->format('M ') . $year ?></span>
            </li>
        </ul>
    </div>

        <div class="Content">
            <table>
                <div class="weekData">
                    <tr class="defaultrow"></tr>
                    <tr class="row1">

                    <?php
                    do {
                        echo "<td>" . $dt->format('l ') . $dt->format('d') . "</td>\n";
                        $dt->modify('+1 day');
                    } while ($week == $dt->format('W'));
                    ?>
                    </tr>
                    </div>
                <div class="row2"></div>
                <tr>
                    <td> x </td>
                    <td> x </td>
                    <td> x </td>
                    <td> x </td>
                    <td> x </td>
                    <td> 16:00-17:30 </td>
                    <td> 16:00-17:30 </td>
                </tr>
                <tr>
                    <td> 18:00-19:30 </td>
                    <td> 18:00-19:30 </td>
                    <td> 18:00-19:30 </td>
                    <td> 18:00-19:30 </td>
                    <td> 18:00-19:30 </td>
                    <td> 18:00-19:30 </td>
                    <td> 18:00-19:30 </td>
                </tr>
                <tr>
                    <td> 20:00-20:30 </td>
                    <td> 20:00-20:30 </td>
                    <td> x </td>
                    <td> 20:00-20:30 </td>
                    <td> 20:00-20:30 </td>
                    <td> 20:00-20:30 </td>
                    <td> 20:00-20:30 </td>
                </tr>
                </div>
            </table>
        </div>
    </div>

    <div class="reservation">



        <div class="box1">
            <span class="cancel"><a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">X</a></span><!--Vorige Week-->
                <div class="boxcontent">
                    <p>Sessie 1</p>
                    <select id="json-one">
                        <option selected value="base">Kies een dag</option>
                        <option value="maandag">maandag</option>
                        <option value="dinsdag">dinsdag</option>
                        <option value="woensdag">woensdag</option>
                        <option value="donderdag">donderdag</option>
                        <option value="vrijdag">vrijdag</option>
                        <option value="zaterdag">zaterdag</option>
                        <option value="zondag">zondag</option>

                    </select>

                    <br />

                    <select id="json-two">
                        <option>Nog geen tijd beschikbaar...</option>
                    </select>

                    <br /><br /><br />

                    <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Opslaan</a><!--Next week-->
            </div>
        </div>

        <div class="box2">
            <span class="cancel"><a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">X</a></span><!--Vorige Week-->
            <div class="boxcontent">
                <p>Sessie 2</p>
                <select id="json-one">
                    <option selected value="base">Kies een dag</option>
                    <option value="maandag">maandag</option>
                    <option value="dinsdag">dinsdag</option>
                    <option value="woensdag">woensdag</option>
                    <option value="donderdag">donderdag</option>
                    <option value="vrijdag">vrijdag</option>
                    <option value="zaterdag">zaterdag</option>
                    <option value="zondag">zondag</option>

                </select>

                <br />

                <select id="json-two">
                    <option>Nog geen tijd beschikbaar...</option>
                </select>

                <br /><br /><br />
                <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Opslaan</a><!--Next week-->
            </div>
        </div>

        <div class="box3">
            <span class="cancel"><a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">X</a></span><!--Vorige Week-->
            <div class="boxcontent">
                <p>Sessie 3</p>
                <select id="json-one">
                    <option selected value="base">Kies een dag</option>
                    <option value="maandag">maandag</option>
                    <option value="dinsdag">dinsdag</option>
                    <option value="woensdag">woensdag</option>
                    <option value="donderdag">donderdag</option>
                    <option value="vrijdag">vrijdag</option>
                    <option value="zaterdag">zaterdag</option>
                    <option value="zondag">zondag</option>

                </select>

                <br />

                <select id="json-two">
                    <option>Nog geen tijd beschikbaar...</option>
                </select>

                <br /><br /><br />
                <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Opslaan</a><!--Next week-->
            </div>
        </div>
    </div>
</body>
