<?php

defined('BASEPATH') or exit('No direct script access allowed');
//echo "<pre>"; print_r($this->ci->input->post()); exit;
$baseCurrency = get_base_currency();
//echo "<pre>"; print_r($baseCurrency); exit;
$aColumns = [
	'1',
	//db_prefix() . 'items.id',
	'commodity_code',
	db_prefix() .'items.description',
	'sku_code',
	'date(created_on) as item_created',
	'created_on',
	'date(sold_on) as sold_on',
	db_prefix() . 'proposals.id',
	db_prefix() . 'proposals.proposal_to',
	'fifield.value as financial_institution',
	'purchase_price',
	db_prefix() .'items.rate',
	db_prefix() . 'itemable.rate as prate',
	'(SELECT SUM(amount) from '.db_prefix().'expenses WHERE '.db_prefix().'expenses.item_select='.db_prefix().'items.id) as totalExpenses',
	'('.db_prefix().'itemable.rate - (purchase_price + (SELECT COALESCE(SUM(amount),0) from '.db_prefix().'expenses WHERE '.db_prefix().'expenses.item_select='.db_prefix().'items.id))) as margin',
	'group_id',
	
	db_prefix() . 'items.warehouse_id',
	'(SELECT GROUP_CONCAT(name SEPARATOR ",") FROM ' . db_prefix() . 'taggables JOIN ' . db_prefix() . 'tags ON ' . db_prefix() . 'taggables.tag_id = ' . db_prefix() . 'tags.id WHERE rel_id = ' . db_prefix() . 'items.id and rel_type="item_tags" ORDER by tag_order ASC) as tags',
	'commodity_barcode',
	'unit_id',
	'commission_pack',
	'tax',
	'origin',
	'2',	//minimum stock
	'3',	//maximum stock
	
];
$sIndexColumn = 'id';
$sTable = db_prefix() . 'items';
//echo "<pre>"; print_r($this->ci->input->post()); exit;
$where = [];

$warehouse_ft = $this->ci->input->post('warehouse_ft');
$commodity_ft = $this->ci->input->post('commodity_ft');
$alert_filter = $this->ci->input->post('alert_filter');

$tags_ft = $this->ci->input->post('item_filter');

$groups_filter = $this->ci->input->post('item_group');
$itm_available_status_filter = $this->ci->input->post('available_item_statuses');

$join= [];


array_push($join, ' LEFT JOIN '.db_prefix().'itemable on '.db_prefix().'itemable.inv_id='.db_prefix().'items.id  AND '.db_prefix().'itemable.rel_type="proposal"');
array_push($join, ' LEFT JOIN '.db_prefix().'proposals on '.db_prefix().'proposals.id='.db_prefix().'itemable.rel_id ');

array_push($join, ' LEFT JOIN '.db_prefix().'customfieldsvalues as fifield on fifield.relid='.db_prefix().'proposals.id AND fifield.fieldto="proposal" AND fifield.fieldid IN ('.QUOTE_FINANCIAL_INSTITUTION_ID.') AND fifield.fieldto="proposal" ');

//array_push($where, ' ');

//$where[] = 'AND '.db_prefix().'customfieldsvalues.fieldid = 0';


$groupIdstoDisplay = implode(",",json_decode(INVENTORY_GROUP_ID,true));

if($groups_filter!=''){
	$where[] = 'AND '.db_prefix().'items.group_id = '. $groups_filter;
}else{
	$where[] = 'AND '.db_prefix().'items.group_id = 0';
}


$psearchStartDate =$this->ci->input->post('psearchstartdate');
$psearchToDate = $this->ci->input->post('psearchtodate');
//echo $psearchStartDate; exit;
if($psearchStartDate!=''){
    $psearchStartDate = date("Y-m-d", strtotime($psearchStartDate)); 
}
if($psearchToDate!=''){
    $psearchToDate = date("Y-m-d", strtotime($psearchToDate));
}


if($psearchStartDate!='' && $psearchToDate==''){
   // echo 'here'; exit;
    array_push($where, 'AND DATE(sold_on)= "'.$psearchStartDate.'" ');
    //$where[] = ' AND DATE(datecreated)= ' . $psearchStartDate;
}

if($psearchStartDate!='' && $psearchToDate!=''){
   
    array_push($where, 'AND (DATE(sold_on) BETWEEN "'.$psearchStartDate.'" AND  "'.$psearchToDate.'")');
  
}




$where[] = 'AND '.db_prefix().'items.active = 1';

if (isset($warehouse_ft)) {
	$arr_commodity_id = $this->ci->warehouse_model->get_commodity_in_warehouse($warehouse_ft);

	$where[] = 'AND '.db_prefix().'items.id IN (' . implode(', ', $arr_commodity_id) . ')';
	
}

if (isset($commodity_ft)) {
	$where_commodity_ft = '';
	foreach ($commodity_ft as $commodity_id) {
		if ($commodity_id != '') {
			if ($where_commodity_ft == '') {
				$where_commodity_ft .= ' AND (tblitems.id = "' . $commodity_id . '"';
			} else {
				$where_commodity_ft .= ' or tblitems.id = "' . $commodity_id . '"';
			}
		}
	}
	if ($where_commodity_ft != '') {
		$where_commodity_ft .= ')';
		array_push($where, $where_commodity_ft);
	}
}

/*alert_filter*/
if (isset($alert_filter)) {
	if ($alert_filter != '') {
		if ($alert_filter == "1") {
			//out of stock
			$arr_commodity_id = $this->ci->warehouse_model->get_commodity_alert($alert_filter);
			if(count($arr_commodity_id) > 0){
				$where[] = 'AND '.db_prefix().'items.id IN (' . implode(', ', $arr_commodity_id) . ')';

			}


		} else {
			//exprired
			$arr_commodity_id = $this->ci->warehouse_model->get_commodity_alert($alert_filter);

			if(count($arr_commodity_id) > 0){
				$where[] = 'AND '.db_prefix().'items.id IN (' . implode(', ', $arr_commodity_id) . ')';
			}

		}
	}
}


//tags filter
if (isset($tags_ft)) {
	$where_tags_ft = '';
	foreach ($tags_ft as $commodity_id) {
		if ($commodity_id != '') {
			if ($where_tags_ft == '') {
				$where_tags_ft .= ' AND (tblitems.id = "' . $commodity_id . '"';
			} else {
				$where_tags_ft .= ' or tblitems.id = "' . $commodity_id . '"';
			}
		}
	}
	if ($where_tags_ft != '') {
		$where_tags_ft .= ')';
		array_push($where, $where_tags_ft);
	}
}


$custom_fields = get_custom_fields('items', [
    'show_on_table' => 1,
    ]);
    

foreach ($custom_fields as $key => $field) {
    $selectAs = (is_cf_date($field) ? 'date_picker_cvalue_' . $key : 'cvalue_' . $key);

    array_push($customFieldsColumns, $selectAs);
    array_push($aColumns, 'ctable_' . $key . '.value as ' . $selectAs);
    array_push($join, 'LEFT JOIN ' . db_prefix() . 'customfieldsvalues as ctable_' . $key . ' ON ' . db_prefix() . 'items.id = ctable_' . $key . '.relid AND ctable_' . $key . '.fieldto="items_pr" AND ctable_' . $key . '.fieldid=' . $field['id']);
}
//echo "<pre>"; print_r($customFieldsColumns); exit;
if($itm_available_status_filter == 'Sold' && $itm_available_status_filter!='0'){
	array_push($join, ' LEFT JOIN '.db_prefix().'customfieldsvalues on '.db_prefix().'customfieldsvalues.relid='.db_prefix().'items.id AND '.db_prefix().'customfieldsvalues.fieldto="items_pr"');
	array_push($join, ' LEFT JOIN '.db_prefix().'customfields on '.db_prefix().'customfields.id='.db_prefix().'customfieldsvalues.fieldid AND '.db_prefix().'customfieldsvalues.fieldto="items_pr"');
	array_push($where, 'AND '.db_prefix().'customfieldsvalues.fieldid IN ('.INV_AVAILABLE_STATUS_FIELD_ID.') AND '.db_prefix().'customfieldsvalues.fieldto="items_pr" and '.db_prefix().'customfieldsvalues.value="Sold"');
	
}

// Fix for big queries. Some hosting have max_join_limit
if (count($custom_fields) > 4) {
    @$this->ci->db->query('SET SQL_BIG_SELECTS=1');
}


$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [db_prefix() . 'items.id', db_prefix() . 'items.description', db_prefix() . 'items.unit_id', db_prefix() . 'items.commodity_code', db_prefix() . 'items.commodity_barcode', db_prefix() . 'items.commodity_type', db_prefix() . 'items.warehouse_id', db_prefix() . 'items.origin', db_prefix() . 'items.color_id', db_prefix() . 'items.style_id', db_prefix() . 'items.model_id', db_prefix() . 'items.size_id', db_prefix() . 'items.rate', db_prefix() . 'items.tax', db_prefix() . 'items.group_id', db_prefix() . 'items.long_description', db_prefix() . 'items.sku_code', db_prefix() . 'items.sku_name', db_prefix() . 'items.sub_group', db_prefix() . 'items.color', db_prefix() . 'items.guarantee', db_prefix().'items.profif_ratio', db_prefix().'items.without_checking_warehouse', db_prefix().'items.parent_id']);

$output = $result['output'];
$rResult = $result['rResult'];

//echo "<pre>"; print_r($aColumns); exit;
//echo "<pre>"; print_r($rResult); exit;

	foreach ($rResult as $aRow) {
		//
		$row = [];
		for ($i = 0; $i < count($aColumns); $i++) {

			 if (strpos($aColumns[$i], 'as') !== false && !isset($aRow[$aColumns[$i]])) {
	            $_data = $aRow[strafter($aColumns[$i], 'as ')];
	        } else {
				$_data = $aRow[$aColumns[$i]];
	        }
			
			/*get commodity file*/
			/*$arr_images = $this->ci->warehouse_model->get_warehourse_attachments($aRow['id']);
			if($aColumns[$i] == db_prefix() . 'items.id'){
				if (count($arr_images) > 0) {
					
					$_data = '<img class="images_w_table" src="' . $arr_images[0]['file_name'] . '" alt="nul_image.jpg">';
				} else {

					$_data = '<img class="images_w_table" src="' . site_url('modules/warehouse/uploads/nul_image.jpg') . '" alt="nul_image.jpg">';
				}
			}*/

			if ($aColumns[$i] == 'commodity_code') {
				$code = '<a href="' . admin_url('warehouse/view_commodity_detail/' . $aRow['id']) . '">' . $aRow['commodity_code'] . '</a>';
				$code .= '<div class="row-options">';

				$code .= '<a href="' . admin_url('warehouse/view_commodity_detail/' . $aRow['id']) . '" >' . _l('view') . '</a>';

				/*if (has_permission('warehouse', '', 'edit') || is_admin()) {
					$code .= ' | <a href="#" onclick="edit_commodity_item(this); return false;"  data-commodity_id="' . $aRow['id'] . '" data-description="' . $aRow['description'] . '" data-unit_id="' . $aRow['unit_id'] . '" data-commodity_code="' . $aRow['commodity_code'] . '" data-commodity_barcode="' . $aRow['commodity_barcode'] . '" data-commodity_type="' . $aRow['commodity_type'] . '" data-origin="' . $aRow['origin'] . '" data-color_id="' . $aRow['color_id'] . '" data-style_id="' . $aRow['style_id'] . '" data-model_id="' . $aRow['model_id'] . '" data-size_id="' . $aRow['size_id'] . '"  data-rate="' . app_format_money($aRow['rate'], '') . '" data-group_id="' . $aRow['group_id'] . '" data-tax="' . $aRow['tax'] . '"  data-warehouse_id="' . $aRow['warehouse_id'] . '" data-sku_code="' . $aRow['sku_code'] . '" data-sku_name="' . $aRow['sku_name'] . '" data-sub_group="' . $aRow['sub_group'] . '" data-purchase_price="' . $aRow['purchase_price'] . '" data-commission_pack="' . $aRow['commission_pack']  . '" data-color="' . $aRow['color'] . '" data-guarantee="' . $aRow['guarantee'] . '" data-profif_ratio="' . $aRow['profif_ratio'] . '" data-without_checking_warehouse="' . $aRow['without_checking_warehouse'] . '" data-parent_id="' . $aRow['parent_id'] . '" >' . _l('edit') . '</a>';
				}
				if (has_permission('warehouse', '', 'delete') || is_admin()) {
					$code .= ' | <a href="' . admin_url('warehouse/delete_commodity/' . $aRow['id']) . '" class="text-danger _delete">' . _l('delete') . '</a>';
				}*/

				$code .= '</div>';

				$_data = $code;

			}elseif($aColumns[$i] == '1'){
				$_data = '<div class="checkbox"><input type="checkbox" value="' . $aRow['id'] . '"><label></label></div>';
			} elseif ($aColumns[$i] == 'description') {
				$inventory = $this->ci->warehouse_model->check_inventory_min($aRow['id']);

				if ($inventory) {
					$_data = '<a href="#" onclick="show_detail_item(this);return false;" data-name="' . $aRow['description'] . '"  data-commodity_id="' . $aRow['id'] . '"  >' . $aRow['description'] . '</a>';
				} else {

					$_data = '<a href="#" class="text-danger"  onclick="show_detail_item(this);return false;" data-name="' . $aRow['description'] . '" data-warehouse_id="' . $aRow['warehouse_id'] . '" data-commodity_id="' . $aRow['id'] . '"  >' . $aRow['description'] . '</a>';
					
				}
			
			}elseif($aColumns[$i] == 'sku_code'){
				if($aRow['sku_code']!=''){
					$_data = '<span class="label label-tag tag-id-1"><span class="tag"><a target="blank" href="'.base_url('proposal/warranty/' . $aRow['sku_code']).'" >' . $aRow['sku_code'] . '</a></span><span class="hide">, </span></span>&nbsp';
				}else{
				$_data = '<span class="label label-tag tag-id-1"><span class="tag">' . $aRow['sku_code'] . '</span><span class="hide">, </span></span>&nbsp';
				}
			}elseif($aColumns[$i] == 'date(created_on) as item_created'){
				$_data = _d($aRow['item_created']);
			}elseif ($aColumns[$i] == 'created_on') {
				if($aRow['created_on']!=''){
					if($aRow['sold_on']!=''){
						
						/*$now = strtotime($aRow['sold_on']); // or your date as well
						$your_date = strtotime($aRow['created_on']);
						$datediff = $now - $your_date;	
						$res = floor($datediff / (60 * 60 * 24));*/		



						$startTimeStamp = strtotime($aRow['sold_on']);
						$endTimeStamp = strtotime($aRow['created_on']);

						$timeDiff = abs($endTimeStamp - $startTimeStamp);

						$numberDays = $timeDiff/86400;  // 86400 seconds in one day

						// and you might want to convert to integer
						$res = intval($numberDays);


						
						$_data = $res;
						
					}else{
					
						$now = time(); // or your date as well
						$your_date = strtotime($aRow['created_on']);
						$datediff = $now - $your_date;	
						$res = round($datediff / (60 * 60 * 24));					
						$_data = $res;
					}
				}else{
					$_data ='';
				}	
				
			}elseif($aColumns[$i] == 'date(sold_on) as sold_on'){
				$_data = _d($aRow['sold_on']);
			}elseif($aColumns[$i] == 'tblproposals.id'){
				if($aRow[db_prefix() . 'proposals.id']!=''){
					   //$numberOutput = '<a href="' . admin_url('proposals/list_proposals/' . $aRow[db_prefix() . 'proposals.id']) . '"' . ($project_id ? 'target="_blank"' : 'onclick="init_proposal(' . $aRow[db_prefix() . 'proposals.id'] . '); return false;"') . '>' . format_proposal_number($aRow[db_prefix() . 'proposals.id']) . '</a>';
					   $numberOutput = '<a target="_blank"  href="' . admin_url('proposals/list_proposals/' . $aRow[db_prefix() . 'proposals.id']) . '") >' . format_proposal_number($aRow[db_prefix() . 'proposals.id']) . '</a>';
					   $_data = $numberOutput;
				}else{
					$_data = '';
				}
				
			}elseif($aColumns[$i] == 'tblproposals.proposal_to'){
				$_data = $aRow['tblproposals.proposal_to'];
			}elseif($aColumns[$i] == 'fifield.value as financial_institution'){
				$_data = $aRow['financial_institution'];
			}elseif ($aColumns[$i] == 'purchase_price') {
				
				$_data = app_format_money($aRow['purchase_price'], (isset($aRow['currency']) && $aRow['currency'] != 0 ? '$'.get_currency($aRow['purchase_price']) : $baseCurrency));
			}elseif ($aColumns[$i] == 'tblitems.rate') {
				
				$_data = app_format_money($aRow['tblitems.rate'], (isset($aRow['currency']) && $aRow['currency'] != 0 ? '$'.get_currency($aRow['tblitems.rate']) : $baseCurrency));
			}elseif($aColumns[$i] == 'tblitemable.rate as prate'){
				$amount = app_format_money($aRow['prate'], (isset($aRow['currency']) && $aRow['currency'] != 0 ? get_currency($aRow['prate']) : $baseCurrency));
				$_data = $amount;
			}elseif($aColumns[$i] == '(SELECT SUM(amount) from tblexpenses WHERE tblexpenses.item_select=tblitems.id) as totalExpenses'){
				$amount = app_format_money($aRow['totalExpenses'], (isset($aRow['currency']) && $aRow['currency'] != 0 ? get_currency($aRow['totalExpenses']) : $baseCurrency));
				$_data = $amount;
			}elseif($aColumns[$i] == '(tblitemable.rate - (purchase_price + (SELECT COALESCE(SUM(amount),0) from tblexpenses WHERE tblexpenses.item_select=tblitems.id))) as margin'){
				if($aRow['margin'] !=''){
				
					$amount = app_format_money($aRow['margin'], (isset($aRow['currency']) && $aRow['currency'] != 0 ? get_currency($aRow['margin']) : $baseCurrency));
					if($aRow['margin']>0){
					$_data = '<span style="color:green">'.$amount.'</span>';
					}else{
					$_data = '<span style="color:red">'.$amount.'</span>';
					}
				}else{
					$_data = '$0.00';
				}
			} elseif ($aColumns[$i] == 'group_id') {
				$_data = get_wh_group_name($aRow['group_id']) != null ? get_wh_group_name($aRow['group_id'])->name : '';
			} elseif ($aColumns[$i] == db_prefix() . 'items.warehouse_id') {
				$_data ='';
				$arr_warehouse = get_warehouse_by_commodity($aRow['id']);

				$str = '';
				if(count($arr_warehouse) > 0){
					foreach ($arr_warehouse as $wh_key => $warehouseid) {
						$str = '';
						if ($warehouseid['warehouse_id'] != '' && $warehouseid['warehouse_id'] != '0') {
							//get inventory quantity
							$inventory_quantity = $this->ci->warehouse_model->get_quantity_inventory($warehouseid['warehouse_id'], $aRow['id']);
							$quantity_by_warehouse =0;
							if($inventory_quantity){
								$quantity_by_warehouse = $inventory_quantity->inventory_number;
							}

							$team = get_warehouse_name($warehouseid['warehouse_id']);
							if($team){
								$value = $team != null ? get_object_vars($team)['warehouse_name'] : '';

								$str .= '<span class="label label-tag tag-id-1"><span class="tag">' . $value . ': ( '.$quantity_by_warehouse.' )</span><span class="hide">, </span></span>&nbsp';

								$_data .= $str;
								if($wh_key%3 ==0){
									$_data .='<br/>';
								}
							}

						}
					}

				} else {
					$_data = '';
				}


			}elseif($aColumns[$i] == '(SELECT GROUP_CONCAT(name SEPARATOR ",") FROM ' . db_prefix() . 'taggables JOIN ' . db_prefix() . 'tags ON ' . db_prefix() . 'taggables.tag_id = ' . db_prefix() . 'tags.id WHERE rel_id = ' . db_prefix() . 'items.id and rel_type="item_tags" ORDER by tag_order ASC) as tags'){
				
				$_data = render_tags($aRow['tags']);

			} elseif ($aColumns[$i] == 'unit_id') {
				if ($aRow['unit_id'] != null) {
					$_data = get_unit_type($aRow['unit_id']) != null ? get_unit_type($aRow['unit_id'])->unit_name : '';
				} else {
					$_data = '';
				}
			}  elseif ($aColumns[$i] == 'commission_pack') {
				$_data = app_format_money($aRow['commission_pack'], (isset($aRow['currency']) && $aRow['currency'] != 0 ? get_currency($aRow['commission_pack']) : $baseCurrency));

			} elseif ($aColumns[$i] == 'tax') {
				$_data ='';
				$tax_rate = get_tax_rate($aRow['tax']);
				if($aRow['tax']){
					if($tax_rate && $tax_rate != null && $tax_rate != 'null'){
						$_data = $tax_rate->name;
					}
				}

			} elseif ($aColumns[$i] == 'commodity_barcode') {
				/*inventory number*/
				$inventory_number = 0;
        		$inventory = $this->ci->warehouse_model->get_inventory_by_commodity($aRow['id']);

        		if($inventory){
        			$inventory_number =  $inventory->inventory_number;
        		}
				$_data = $inventory_number;

			} elseif ($aColumns[$i] == 'origin') {

        		$inventory = $this->ci->warehouse_model->check_inventory_min($aRow['id']);


				if ($inventory) {
					$_data = '';
				} else {
					$_data = '<span class="label label-tag tag-id-1 label-tabus "><span class="tag text-danger">' . _l('unsafe_inventory') . '</span><span class="hide">, </span></span>&nbsp';
				}
			} elseif ($aColumns[$i] == '2') {
				/*3: minmumstock, maximum stock*/
				$minmumstock = '';

				$inventory_min = $this->ci->warehouse_model->get_inventory_min($aRow['id']);
				if($inventory_min){

					$minmumstock .= $inventory_min->inventory_number_min ;
				}


				$_data =  $minmumstock;

			}elseif ($aColumns[$i] == '3') {
				/*3: minmumstock, maximum stock*/
				$maxmumstock = '';

				$inventory_min = $this->ci->warehouse_model->get_inventory_min($aRow['id']);
				if($inventory_min){

					$maxmumstock .= $inventory_min->inventory_number_max ;
				}

				$_data = $maxmumstock;

			}


			$row[] = $_data;

		}
		$output['aaData'][] = $row;
	}

