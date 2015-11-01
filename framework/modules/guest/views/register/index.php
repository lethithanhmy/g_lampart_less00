<!-- Module : guest ; Controller : register ; Action : index ; -->         
                
                <!-- START ALERTS --> 
					<div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Alerts</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
										<div class="alert alert-default alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>
				<!-- END ALERTS -->
				
				       <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Registration Form</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">

                                    <form id="general_validate" action="javascript:;" novalidate="novalidate">

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <div class="form-group">
                                                <label class="form-label" for="formfield1">Fullname</label>
                                                <span class="desc">e.g. "Tran Van A"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="fullname" name="formfield1" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="formfield1">Username</label>
                                                <span class="desc">e.g. "tranvana"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="username" name="formfield1" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield2">Email</label>
                                                <span class="desc">e.g. "some@example.com"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="email" name="formfield2" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield8">Password</label>
                                                <span class="desc">e.g. "hello123"</span>
                                                <div class="controls">
                                                    <input type="password" class="form-control" id="password" name="formfield8" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield9">Confirm Password</label>
                                                <span class="desc">e.g. "hello123"</span>
                                                <div class="controls">
                                                    <input type="password" class="form-control" id="confirmpassword" name="formfield9" >
                                                </div>
                                            </div>



                                            
                                            <div class="form-group">
                                                <label class="form-label">Sex</label>
                                                <div class="controls">
                                                	<div class="col-md-4" style="padding-left: 50px;">
                                                    	<input type="radio" name="sex" value="male" checked>Male
													</div>
													<div class="col-md-4">
														<input type="radio" name="sex" value="female">Female
													</div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- right -->
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                           <div class="form-group">
                                                <label class="form-label" for="formfield1">Address</label>
                                                <span class="desc">e.g. "123 abc"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="fullname" name="formfield1" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="formfield5">Birthday</label>
                                                <span class="desc">e.g. "3423"</span>
                                                <div class="controls">
                                                    <select class="form-control m-bot15" style="width: 32%; display: inline; margin-right: 6px; ">
			                                            <option>Option 1</option>
			                                            <option>Option 2</option>
			                                            <option>Option 3</option>
			                                        </select>
			                                        <select class="form-control m-bot15" style="width: 32%; display: inline; margin-right: 6px;">
			                                            <option>Option 1</option>
			                                            <option>Option 2</option>
			                                            <option>Option 3</option>
			                                        </select>
			                                        <select class="form-control m-bot15" style="width: 32%; display: inline; ">
			                                            <option>Option 1</option>
			                                            <option>Option 2</option>
			                                            <option>Option 3</option>
			                                        </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield6">Security check</label>
                                                <span class="desc">e.g. "minimum 3 characters"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield6" name="formfield6" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="">Text in the box</label>
                                                <span class="desc"></span>
                                                <div class="controls input-group">
                                                    <input type="text" class="form-control" id="" name="" >
                                                    <span class="input-group-addon">
		                                                <span class="arrow"></span>
		                                                <i class="fa fa-refresh"></i>     
                                            		</span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right ">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>



                                    </form>




                                </div>
                            </div>
                        </section></div>