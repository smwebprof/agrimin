<style> 
            h1 { 
                color:Green; 
            } 
            div.scroll { 
                margin:4px, 4px; 
                padding:4px; 
                background-color: white; 
                width: 500px; 
                height: 110px; 
                overflow-y: auto;
				height: 100px;
            } 
        </style> 
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					File Register (New)
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<!--<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Actions
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="#">
										Action
									</a>
								</li>
								<li>
									<a href="#">
										Another action
									</a>
								</li>
								<li>
									<a href="#">
										Something else here
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">
										Separated link
									</a>
								</li>
							</ul>
						</li>-->
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo BASE_PATH; ?>dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Sales
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								New File Register
							</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_0" data-toggle="tab">
									 Form Actions
								</a>
							</li>
							<!--<li>
								<a href="#tab_1" data-toggle="tab">
									 2 Columns
								</a>
							</li>
							<li>
								<a href="#tab_2" data-toggle="tab">
									 2 Columns Horizontal
								</a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">
									 2 Columns View Only
								</a>
							</li>
							<li>
								<a href="#tab_4" data-toggle="tab">
									 Row Seperated
								</a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">
									 Bordered
								</a>
							</li>
							<li>
								<a href="#tab_6" data-toggle="tab">
									 Row Stripped
								</a>
							</li>
							<li>
								<a href="#tab_7" data-toggle="tab">
									 Label Stripped
								</a>
							</li>-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>File Register - New
										</div>
										<!--<div class="actions">
										<a href="<?php echo BASE_PATH; ?>newclientinteraction" class="btn red">
											<i class="fa fa-pencil"></i> Add New Client Interaction
										</a>
										<a href="<?php echo BASE_PATH; ?>viewclientinteraction" class="btn blue">
											<i class="fa fa-pencil"></i> View All Interactions
										</a>
									    </div>-->
										<!--<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>-->
									</div>
					
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
																			<?php
												   #print_r($this->data);
												   #echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';
											?><br>
					
										<form action="" method="post" class="form-horizontal addfileregister-form" enctype="multipart/form-data">
											<div class="form-body">
												<h3 class="form-section alert alert-info">File Details</h3>
												* Marked fields are Mandotary <br/><br/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Creation Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-5d">
																<input type="text" class="form-control" name="file_date" id="file_date" value="<?php echo date('d-m-Y'); ?>"readonly>
																<span for="file_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->
												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company/Clients Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="branch_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Client Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="billing_name" id="billing_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="billing_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Job ref no*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_ref_no" id="client_ref_no" value="">
																<span for="client_ref_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Scope of Services*</label>
															<div class="col-md-9">
																<select class="form-control" name="scope_services" id="scope_services">
																	<option value="">Please Select</option>
																	<option value="Analysis">Analysis</option>
																	<option value="Dry Cargo">Dry Cargo</option>
																	<option value="Liquid Cargo">Liquid Cargo</option>
																</select>
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tax Options*</label>
															<div class="col-md-9">
																<select class="form-control" name="tax_options" id="tax_options">
																	<option value="">Please Select</option>
																	<option value="GST">GST</option>
																	<option value="VAT">VAT</option>
																</select>
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												
												<h3 class="form-section alert alert-info">File Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-5d">
																<input type="text" class="form-control" name="nomination_date" id="nomination_date" value="<?php echo date('d-m-Y'); ?>"readonly>
																<span for="nomination_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Import/Export*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="import_export" id="import_export">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['importexport'];

													                foreach($rows as $importexport){ 
													                	echo '<option value='.$importexport["id"].'>'.$importexport["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="import_export" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Type*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="file_type" id="file_type">
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['filetype'];

													                foreach($rows as $filetype){ 
													                	echo '<option value='.$filetype["id"].'>'.$filetype["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="file_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File options*</label>
															<div class="col-md-9">
																<!-- <div class="checkbox-list">
																	<label>
																	<input type="checkbox" name="file_options" id="file_options"> Lot wise sampling & Analysis </label>
																	<label>
																	<input type="checkbox"  name="file_options" id="file_options"> Test weighment at Factory </label>
																	<label>
																	<input type="checkbox"  name="file_options" id="file_options"> Truck loading and dispatch </label>
																	<span for="file_options" class="help-block"></span>
																</div> -->
																<div class="checkbox-list scroll" style="width:10;height:10;overflow-y:scroll">
																	<?php
		$options = $this->data['filesuboptions'];
		#echo "<fieldset>";
		$i=1;
		foreach ($options as $k => $v) {
			

			/*if ($i==1) {
				echo '<div id="div1"
				style="display:visible">';
			} else {
				echo '<div id="div2" style="display:none">';
			}
			echo "<fieldset>";	
			echo '<input type="checkbox" class="parentCheckBox" name="sub_type_'.$i.'" />'.$k.'<br />';
			foreach ($v as $p => $q) {
				echo '<input type="checkbox" class="childCheckBox"  name="option_type_'.$i.'[]" />'.$q.'<br />';
			}
			echo "</fieldset>";
			echo "</div>";*/
			#echo "<fieldset>";
			$div = "<div".$i.">";
			echo '<div id="div'.$i.'"" style="display:visible" >'; 
			foreach ($v as $p => $q) {
				echo "<fieldset>";
				echo '<input type="checkbox" class="parentCheckBox" name="sub_type_'.$i.'" />'.$p.'<br />';
				#echo "</fieldset>";
				$j=1;	
				foreach ($q as $m => $n) {
					echo '<input type="checkbox" class="childCheckBox"  name="option_type_'.$j.'[]" />'.$n.'<br />';
					$j++;
				}	
				
				echo "</fieldset>";
			}
			echo '</div>'; 	
			#echo "</fieldset>";
			$i++;
		}	
		#echo "</fieldset>";
	?>
																</div>	
															</div> 
														</div>
													</div>
													<!--/span-->
												</div>
												
												
												<h3 class="form-section alert alert-info">Other Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vessel Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id='vessel_name' name="vessel_name">
																<span for="vessel_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Voyage No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id='voyage_no' name="voyage_no">
																<span for="voyage_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--row -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo Group</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="cargo_group" id="cargo_group">
																	<!--<option value=""></option>-->
																	<?php
													                $cargo_group = $this->data['cargogroup'];

													                foreach($cargo_group as $cargogroup){ 
													                	echo '<option value='.$cargogroup["id"].'>'.$cargogroup["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="cargo_group" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  id="cargo" name="cargo">
																<span for="cargo" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Packing</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="packing" id="packing">
																	<!--<option value=""></option>-->
																	<?php
													                $packing_master = $this->data['packing'];
													                
													                foreach($packing_master as $packing){ 
													                	echo '<option value='.$packing["id"].'>'.$packing["paking_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="packing" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Packing Desc</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="packing_desc" name="packing_desc">
																<span for="packing_desc" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Approx.Qty/Unit</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" id="approx_unit" name="approx_unit"></label>
																	<label class="checkbox-inline">
																	<select class="form-control" id="approx_unit_name" name="approx_unit_name">
																	<option value="">Select</option>
																	<option>KG</option>
																	<option>LTRS</option>
																	<option>MMT</option>
																	<option>MT</option>
																	<option>NOS</option>
																	</select>
																	</label>
																</div>
																<span for="approx_unit" class="help-block"></span>
															</div>
															
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice By</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="invoice_by" id="invoice_by">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="invoice_by" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Instructions</label>
															<div class="col-md-9">
																<select class="form-control" id="file_ins" name="file_ins">
																	<option>Thirdparty Inspection<option>
																	<option>Weight and Quality Supervision</option>
																</select>
																<span for="file_ins" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Status</label>
															<div class="col-md-9">
																<select class="form-control" id="status" name="status">
																	<option>Pending</option>
																	<option>Running</option>
																	<option>Processing</option>
																	<option>Closed</option>
																</select>
																<span for="status" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Place Of Attendance</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="attendance" name="attendance">
																<span for="attendance" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Origin</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="origin" name="origin">
																<span for="origin" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Load Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="load_port" name="load_port">
																<span for="load_port" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Discharge Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  id="discharge_port" name="discharge_port">
																<span for="discharge_port" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<h3 class="form-section alert alert-info">Upload Documents</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="file" id='upl_nomination' name="upl_nomination">
																<span>*Only pdf,doc,xls accepted</span>
																</div>
																<span for="upl_nomination" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate Confirmation</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="file" id='upl_rate' name="upl_rate">
																<span>*Only pdf,doc,xls accepted</span>
																</div>
																<span for="upl_rate" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
															<a href="<?php echo BASE_PATH; ?>viewclientinteraction"><button type="button" class="btn default">Cancel</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
								
								
								
									
								</div>
							</div>
							
							
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->


