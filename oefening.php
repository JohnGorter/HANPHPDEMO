<?php
$synths = [
    'Moog'=> ['Grandmother', 'Minimoog',], 'Korg' => ['MS-10', 'VC-10'], 'Roland' => ['Juno 106', 'TR-808']
    ];

    echo password_hash("secret", PASSWORD_DEFAULT);

    echo "<UL>";
foreach ($synths as $k => $v) {
    foreach($v as $m){
        echo "<LI>" . $m . " - " . $k . "</LI>";
    }
}
echo "</UL>";
?>