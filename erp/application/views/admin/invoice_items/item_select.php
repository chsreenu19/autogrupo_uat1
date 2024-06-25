<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php 
//echo "<pre>"; print_r($items); exit;
?>
<div
    class="form-group mbot25 items-wrapper select-placeholder<?php echo staff_can('create', 'items') ? ' input-group-select' : ''; ?>">
    <div class="<?php echo staff_can('create', 'items') ? 'input-group input-group-select' : ''; ?>">
        <div class="items-select-wrapper input-group-btn">
            <select name="item_select"
                class="selectpicker no-margin<?php echo $ajaxItems == true ? ' ajax-search' : ''; ?><?php echo staff_can('create', 'items') ? ' _select_input_group' : ''; ?>"
                data-width="false" id="item_select" data-none-selected-text="<?php echo _l('add_item'); ?>"
                data-live-search="true">
                <option value=""></option>
                <?php foreach ($items as $group_id => $_items) { ?>
                <optgroup data-group-id="<?php echo $group_id; ?>" label="<?php echo $_items[0]['group_name']; ?>">
                    <?php foreach ($_items as $item) { ?>
                   


                        <option value="<?php echo $item['id']; ?>"
                        data-subtext="<?php echo ($item['description']); ?>">
                        <?php echo '('.$item['sku_code'].') '; ?></option>    



                    <?php } ?>
                </optgroup>
                <?php } ?>
            </select>
        </div>
        <?php if (staff_can('items', '', 'create')) { ?>
        <!--<div class="input-group-btn">
            <a href="#" data-toggle="modal" class="btn btn-default" data-target="#sales_item_modal">
                <i class="fa fa-plus"></i>
            </a>
        </div>-->
        <?php } ?>
    </div>
</div>