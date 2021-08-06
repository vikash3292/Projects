    @extends('layouts.superadmin_layout')
   @section('content')

    

 
         <!-- Start content -->
         <form method="post" action="{{!empty($editmenu)?'/updatemunu':'/insertmenu'}}">
         <div class="content p-0">
            <div class="container-fluid">
               <div class="page-title-box">
                  <div class="row align-items-center bredcrum-style">
                     <div class="col-sm-6">
                      @if(!empty($editmenu))
                        <h3 class="page-title">Edit Menu</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">GRC</a></li>
                           <li class="breadcrumb-item active"><a href="#" >Edit Menu</a></li>
                        </ol>
                        @else

                        <h3 class="page-title">Add Menu</h3>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{URL::to('/')}}">GRC</a></li>
                           <li class="breadcrumb-item active"><a href="#" >Add Menu</a></li>
                        </ol>


                        @endif
                     </div>
                     <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                           <div class="dropdown">
                              <a href="menu_list.html">
                                 <a onclick="window.history.go(-1)" class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light"
                                    type="button">
                                    Back</a>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">

                     @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                     @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

                      <div class="card m-t-20">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empcode" class="col-lg-4 col-form-label">Menu Title</label>
                                    <div class="col-lg-8">
                                       <input type="text" maxlength="30" value="{{$editmenu->menu_title??''}}" name="menu_title" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empid" class="col-lg-4 col-form-label">URL</label>
                                    <div class="col-lg-8">
                                       <input type="text" maxlength="60" value="{{$editmenu->url??''}}" name="url" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>

                            {{ csrf_field() }}
                           <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="empid" class="col-lg-4 col-form-label">Icons</label>
                                    <div class="col-lg-8">
                                       <input type="text" maxlength="120" value="{{$editmenu->icon??''}}" name="icons" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <?php

                              $parrentmenu = DB::table('site_menu')->get();
                              ?>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="logo" class="col-lg-4 col-form-label">Parent</label>
                                    <div class="col-lg-8">
                                       <div class="form-group">
                                          <select class="form-control" name="parentid">

                                             <option value="">Select Parent</option>
                                             @foreach($parrentmenu  as   $parrentmenus)
                                    <option value="{{$parrentmenus->id}}" @if(!empty($editmenu->parent_menu_id)) @if($parrentmenus->id == $editmenu->parent_menu_id) selected  @endif  @endif>{{$parrentmenus->menu_title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                              <?php

                                 $role = DB::table('main_roles')->where('isactive','=',1)->get();
                                             
                                ?>
                           <div class="row">
                 

                              <input type="hidden" name="edit_menu_id" value="{{$editmenu->id??''}}">
                              <?php
                              
                              $count = DB::table('site_menu')->where('is_active',1)->count();
                              
                              ?>
                               <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="logo" class="col-lg-4 col-form-label">Sort</label>
                                    <div class="col-lg-8">
                                       <div class="form-group">
                                          <select class="form-control" name="sort">
                                            
                                              <?
                                               for($i=0;$i<$count;$i++){
                                              ?>
                                             <option value="{{$i}}" @if(!empty($editmenu)) @if($editmenu->sort == $i) selected @endif @endif>{{$i}}</option>
                                             <?php } ?>
                                              
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                                     <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="logo" class="col-lg-4 col-form-label">Status</label>
                                    <div class="col-lg-8">
                                       <div class="form-group">
                                          <select class="form-control" name="status">
                                             <option value="">Select Status</option>
                                              <option value="1"  @if(!empty($editmenu)) @if($editmenu->is_active == 1) selected @endif @endif >Active</option>
                                              <option value="2" @if(!empty($editmenu)) @if($editmenu->is_active == 2) selected @endif @endif >InActive</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                            
                           </div>
                       
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <div class="col-lg-12">
                                       <div class=" float-right">
                                          <button type="submit" class="btn btn-primary">Save</button>
                                          <button type="reset" class="btn btn-default">Cancel</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- container-fluid -->
         </div>
      </form>
         <!-- content -->
           @stop