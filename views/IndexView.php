<!DOCTYPE html>
<html>
    <head>
        <meta charset="charset=utf-8">
        <title>Poker Chance Calculator</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
    <?php if(!isset($data["success"])): ?>
    <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <div class="card-header">
                <h5>Select your card:</h5>
            <form method="post">
                <?php if (isset($data["deck"])): ?>
                <input name="deck" type="hidden" value="<?php print $data["deck"]; ?>">
                <?php endif; ?>
                <?php if (isset($data["selected_suit"])): ?>
                    <input name="suit" type="hidden" value="<?php print $data["selected_suit"]; ?>">
                <?php endif; ?>
                <?php if (isset($data["selected_rank"])): ?>
                    <input name="rank" type="hidden" value="<?php print $data["selected_rank"]; ?>">
                <?php endif; ?>
                <label>
                    Suit:
                    <select name="suit" <?php if (isset($data["selected_suit"])) print "disabled"; ?>>
                        <?php foreach ($data["suits"] as $suit) : ?>
                            <option value="<?php print $suit; ?>" <?php if (isset($data["selected_suit"]) && $data["selected_suit"] == $suit) print "selected"; ?>><?php print $suit; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>
                    Rank:
                    <select name="rank" <?php if (isset($data["selected_suit"])) print "disabled"; ?>>
                        <?php foreach ($data["ranks"] as $rank) : ?>
                            <option value="<?php print $rank; ?>" <?php if (isset($data["selected_rank"]) && $data["selected_rank"] == $rank) print "selected"; ?>><?php print $rank; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <div><button type="submit" class="btn btn-primary">Draw!</button></div>
            </form>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Your chance to draw the selected card is: <b><?php print round($data["chance"],2); ?>%</b></li>
                <li class="list-group-item">Current size of deck: <b><?php print $data["deck_size"]; ?></b></li>
                <?php if (isset($data["drawn_card"])): ?>
                    <li class="list-group-item">You drawn the card: <b><?php print $data["drawn_card"]; ?></b</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php else: ?>
    <div class="card text-center border-success mb-3" style="width: 18rem;">
        <div class="card-body">
            <div class="card-header">
                <p>Got it, the chance was <b><?php print round($data["chance_success"]); ?>%</b></p>
                <p><a href="/" class="btn btn-outline-success">Again!</a></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    </body>
</html>