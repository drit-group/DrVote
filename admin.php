<?php
require "db.php";
$candidates = getCandidate();
foreach ($candidates as $candidate) {?>
    <div class="py-1">
        <h4><?php echo $candidate['name']; ?></h4>
        <p><?php echo $candidate['vote_count']; ?></p>
    </div>

<?php }?>