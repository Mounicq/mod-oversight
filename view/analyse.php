<?php
if (!defined('IN_SPYOGAME')) die("Hacking attempt");
//$playerId = $data["player_id"];

setlocale(LC_TIME, "fr");
//$tmstamp = time();
//$tmstampToday = strtotime(date("Y-m-d", $tmstamp), $tmstamp);
//$tmstampTodaystr = strftime("%A %d %B", $tmstampToday);
//$tmstampTomorrow = strtotime(date("Y-m-d", $tmstamp + 86400), $tmstamp);
//$step = 15 * 60;

$tCoord = get_DisctinctCoord($data["player_id"]);
sort($tCoord);
//$CoordCount = count($tCoord);
$insterts = $data["insert"];
//$insterts = getMyInsert($playerId);
$tInsert = formatMyInsert($insterts, $tCoord);
//$tInsert = (getMyInsert($playerId));
$DisctinctDAte = getDisctinctDAte($insterts);

?>
<link href="<?php echo $data['cssfile']; ?>" rel="stylesheet" type="text/css" media="all">
<h2> Joueur <?php echo $data["players"][$data["player_id"]]["name_player"]; ?>
    <?php if (isset($pub_all)) : ?>
        <small>
            <a href="index.php?action=oversight&page=analyse&player_id=<?php echo $data["player_id"]; ?>">
                Mes Insertions
            </a>
        </small>
    <?php else : ?>
        <small>
            <a href="index.php?action=oversight&page=analyse&all&player_id=<?php echo $data["player_id"]; ?>">
                Insertions alliance
            </a>
        </small>
    <?php endif; ?>
</h2>

<table width="100%" class="oversight">
    <?php foreach ($DisctinctDAte as $key => $value) : ?>
        <?php echo getAnalyseHTMLTable($key, $tCoord, $tInsert); ?>
    <?php endforeach; ?>
    <?php //echo getAnalyseHTMLTable($tmstampToday, $tCoord, $tInsert); ?>
</table>

