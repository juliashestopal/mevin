<style>
    span[class$="_delete_item"] {
        color: red;
        font-size: 20px;
        cursor: pointer;
    }
    input[type=text]{
        width: 60%;
    }
</style>
<script type="text/javascript">

    function removeElement(setting, item) {
        item = item.id.match(/\d+/)[0];
        jQuery("#" + setting + '_' + item).remove();
    }

    function addElement(setting, keysObject) {

        var currentItem = document.getElementsByClassName(setting + '_settings').length;
        var tr = document.createElement('tr');
        tr.className = setting + '_settings';
        tr.id = setting + '_' + currentItem;

        var span = document.createElement('span');
        span.innerHTML = 'x';
        span.id = 'span_' + setting + '_' + currentItem;
        span.className = setting + '_delete_item';

        span.onclick = function () {
            removeElement(setting, this);
        };

        if(!keysObject) {
            var td = document.createElement('td');
            td.className = setting + '_td';

            var input = document.createElement('input');
            input.type = 'text';
            input.name = setting + '[' + currentItem + ']';

            var n = 1;
            while (document.getElementsByName(input.name).length != 0) {
                tr.id = setting + '_' + (currentItem - n);
                input.name = setting + '[' + (currentItem - n) + ']';
                span.id = 'span_' + setting + '_' + (currentItem - n);
                n = n + 1;
            }

            tr.appendChild(td);
            td.appendChild(input);
            td.appendChild(span);
        }

        else {
            var tdForSpan = document.createElement('td');
            tdForSpan.appendChild(span);

            Object(keysObject).forEach(function(key) {
                var td = document.createElement('td');
                td.className  =  setting + '_td';
                td.innerHTML = ((key.charAt(0).toUpperCase() + key.slice(1) + ' ').replace('_', ' ')).bold();

                var input = document.createElement('input');
                input.type = 'text';
                input.name  =  setting + '[' + currentItem + ']' + '[' + key + ']';

                var n = 1;
                while (document.getElementsByName(input.name).length != 0) {
                    tr.id = setting + '_' + (currentItem - n);
                    input.name = setting + '[' + (currentItem - n) + ']' + '[' + key + ']';
                    span.id = 'span_' + setting + '_' + (currentItem - n);
                    n = n + 1;
                }

                tr.appendChild(td);
                td.appendChild(input);
            });

            tr.appendChild(tdForSpan);
        }
        jQuery('.widefat #' + setting + '_insert_item_before').before(tr);
    }

</script>
<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

$url_param_settings = (object)[
    'url_params_headphones' => array('amz_tag', 'keyword1', 'keyword2')
];

$multipleListSettings = array('url_params_headphones');

?>
<div class='wrap constants_settings'>
    <h1> URL Params </h1>
    <form name="constants_settings" method="post"
          action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <?php if (function_exists('wp_nonce_field')) {
            wp_nonce_field('styles_settings');
        } ?>
        <?php foreach ($url_param_settings as $setting => $key) {
            $current_settings = get_option($setting);
            echo "<hr><h2>" . ucwords(str_replace("_", " ", ($setting))) . "</h2>";
            echo '<table class="widefat" style="margin-bottom: 30px; margin-top: 10px;table-layout:fixed;"><tbody>';
            if (in_array($setting, $multipleListSettings)) {
                for ($i = 0; $i < sizeof($current_settings); $i++) {
                    if($current_settings) {
                        echo "<tr class='{$setting}_settings' id='{$setting}_{$i}' >";
                        foreach ($key as $item) {
                            echo "<td class='{$setting}_td'><b>" . ucwords(str_replace("_", " ", ($item))) . '</b> ' .
                                "<input type='text'
                                      name='{$setting}[{$i}][{$item}]'
                                      value='{$current_settings[$i][$item]}'/>
                          	   </td>";
                        }
                        echo "<td>";
                        echo "<span id='span_{$setting}_{$i}' onclick='removeElement(\"$setting\", this)' class='{$setting}_delete_item'>x</span>";
                        echo '</td></tr>';
                    }
                }
                echo "<tr id='{$setting}_insert_item_before'>";
                $keys = json_encode($key);
                echo "<td><a href='#!' class='button button-secondary add_{$setting}_item' onclick='addElement(\"$setting\", $keys)'> Add Item </a></td>";
            }
            echo '</table>';
        } ?>

        <p class="submit">
            <input type="submit" name="submit" class="button button-primary"
                   value="<?php _e('Update Params') ?>"/>
        </p>
    </form>
</div>
