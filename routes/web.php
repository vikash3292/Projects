<?php



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



Route::get('/', function () {

     return redirect('/admin');

});





// Admin Routes //



Route::get('/clear-cache', function() {

    Artisan::call('cache:clear');

    return "Cache is cleared";

});

Route::get('/clear-config', function() {

    Artisan::call('config:clear');

    return "config is cleared";

});



 // Password Reset Routes...



// Route::get('/forget', function () {

//     return view('admin.forget');

// });

 Route::get('/cronaddmonthleave', 'EmpController@add_month_leave');

Route::get('/cron_hourly_peding_leave_remainder', 'EmpController@cron_hourly_peding_leave_remainder');


// End Admin Routes //

Auth::routes();

Route::match(['get', 'post'], '/admin','MainusersController@users_login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cron', 'MenuController@getControllerAction');


  //Route::get('/cronyealyappraisaladd', 'AppraisalController@cronyealyappraisaladd');

  

    //Route::get('/addyearlyleave', 'EmpController@addyearlyleave');





    Route::get('/forget', 'MainusersController@showLinkRequestForm');

    Route::post('/sendlink', 'MainusersController@sendResetLinkEmail');

    Route::get('/password/reset/{token}', 'MainusersController@showResetForm')->name('password.reset.token');

    Route::post('/password/reset', 'MainusersController@resetform');



    // employees section



    Route::group(['middleware' => 'guest'], function () {



      Route::match(['get', 'post'], '/add-employees','MainusersController@add_employees');

    Route::get('/dashboard', 'MainusersController@dashboardview');

    Route::match(['get', 'post'], '/employees','MainusersController@employees');



    Route::post('/addemp', 'EmpController@addEmp');

    Route::match(['get', 'post'], '/edit/addsalary/{id}','EmpController@addsalary');

    Route::match(['get', 'post'], '/edit/addPersonalInfo/{id}','EmpController@addpersaninfo');

     Route::match(['get', 'post'], '/edit/addcontact/{id}','EmpController@addcontact');

      Route::match(['get', 'post'], '/edit/addexperiance/{id}','EmpController@addexperiance');

        Route::match(['get', 'post'], '/edit/addeducation/{id}','EmpController@addeducation');

          Route::match(['get', 'post'], '/edit/addtraining/{id}','EmpController@addtraining');

            Route::match(['get', 'post'], '/edit/addvisa/{id}','EmpController@addvisa');

                Route::match(['get', 'post'], '/edit/addassetes/{id}','EmpController@addassetes');





         Route::get('/delete/{id}','EmpController@deleteemp');

         Route::get('/emp/edit/{id}','EmpController@editemp');

        Route::get('/edit/add-employees/{id}','EmpController@editemp');

        Route::post('/insetsalary', 'EmpController@insetsalary');

        Route::post('/insetpersanalinfo', 'EmpController@insetpersanalinfo');
         Route::post('/get_edu_data', 'EmpController@get_edu_data');

        

        Route::post('/getstate', 'EmpController@getstate');

        Route::post('/getcity', 'EmpController@getcity');

        Route::post('/insertcontact', 'EmpController@insertcontact');

         Route::post('/insertexp', 'EmpController@insertexp');

         Route::post('/delexp', 'EmpController@delexp');

          Route::post('/insertedu', 'EmpController@insertedu');

           Route::post('/delete_education', 'EmpController@delete_education');

            Route::post('/inserttraning', 'EmpController@inserttraning');

              Route::post('/deltraining', 'EmpController@deltraining');

                Route::post('/insertvisa', 'EmpController@insertvisa');

                  Route::post('/delvisa', 'EmpController@delvisa');

                    Route::post('/insertassest', 'EmpController@insertassest');

                      Route::post('/delassest', 'EmpController@delassest');

                       Route::post('/updatefiletraining', 'EmpController@updatefiletraining');

                        Route::post('/getreportingmanager', 'EmpController@getreportingmanager');

                        Route::post('/getcourse', 'EmpController@getcourse');

                         Route::post('/uploadusercsv', 'EmpController@uploadusercsv');
                          Route::post('/get_trainig_data', 'EmpController@get_trainig_data');

           
           

                      // profile

                      Route::post('/updateprofile', 'EmpController@updateprofile');

                       Route::post('/changepassord', 'EmpController@changepassord');

                        Route::post('/changethemes', 'EmpController@changethemes');

                         Route::get('/appyleave', 'EmpController@appyleave');

                         Route::get('/leavelist', 'EmpController@leavelist');

                          Route::get('/exportcsv', 'EmpController@exportcsv');

                          Route::post('/exportcsvmonth', 'EmpController@exportcsvmonth');

                          Route::post('/checkdate', 'EmpController@checkdateleave');

                          

                          Route::get('/leavereport', 'EmpController@leavereport');

                        

                          Route::post('/addappyleave', 'EmpController@addappyleave');

                          Route::post('/aproveleave', 'EmpController@aproveleave');

                          Route::post('/cancelleave', 'EmpController@cancelleave');

                          Route::post('/leave-type', 'EmpController@leavetype');
                          Route::post('/update_pl', 'EmpController@update_pl');
                          Route::post('/update_cl', 'EmpController@update_cl');








                         



  /****************Department management Route**************************/



  Route::get('/mainsetting','DepartmentController@mainsetting');

  Route::post('/updatecompany','DepartmentController@updatecompany');







/****************Department management Route**************************/

Route::get('/departmentManagement', 'DepartmentController@department_mngmnt');

Route::match(['get', 'post'], '/departmentManagement/addDepartment','DepartmentController@add_department');

Route::get('/departmentManagement/editDepartment/{id}','DepartmentController@edit_department');

Route::post('/update_department', 'DepartmentController@update_department');

Route::get('/departmentManagement/deleteDepartment/{id}','DepartmentController@delete_department');



/****************Role management Route**************************/

Route::get('/roleManagement', 'DepartmentController@role_mngmnt');

Route::match(['get', 'post'], '/roleManagement/addRole','DepartmentController@add_role');

Route::get('/roleManagement/editRole/{id}','DepartmentController@edit_role');

Route::match(['get', 'post'],'/update_role', 'DepartmentController@update_role');

Route::get('/roleManagement/deleteRole/{id}','DepartmentController@delete_role');

Route::get('/allpermissionmodual/{id}','DepartmentController@allpermissionmodualroll');





/****************holiday management Route**************************/

Route::get('/holidayManagement', 'HolidayController@holiday_mngmnt');

Route::match(['get', 'post'], '/holidayManagement/addHoliday','HolidayController@add_holiday');

Route::get('/holidayManagement/editHoliday/{id}','HolidayController@edit_holiday');

Route::match(['get', 'post'],'/update_holiday', 'HolidayController@update_holiday');

Route::get('/holidayManagement/deleteHoliday/{id}','HolidayController@delete_holiday');





/****************Menu  Route**************************/  

Route::get('/menuManagement', 'MenuController@menu_mngmnt');

Route::post('/insertmenu', 'MenuController@insertmenu_mngmnt');

Route::get('/menulist', 'MenuController@menulist_mngmnt');

Route::get('/deletemunu/{id}', 'MenuController@menulist_delete');

Route::get('/editmunu/{id}', 'MenuController@menulist_edit');

Route::post('/updatemunu', 'MenuController@menulist_update');


Route::post('/changestatus', 'MenuController@changestatus');

Route::get('edit/myprofile/{id?}', 'MenuController@myprofile');



/****************EMP  Hiring**************************/  



Route::get('/vacancylist', 'HiringController@vacancylist_mangment');

Route::post('/addvacancy', 'HiringController@addvacancy_mangment');

Route::get('/addnewrequest', 'HiringController@addnewrequest');

Route::get('/recruitmenttracker', 'HiringController@recruitmenttracker');

Route::post('/addreqruitment', 'HiringController@addreqruitment');



Route::get('/view-requisition/{id}', 'HiringController@view_requisition');


Route::get('/edit-requisition/{id}', 'HiringController@edit_requisition');
Route::get('/delete-requisition/{id}', 'HiringController@delete_requisition');
Route::get('/downoload-requisition/{id}', 'HiringController@download_requisition');







/****************Role and Permission**************************/  

Route::post('/ajexinsertpermission', 'PermissionController@ajexinsertpermission');

Route::post('/deleletepermission', 'PermissionController@deleletepermission');

Route::post('/ajexinsertpermissioncontroller', 'PermissionController@ajexinsertpermissioncontroller');

Route::post('/ajexinsertpermissioncontrollerdelete', 'PermissionController@ajexinsertpermissioncontrollerdelete');





/****************Appraisal**************************/  



Route::get('/appraisallist', 'AppraisalController@appraisal_list');

Route::get('/appraisalfillform/{id}', 'AppraisalController@appraisal_fill_form');

Route::get('/userappraisallist', 'AppraisalController@user_appraisal_list');

Route::post('/sendappraisalemail', 'AppraisalController@sendappraisalemail');

Route::post('/addappraisalform', 'AppraisalController@addappraisalform');





/****************Attendance**************************/  

/****************Attendance**************************/  



Route::get('/attandancecorrection', 'AttendanceController@attandance_correction');

Route::match(['get', 'post'],'/attandaninfo', 'AttendanceController@attandance_info');

Route::post('/get_attendace', 'AttendanceController@get_attendace');

Route::post('/update_attendace', 'AttendanceController@update_attendace');

Route::post('/searchemp', 'AttendanceController@searchemp');

Route::get('/attendenceapproved', 'AttendanceController@attendence_approved');

Route::post('/approve_attendace', 'AttendanceController@approve_attendace');

Route::post('/reject_attendace', 'AttendanceController@reject_attendace');

Route::post('/uploadattadancecsv', 'AttendanceController@upload_attadance_csv');



Route::get('//manual-attendance', 'AttendanceController@munualattedance');

Route::post('/manual_attendace', 'AttendanceController@manual_attendace');

Route::post('/attendancestatus', 'AttendanceController@attendance_status');

Route::get('/emp-sallary', 'AttendanceController@emp_sallary');

Route::post('/ns_request', 'AttendanceController@ns_request');
Route::post('/ns_approvel', 'AttendanceController@ns_approvel');
Route::post('/ns-aproval-status', 'AttendanceController@ns_aproval_status');
Route::post('/export-attdendance', 'AttendanceController@export_attdendance');
Route::post('/update_pl', 'AttendanceController@update_pl');
Route::post('/update_cl', 'AttendanceController@update_cl');



/***********



/****************Notification**************************/ 
  
   Route::post('/sendnotification', 'MainusersController@sendnotification');
      Route::post('/shownotification', 'MainusersController@shownotification');
        Route::post('/leavestatus', 'MainusersController@leave_status');



       

/****************Project**************************/ 



  Route::get('/project-list', 'PmController@project_list');

  Route::get('/project-view/{id}', 'PmController@project_view');

   Route::get('/new-project', 'PmController@new_project');

    Route::get('/edit-project/{id}', 'PmController@edit_project_task');

    Route::get('/ajexpagination', 'PmController@ajexpagination');

   Route::post('/add_new_project', 'PmController@add_new_project');

   Route::post('/add_client_project', 'PmController@addclientproject');

   Route::post('/add_task', 'PmController@add_task');

      Route::post('/delete_task', 'PmController@delete_task');

     Route::post('/assign_task_users', 'PmController@assign_task_users');

   Route::post('/update_task', 'PmController@update_task');

    Route::post('/search_user_name', 'PmController@search_user_name');

     Route::post('/update_stage', 'PmController@update_stage');

     Route::post('/remove_assign_task', 'PmController@remove_assign_task');
     Route::post('/update_file_name', 'PmController@update_file_name');

     
     

   

   

   

     Route::post('/assign_project_users', 'PmController@assign_project_users');

          Route::post('/assign_task_in_user', 'PmController@assign_task_in_user');

          

            Route::post('/delete_project_user', 'PmController@delete_project_user');

              Route::post('/assign_task', 'PmController@assign_task');

              

                Route::post('/assign_more_task_inuser', 'PmController@assign_more_task_inuser');

                  Route::post('/assign_task_more_user', 'PmController@assign_task_more_user');

                  

                    Route::post('/assign_task_view', 'PmController@assign_task_view');

                     Route::post('/resource_user', 'PmController@resource_user');
                     Route::post('/all_milstone', 'PmController@all_milstone');

                      Route::post('/delete_milstone', 'PmController@delete_milstone');
                      Route::post('/add_milstone', 'PmController@add_milstone');
                       Route::post('/edit_milstone', 'PmController@edit_milstone');
                         Route::post('/get_milstone_date', 'PmController@get_milstone_date');
                         
                        Route::post('/upload_file_folder', 'PmController@upload_file_folder');
                            
                        Route::post('/all_files_project', 'PmController@all_files_project');
                          Route::post('/upload_form_project_file', 'PmController@upload_form_project_file');
                           Route::get('/form-history/{id}', 'PmController@form_history');
                      Route::post('/get_coordinator', 'PmController@get_coordinator');
                      Route::post('/add_comnication', 'PmController@add_comnication');
                           
                      
                    

                    /****************Timesheet**************************/ 

   

   

   //  Route::get('/timesheet', 'TimesheetController@timesheetview');

       Route::get('/timesheet/{monthYear?}/{currentweek?}/{totalweek?}/{time?}', 'TimesheetController@timesheetpreview');

       

        Route::get('/user-timesheet/{monthYear?}/{currentweek?}/{totalweek?}/{time?}', 'TimesheetController@user_timesheet');

           Route::get('/emp-timesheet/{monthYear?}/{currentweek?}/{totalweek?}/{time?}', 'TimesheetController@emp_timesheet');

  

     Route::get('/report/{monthYear?}/{currentweek?}/{totalweek?}/{time?}', 'ReportController@reportview');

     Route::post('/hourdefinproject', 'TimesheetController@hour_defin_project');

      Route::post('/enternote', 'TimesheetController@enternote');

      Route::post('/enterfilluseproject', 'TimesheetController@enter_fill_user_project');

       Route::post('/getweektimsheet', 'TimesheetController@get_week_timsheet');

        Route::post('/approvestatus', 'TimesheetController@approve_status');

          Route::post('/rejectstatus', 'TimesheetController@reject_status');

     

             Route::post('/searchReport', 'ReportController@searchReport');

             

              Route::get('/manager-report/{monthYear?}/{currentweek?}/{totalweek?}/{time?}', 'ReportController@manager_report');

              

                 Route::post('/search_timesheet_name', 'TimesheetController@search_timesheet_name');

                  Route::post('/search_report_name', 'ReportController@search_report_name');

                  Route::get('/view-emp-timesheet/{id}/{monthYear?}/{currentweek?}/{totalweek?}/{time?}', 'TimesheetController@view_emp_timesheet');

     

                  Route::post('/indiviable_Statua', 'TimesheetController@indiviable_Statua');



                  Route::match(['get', 'post'],'/export-timesheet', 'TimesheetController@export_timesheet');

   



/****************BD**************************/  







Route::get('/viewLeadList', 'BdController@viewLeadList');

Route::match(['get', 'post'],'/createLead', 'BdController@createLead');

Route::match(['get', 'post'],'/editLead/{id}', 'BdController@edit_Lead');

Route::get('/deletelead/{id}', 'BdController@deletelead');

Route::get('/viewLead/{id}', 'BdController@view_Lead');

;

Route::post('/insertlead', 'BdController@insertlead'); 



Route::post('/get_lead_logs', 'BdController@get_lead_logs'); 

Route::post('/save_lead_logs', 'BdController@save_lead_logs'); 

Route::post('/delete_lead_logs', 'BdController@delete_lead_logs'); 

Route::post('/edit_lead_logs', 'BdController@edit_lead_logs'); 

Route::post('/update_lead_status', 'BdController@update_lead_status'); 

Route::post('/convert_lead', 'BdController@convert_lead'); 





/****************Account**************************/  



Route::get('/account', 'AccountController@account');

Route::get('/add-account', 'AccountController@add_account');

Route::post('/insert_account', 'AccountController@insert_account');

Route::post('/get_account', 'AccountController@get_account');

Route::post('/delete_account_data', 'AccountController@delete_account_data');

Route::get('/view-account/{id}', 'AccountController@view_account');

Route::get('/edit-account/{id}', 'AccountController@edit_account');

Route::post('/delete_contact', 'AccountController@delete_contact');



/****************Opportunity**************************/  



Route::get('/opportunity', 'OpportunityController@list_opportunity');

Route::get('/add-opportunity', 'OpportunityController@add_opportunity');

Route::get('/view-opportunity/{id}', 'OpportunityController@view_opportunity');

Route::get('/edit-opportunity/{id}', 'OpportunityController@edit_opportunity');

Route::get('/sales-dashboard', 'OpportunityController@sales_dashboard');

Route::get('/delete-opportunity/{id}', 'OpportunityController@delete_opportunity');

Route::post('/insert-opp', 'OpportunityController@insert_opp');





/****************Contact**************************/  



Route::get('/contact', 'ContactController@contact_list');

Route::get('/add-contact', 'ContactController@add_contact');

Route::post('/insert-contact', 'ContactController@insert_contact');

Route::get('/edit-contact/{id}', 'ContactController@edit_contact');

Route::get('/view-contact/{id}', 'ContactController@view_contact');





/****************Setting**************************/  

Route::get('/file-manager', 'SettingController@file_manager');

  Route::post('/create_folder', 'SettingController@create_folder');
   Route::post('/rename_folder', 'SettingController@rename_folder');
    Route::get('/view_file/{id}', 'SettingController@view_file');
     Route::post('/all_files', 'SettingController@all_files');
     Route::post('/delete_files', 'SettingController@delete_files');
      Route::post('/upload_file_folder_withoud_project', 'SettingController@upload_file_folder_withoud_project');
     Route::post('/show_folder', 'SettingController@show_folder');

      Route::post('/all_form', 'SettingController@all_forms');
       Route::get('/bill-master', 'SettingController@bill_master');
         Route::get('/delete-bill-master/{id}', 'SettingController@delete_bill_master');
        Route::post('/add_bill_master', 'SettingController@add_bill_master');
        Route::post('/get_hod_list', 'SettingController@get_hod_list');
          Route::post('/add_checklist_master', 'SettingController@add_checklist_master');
   Route::get('/delete-checklist/{id}', 'SettingController@delete_checklist');
         Route::post('/get_checklist', 'SettingController@get_checklist');

         Route::get('/announcement','SettingController@announcement');
         Route::get('/delete-annoucement-master/{id}','SettingController@delete_annoucement_master');
         Route::post('/add_ann_master','SettingController@add_ann_master');
        
         
         
     

      
      Route::get('/forms', 'SettingController@forms');

       Route::post('/upload_file_form', 'SettingController@upload_file_form');
      Route::post('/delete_form', 'SettingController@delete_form');

      Route::get('/latter-history', 'SettingController@letter_managment');
      Route::get('/add-latter', 'SettingController@add_letter');
      Route::post('/save_letter', 'SettingController@save_letter');
      Route::get('/edit-latter/{id}', 'SettingController@edit_latter');
      
      Route::get('/quility-master', 'SettingController@quility_master');
      Route::get('/checklist-master', 'SettingController@checklist_master');

/****************Account Module**************************/  
      
// client Management
  Route::get('/client-management', 'AccountModuleController@client_management');
   Route::get('/add-client', 'AccountModuleController@add_client');
 Route::post('/get_account_client', 'AccountModuleController@get_account_client');
  Route::get('/edit-client/{id}', 'AccountModuleController@edit_account');
   Route::get('/edit-client/{id}', 'AccountModuleController@edit_client');
 Route::post('/edit_account_client', 'AccountModuleController@edit_account_client');

// work order
 Route::get('/work-order', 'AccountModuleController@work_order');
  Route::get('/add-work-order', 'AccountModuleController@add_work_order');
   Route::post('/work_order_add', 'AccountModuleController@work_order_add');
    Route::get('/edit-work-order/{id}', 'AccountModuleController@edit_work_order');
  Route::get('/view-work-order/{id}', 'AccountModuleController@view_work_order');
Route::get('/delete-work-order/{id}', 'AccountModuleController@delete_work_order');
Route::post('/add_milstone_work_order', 'AccountModuleController@add_milstone_work_order');
Route::post('/edit_milstone_work_order', 'AccountModuleController@edit_milstone_work_order');
Route::post('/all_milstone_work_order', 'AccountModuleController@all_milstone_work_order');
Route::post('/delete_milstone_work_order', 'AccountModuleController@delete_milstone_work_order');
Route::post('/get_last_work_order', 'AccountModuleController@get_last_work_order');
Route::post('/add_new_project_work_order', 'AccountModuleController@add_new_project_work_order');
Route::get('/scope-of-work', 'AccountModuleController@scope_of_work');
Route::get('/add_scope', 'AccountModuleController@add_scope');
Route::post('/insert_scope', 'AccountModuleController@insert_scope');
Route::get('/view_scope/{id}', 'AccountModuleController@view_scope');
Route::get('/edit_scope/{id}', 'AccountModuleController@edit_scope');
Route::get('/delete_scope/{id}', 'AccountModuleController@delete_scope');
Route::get('/expense', 'AccountModuleController@expense');
Route::get('/add-expense', 'AccountModuleController@add_expense');
Route::post('/all_trip', 'AccountModuleController@all_trip');
Route::post('/add_trip', 'AccountModuleController@add_trip');
Route::post('/insert_expeses', 'AccountModuleController@insert_expeses');
Route::post('/update_r_amt', 'AccountModuleController@update_r_amt');
Route::post('/update_status_expeses', 'AccountModuleController@update_status_expeses');
Route::get('/edit_expenses/{id}', 'AccountModuleController@edit_expenses');
Route::get('/view_expenses/{id}', 'AccountModuleController@view_expenses');
Route::post('/get_user_project', 'AccountModuleController@get_user_project');
Route::get('/delete_expenses/{id}', 'AccountModuleController@delete_expenses');
Route::post('/get_scope_text', 'AccountModuleController@get_scope_text');
Route::get('/download_scope/{id}', 'AccountModuleController@download_scope');



//letter master===
Route::get('/send-letter', 'AccountModuleController@send_letter');
Route::post('/get_letter', 'AccountModuleController@get_letter');
Route::post('/send_email', 'AccountModuleController@send_email');


/****************IT Module**************************/  
   
Route::get('/assets-list', 'ItController@assets_list');   
Route::post('/all_assets', 'ItController@all_assets');   
Route::post('/add_assets', 'ItController@add_assets'); 
Route::post('/edit_assets', 'ItController@edit_assets');  
Route::get('/download_assets', 'ItController@download_assets');
Route::post('/assign_assets', 'ItController@assign_assets');   
Route::post('/delete_assign_assets', 'ItController@delete_assign_assets');   
Route::post('/all_user_assets', 'ItController@all_user_assets');  
Route::post('/user_assign_assets', 'ItController@user_assign_assets');  
Route::get('/view-assets/{id}', 'ItController@view_assets');  
Route::get('/view-assign-user/{id}', 'ItController@view_assign_user');  
Route::post('/delete_assets', 'ItController@delete_assets');
Route::get('/download-asset/{id}', 'ItController@download_asset'); 
Route::get('/download-user-asset/{id}', 'ItController@download_user_asset'); 



// ticket------
Route::get('/ticket', 'ItController@ticket');   
Route::get('/ticket_view/{id}', 'ItController@ticket_view');
Route::post('/add_ticket', 'ItController@add_ticket');  
Route::post('/add_comment_ticket', 'ItController@add_comment_ticket');  
Route::post('/timeline', 'BdController@timeline');  



/****************Traing Module**************************/  
Route::get('/training-need-identification', 'TrainingController@training_need_identification');  
Route::get('/training-plan', 'TrainingController@training_plan'); 
Route::post('/get_all_training', 'TrainingController@get_all_training'); 
Route::post('/add_training', 'TrainingController@add_training'); 
Route::post('/delete_training', 'TrainingController@delete_training'); 
Route::post('/edit_training', 'TrainingController@edit_training'); 
Route::post('/add_training_plan', 'TrainingController@add_training_plan'); 
Route::get('/delete-training/{id}', 'TrainingController@delete_training_plan'); 
Route::post('/edit_traning_plan', 'TrainingController@edit_traning_plan'); 
Route::post('/edit_training_data', 'TrainingController@edit_training_data'); 
Route::post('/get_date_training', 'TrainingController@get_date_training'); 



/****************Admin Module**************************/ 


Route::post('/add_vendor', 'AdminController@add_vendor');



Route::get('/requisition', 'AdminController@requisition'); 
Route::get('/vendor-management', 'AdminController@vendor_management'); 
Route::get('/purchase-order', 'AdminController@purchase_order'); 
Route::get('/bill-payment', 'AdminController@bill_payment');
Route::post('/bill_payment_add', 'AdminController@bill_payment_add');
Route::get('/delete-bill/{id}', 'AdminController@delete_bill');
Route::post('/edit_bill', 'AdminController@edit_bill');
Route::get('/view-bill/{id}', 'AdminController@view_bill');
Route::post('/add_purchage_order', 'AdminController@add_purchage_order');
Route::post('/edit_purchage', 'AdminController@edit_purchage');
Route::get('/delete_purchage/{id}', 'AdminController@delete_purchage');
Route::get('/delete-venodor/{id}', 'AdminController@delete_venodor');


Route::post('/edit_vendor_data', 'AdminController@edit_vendor_data');
Route::post('/fetch_advance', 'AdminController@fetch_advance');
Route::post('/add_advance_requisation', 'AdminController@add_advance_requisation');
Route::post('/delete_advance', 'AdminController@delete_advance');
Route::get('/view_advance/{id}', 'AdminController@view_advance');
Route::post('/aproval_status', 'AdminController@aproval_status');
Route::get('/advance_pdf/{id}', 'AdminController@advance_pdf');
Route::post('/add_ta_da', 'AdminController@add_ta_da');
Route::post('/fetch_ta_da', 'AdminController@fetch_ta_da');
Route::get('/view_ta_da/{id}', 'AdminController@view_ta_da');
Route::get('/ta_da_pdf/{id}', 'AdminController@ta_da_pdf');
Route::post('/ta_da_status', 'AdminController@ta_da_status');













Route::get('/form-1', 'AdminController@form_1');
Route::get('/form-2', 'AdminController@form_2');
Route::get('/form-3', 'AdminController@form_3');
Route::get('/form-4', 'AdminController@form_4');
Route::get('/form-5', 'AdminController@form_5');


/****************Audit Module**************************/  

Route::get('/audit', 'AuditController@audit');
Route::get('/add-audit', 'AuditController@add_audit');
Route::get('/view-audit', 'AuditController@view_audit');
Route::post('/add_audit_data', 'AuditController@add_audit_data');

Route::get('/delete-audit/{id}', 'AuditController@delete_audit');
Route::get('/edit-audit/{id}', 'AuditController@edit_audit');
Route::post('/save_check_list_data', 'AuditController@save_check_list_data');


     });





    

    

