</td></tr>
</table>
</td></tr>
</table></div></div>
<?php
rekl(3);
?>
<table>
    <div id="footer" class="gradient_grey">
        <div class="body_width_limit">
            <span id="copyright">
<a href="/user/users.php">Зарегистрировано (<?php echo
$db->query("SELECT COUNT(`id`)FROM `user`")->el();?>)</a>
            </span>
            <span id="copyright">
<a href="/online.php">Онлайн (<?php echo
$db->query("SELECT COUNT(`id`) FROM `user` WHERE `date_last` > " . (time() - 600) . "")->el();?>)</a>
            </span>
            <span id="copyright">
<a href="/online_g.php">Гостей (<?php echo
$db->query("SELECT COUNT(*) FROM `guests` WHERE `date_last` > " . (time() - 600) . " AND `pereh` > '0'")->el();?>)</a>
       <a href="/?t=wap">Wap версия </a>
            </span>
            <span id="language">
    <a href="/index.php"><font style="text-transform: capitalize;">© <?php echo htmlspecialchars($_SERVER['HTTP_HOST']);?> - <?php echo date('Y');?> г.</font></a></span>
            <span id="generation">
<?php
list($msec, $sec) = explode(chr(32), microtime());
$page_size = ob_get_length();
ob_end_flush();
if (!isset($_SESSION['traf'])) {
    $_SESSION['traf'] = 0;
}
$_SESSION['traf'] += $page_size;
?><a href="http://dcms-social.ru/"><span style="color:white;">DCMS-Social <?php
echo (isset($user) && $user['group_access'] > 6 ? 'Sql: ' . $db->query_number ?: '' : '')?></span></a>
 </span>                    
                </div>
            </div>
</table></body>
</html><?php
exit;
?>