<?php
function user_collision($massive, $im = 0)
{
    global $user;
    $new = false;
    for ($i=0; $i < count($massive); $i++) {
        $collision_q = go\DB\query("SELECT * FROM `user_collision` WHERE `id_user` = '" . $massive[$i] . "' OR `id_user2` = '" . $massive[$i] . "'");
        while ($collision = $collision_q->row()) {
            if ($collision['id_user'] == $massive[$i]) {
                $coll = $collision['id_user2'];
            } else {
                $coll = $collision['id_user'];
            }
            $ank_coll2 = go\DB\query('SELECT `id`, `level` FROM `user` WHERE `id`=?i', [$coll])->row();
            if (!in_array($coll, $massive) && ($user['level'] > $ank_coll2['level']) && ($im == 0 || $user['id'] != $ank_coll2['id'])) {
                $massive[] = $coll;
                $new = true;
            }
        }
    }
    if ($new) {
        $massive = user_collision($massive);
    }
    return $massive;
}
