<?php
if (!defined('ABSPATH'))
    die('No direct access allowed');
global $WOOCS;
$currencies = apply_filters('woocs_currency_manipulation_before_show', $WOOCS->get_currencies());
?>
<style>
    .woocs_auto_switcher {
        top: <?php echo $top ?>;
    } 
    .woocs_auto_switcher li a {
        background:<?php echo $color ?>;
    }
    .woocs_auto_switcher li a.woocs_curr_curr {
        background:<?php echo $hover_color ?>;
    }
    .woocs_auto_switcher li  a:hover {
        background:<?php echo $hover_color ?>;
    }
    .woocs_auto_switcher li  a span {
        background:<?php echo $hover_color ?>;
    }
</style>

<ul class='woocs_auto_switcher <?php echo $side ?>' data-view="classic_blocks">
    <?php
    foreach ($currencies as $key => $item):
        $current = "";
        if ($key == $WOOCS->current_currency) {
            $current = "woocs_curr_curr";
        }
        $base_text = $this->prepare_field_text($item, $basic_field);
        $add_text = $this->prepare_field_text($item, $add_field);
        ?>  
        <li>
            <a data-currency="<?php echo $key ?>" class="  <?php echo $current ?> woocs_auto_switcher_link" href="#"><?php echo $base_text ?> 
                <span><div style="display: table;"><?php echo $add_text ?></div></span>
            </a> 
        </li>
<?php endforeach; ?>

</ul>
