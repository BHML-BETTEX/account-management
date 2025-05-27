<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />

  <title>Dashboard</title>

  <link rel="shortcut icon" id="favicon" href="https://democrm.i2technologies.net/uploads/company/favicon.jpg">
  <link rel="apple-touch-icon”" id="favicon-apple-touch-icon" href="https://democrm.i2technologies.net/uploads/company/favicon.jpg">
  <link rel="stylesheet" type="text/css" id="reset-css" href="{{ asset('assets/css/custom.reset.min.css') }}">
  <link rel="stylesheet" type="text/css" id="roboto-css" href="{{ asset('assets/plugins/roboto/roboto.css') }}">
  <link rel="stylesheet" type="text/css" id="vendor-css" href="{{ asset('assets/builds/vendor-admin.css') }}">
  <link rel="stylesheet" type="text/css" id="app-css" href="{{ asset('assets/css/style.min.css') }}">
  <link rel="stylesheet" type="text/css" id="full-calendar-css" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}">
  <script>
    var site_url = "https://democrm.i2technologies.net/";
    var admin_url = "https://democrm.i2technologies.net/admin/";
    var app = {};
    var app = {};
    app.available_tags = ["tag1", "tag2"];
    app.available_tags_ids = ["1", "2"];
    app.user_recent_searches = [];
    app.months_json = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    app.tinymce_lang = "";
    app.locale = "en";
    app.browser = "chrome";
    app.user_language = "";
    app.is_mobile = "";
    app.user_is_staff_member = "1";
    app.user_is_admin = "1";
    app.max_php_ini_upload_size_bytes = "67108864";
    app.calendarIDs = "";
    app.options = {};
    app.lang = {};
    app.options.date_format = "Y-m-d";
    app.options.decimal_places = "2";
    app.options.scroll_responsive_tables = "0";
    app.options.company_is_required = "1";
    app.options.default_view_calendar = "month";
    app.options.calendar_events_limit = "4";
    app.options.tables_pagination_limit = "25";
    app.options.time_format = "24";
    app.options.decimal_separator = ".";
    app.options.thousand_separator = ",";
    app.options.timezone = "Asia/Dhaka";
    app.options.calendar_first_day = "0";
    app.options.allowed_files = ".png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt";
    app.options.desktop_notifications = "1";
    app.options.show_table_export_button = "to_all";
    app.options.has_permission_tasks_checklist_items_delete = "1";
    app.options.show_setup_menu_item_only_on_hover = "0";
    app.options.newsfeed_maximum_files_upload = "10";
    app.options.dismiss_desktop_not_after = "15";
    app.options.enable_google_picker = "1";
    app.options.google_client_id = "";
    app.options.google_api = "";
    app.options.has_permission_create_task = "1";
    app.lang.invoice_task_billable_timers_found = "Started timers found";
    app.lang.validation_extension_not_allowed = "File extension not allowed";
    app.lang.tag = "Tag";
    app.lang.options = "Options";
    app.lang.no_items_warning = "Enter at least one item.";
    app.lang.item_forgotten_in_preview = "Have you forgotten to add this item?";
    app.lang.new_notification = "New Notification!";
    app.lang.estimate_number_exists = "This estimate number exists for the ongoing year.";
    app.lang.invoice_number_exists = "This invoice number exists for the ongoing year.";
    app.lang.confirm_action_prompt = "Are you sure you want to perform this action?";
    app.lang.calendar_expand = "expand";
    app.lang.media_files = "Files";
    app.lang.credit_note_number_exists = "Credit note number already exists";
    app.lang.item_field_not_formatted = "The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here.";
    app.lang.email_exists = "Email already exists";
    app.lang.phonenumber_exists = "Phone number already exists";
    app.lang.website_exists = "Website already exists";
    app.lang.company_exists = "Company already exists";
    app.lang.filter_by = "Filter by";
    app.lang.you_can_not_upload_any_more_files = "You can not upload any more files";
    app.lang.cancel_upload = "Cancel Upload";
    app.lang.browser_not_support_drag_and_drop = "Your browser does not support drag'n'drop file uploads";
    app.lang.drop_files_here_to_upload = "Drop files here to upload";
    app.lang.file_exceeds_max_filesize = "The uploaded file exceeds the upload_max_filesize directive in php.ini (64 MB)";
    app.lang.file_exceeds_maxfile_size_in_form = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (64 MB)";
    app.lang.unit = "Unit";
    app.lang.dt_length_menu_all = "All";
    app.lang.dt_button_reload = "Reload";
    app.lang.dt_button_excel = "Excel";
    app.lang.dt_button_csv = "CSV";
    app.lang.dt_button_pdf = "PDF";
    app.lang.dt_button_print = "Print";
    app.lang.dt_button_export = "Export";
    app.lang.search_ajax_empty = "Select and begin typing";
    app.lang.search_ajax_initialized = "Start typing to search";
    app.lang.search_ajax_searching = "Searching...";
    app.lang.not_results_found = "No results found";
    app.lang.search_ajax_placeholder = "Type to search...";
    app.lang.currently_selected = "Currently Selected";
    app.lang.task_stop_timer = "Stop Timer";
    app.lang.dt_button_column_visibility = "Visibility";
    app.lang.note = "Note";
    app.lang.search_tasks = "Search Tasks";
    app.lang.confirm = "Confirm";
    app.lang.showing_billable_tasks_from_project = "Showing billable tasks from project";
    app.lang.invoice_task_item_project_tasks_not_included = "Projects tasks are not included in this list.";
    app.lang.credit_amount_bigger_then_invoice_balance = "Total credits amount is bigger then invoice balance due";
    app.lang.credit_amount_bigger_then_credit_note_remaining_credits = "Total credits amount is bigger then remaining credits";
    app.lang.save = "Save";
    app.lang.expense = "Expense of";
    app.lang.ticket = "Ticket";
    app.lang.lead = "Lead";
    app.lang.create_reminder = "Create Reminder";
    app.lang.datatables = {
      "emptyTable": "No entries found",
      "info": "Showing _START_ to _END_ of _TOTAL_ entries",
      "infoEmpty": "Showing 0 to 0 of 0 entries",
      "infoFiltered": "(filtered from _MAX_ total entries)",
      "lengthMenu": "_MENU_",
      "loadingRecords": "Loading...",
      "processing": "<div class=\"dt-loader\"><\/div>",
      "search": "<div class=\"input-group\"><span class=\"input-group-addon\"><span class=\"fa fa-search\"><\/span><\/span>",
      "searchPlaceholder": "Search...",
      "zeroRecords": "No matching records found",
      "paginate": {
        "first": "First",
        "last": "Last",
        "next": "Next",
        "previous": "Previous"
      },
      "aria": {
        "sortAscending": " activate to sort column ascending",
        "sortDescending": " activate to sort column descending"
      }
    };
    var app_language = "",
      app_is_mobile = "",
      app_user_browser = "chrome",
      app_date_format = "Y-m-d",
      app_decimal_places = "2",
      app_scroll_responsive_tables = "0",
      app_company_is_required = "1",
      app_default_view_calendar = "month",
      app_calendar_events_limit = "4",
      app_tables_pagination_limit = "25",
      app_time_format = "24",
      app_decimal_separator = ".",
      app_thousand_separator = ",",
      app_timezone = "Asia/Dhaka",
      app_calendar_first_day = "0",
      app_allowed_files = ".png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt",
      app_desktop_notifications = "1",
      max_php_ini_upload_size_bytes = "67108864",
      app_show_table_export_button = "to_all",
      calendarIDs = "",
      is_admin = "1",
      is_staff_member = "1",
      has_permission_tasks_checklist_items_delete = "1",
      app_show_setup_menu_item_only_on_hover = "0",
      app_newsfeed_maximum_files_upload = "10",
      app_dismiss_desktop_not_after = "15",
      app_enable_google_picker = "1",
      app_google_client_id = "",
      google_api = "";
    var appLang = {};
    appLang["invoice_task_billable_timers_found"] = "Started timers found";
    appLang["validation_extension_not_allowed"] = "File extension not allowed";
    appLang["tag"] = "Tag";
    appLang["options"] = "Options";
    appLang["no_items_warning"] = "Enter at least one item.";
    appLang["item_forgotten_in_preview"] = "Have you forgotten to add this item?";
    appLang["new_notification"] = "New Notification!";
    appLang["estimate_number_exists"] = "This estimate number exists for the ongoing year.";
    appLang["invoice_number_exists"] = "This invoice number exists for the ongoing year.";
    appLang["confirm_action_prompt"] = "Are you sure you want to perform this action?";
    appLang["calendar_expand"] = "expand";
    appLang["media_files"] = "Files";
    appLang["credit_note_number_exists"] = "Credit note number already exists";
    appLang["item_field_not_formatted"] = "The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here.";
    appLang["email_exists"] = "Email already exists";
    appLang["phonenumber_exists"] = "Phone number already exists";
    appLang["website_exists"] = "Website already exists";
    appLang["company_exists"] = "Company already exists";
    appLang["filter_by"] = "Filter by";
    appLang["you_can_not_upload_any_more_files"] = "You can not upload any more files";
    appLang["cancel_upload"] = "Cancel Upload";
    appLang["browser_not_support_drag_and_drop"] = "Your browser does not support drag'n'drop file uploads";
    appLang["drop_files_here_to_upload"] = "Drop files here to upload";
    appLang["file_exceeds_max_filesize"] = "The uploaded file exceeds the upload_max_filesize directive in php.ini (64 MB)";
    appLang["file_exceeds_maxfile_size_in_form"] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (64 MB)";
    appLang["unit"] = "Unit";
    appLang["dt_length_menu_all"] = "All";
    appLang["dt_button_reload"] = "Reload";
    appLang["dt_button_excel"] = "Excel";
    appLang["dt_button_csv"] = "CSV";
    appLang["dt_button_pdf"] = "PDF";
    appLang["dt_button_print"] = "Print";
    appLang["dt_button_export"] = "Export";
    appLang["search_ajax_empty"] = "Select and begin typing";
    appLang["search_ajax_initialized"] = "Start typing to search";
    appLang["search_ajax_searching"] = "Searching...";
    appLang["not_results_found"] = "No results found";
    appLang["search_ajax_placeholder"] = "Type to search...";
    appLang["currently_selected"] = "Currently Selected";
    appLang["task_stop_timer"] = "Stop Timer";
    appLang["dt_button_column_visibility"] = "Visibility";
    appLang["note"] = "Note";
    appLang["search_tasks"] = "Search Tasks";
    appLang["confirm"] = "Confirm";
    appLang["showing_billable_tasks_from_project"] = "Showing billable tasks from project";
    appLang["invoice_task_item_project_tasks_not_included"] = "Projects tasks are not included in this list.";
    appLang["credit_amount_bigger_then_invoice_balance"] = "Total credits amount is bigger then invoice balance due";
    appLang["credit_amount_bigger_then_credit_note_remaining_credits"] = "Total credits amount is bigger then remaining credits";
    appLang["save"] = "Save";
    appLang["expense"] = "Expense of";
    appLang["ticket"] = "Ticket";
    appLang["lead"] = "Lead";
    appLang["create_reminder"] = "Create Reminder";
  </script>
  <script>
    var totalUnreadNotifications = 0,
      proposalsTemplates = [],
      contractsTemplates = [],
      billingAndShippingFields = ['billing_street', 'billing_city', 'billing_state', 'billing_zip', 'billing_country', 'shipping_street', 'shipping_city', 'shipping_state', 'shipping_zip', 'shipping_country'],
      isRTL = 'false',
      taskid, taskTrackingStatsData, taskAttachmentDropzone, taskCommentAttachmentDropzone, newsFeedDropzone, expensePreviewDropzone, taskTrackingChart, cfh_popover_templates = {},
      _table_api;
  </script>
  <script>
    if (typeof(jQuery) === 'undefined' && !window.deferAfterjQueryLoaded) {
      window.deferAfterjQueryLoaded = [];
      Object.defineProperty(window, "$", {
        set: function(value) {
          window.setTimeout(function() {
            $.each(window.deferAfterjQueryLoaded, function(index, fn) {
              fn();
            });
          }, 0);
          Object.defineProperty(window, "$", {
            value: value
          });
        },
        configurable: true
      });
    }

    var csrfData = {
      "formatted": {
        "csrf_token_name": "788880cceb998a670d6afd3efcd3e4ff"
      },
      "token_name": "csrf_token_name",
      "hash": "788880cceb998a670d6afd3efcd3e4ff"
    };

    if (typeof(jQuery) == 'undefined') {
      window.deferAfterjQueryLoaded.push(function() {
        csrf_jquery_ajax_setup();
      });
      window.addEventListener('load', function() {
        csrf_jquery_ajax_setup();
      }, true);
    } else {
      csrf_jquery_ajax_setup();
    }

    function csrf_jquery_ajax_setup() {
      $.ajaxSetup({
        data: csrfData.formatted
      });

      $(document).ajaxError(function(event, request, settings) {
        if (request.status === 419) {
          alert_float('warning', 'Page expired, refresh the page make an action.')
        }
      });
    }
  </script>
  <script>
    var leadUniqueValidationFields = ["email"];
    var leadAttachmentsDropzone;
  </script>
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="app admin dashboard invoices-total-manual user-id-30 chrome">
  <div id="header">
    <div class="hide-menu"><i class="fa fa-align-left"></i></div>
    <div id="logo">
      <a href="" class="logo img-responsive">
        <img src="https://democrm.i2technologies.net/uploads/company/b20cab9d0ff145d884c70f2de81e77cc.jpg" class="img-responsive" alt="i2Technologies Limited">
      </a>
    </div>
    <nav>
      <div class="small-logo">
        <span class="text-primary">
          <a href="https://democrm.i2technologies.net/admin/" class="logo img-responsive">
            <img src="https://democrm.i2technologies.net/uploads/company/b20cab9d0ff145d884c70f2de81e77cc.jpg" class="img-responsive" alt="i2Technologies Limited">
          </a> </span>
      </div>
      <div class="mobile-menu">
        <button type="button" class="navbar-toggle visible-md visible-sm visible-xs mobile-menu-toggle collapsed" data-toggle="collapse" data-target="#mobile-collapse" aria-expanded="false">
          <i class="fa fa-chevron-down"></i>
        </button>
        <ul class="mobile-icon-menu">
        </ul>
        <div class="mobile-navbar collapse" id="mobile-collapse" aria-expanded="false" style="height: 0px;" role="navigation">
          <ul class="nav navbar-nav">
            <li class="header-my-profile"><a href="https://democrm.i2technologies.net/admin/profile">My Profile</a></li>
            <li class="header-my-timesheets"><a href="https://democrm.i2technologies.net/admin/staff/timesheets">My Timesheets</a></li>
            <li class="header-edit-profile"><a href="https://democrm.i2technologies.net/admin/staff/edit_profile">Edit Profile</a></li>
            <li class="header-newsfeed">
              <a href="#" class="open_newsfeed mobile">
                Share documents, ideas.. </a>
            </li>
            <li class="header-logout"><a href="#" onclick="logout(); return false;">Logout</a></li>
          </ul>
        </div>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="icon header-user-profile" data-toggle="tooltip" title="Admin Admin" data-placement="bottom">
          <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="false">
            <img src="https://democrm.i2technologies.net/assets/images/user-placeholder.jpg" class="img img-responsive staff-profile-image-small pull-left" /> </a>
        </li>
      </ul>
    </nav>
  </div>
  <div id="mobile-search" class="hide">
    <ul>
    </ul>
  </div>

  <aside id="menu" class="sidebar">
    <ul class="nav metis-menu" id="side-menu">
      <li class="dashboard_user">
        Welcome Admin<i class="fa fa-power-off top-left-logout pull-right" data-toggle="tooltip"></i>
      </li>
      <li class="quick-links">
        <div class="dropdown dropdown-quick-links">
          <a href="#" class="dropdown-toggle" id="dropdownQuickLinks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-gavel" aria-hidden="true"></i>
          </a>
        </div>
      </li>
      <li class="menu-item-dashboard">
        <a href=""
          aria-expanded="false">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-text">
            Dashboard</span>
        </a>
      </li>

      <!--Accounting-->
      <li class="menu-item-purchase">
        <a href="#"
          aria-expanded="false">
          <i class="fa fa-list-alt menu-icon"></i>
          <span class="menu-text">
            Accounting</span>
          <span class="fa arrow pleft5"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li class="sub-menu-item-vendors">
            <a href="{{route('chart_of_account')}}">
              <i class="fa fa-user-o menu-icon"></i>
              <span class="sub-menu-text">
                Chart Of Accounts</span>
            </a>
          </li>
          <li class="sub-menu-item-purchase-items">
            <a href="{{route('general_journal')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">Genaral Journal</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="{{route('adjustment_journal')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">Adjustment Journal</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="{{route('unposted_journal')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">Upnosted Journal</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="{{route('others_payment')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">Others Payment</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="{{route('credit_note')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">Credit Note Entry</span>
            </a>
          </li>

        </ul>
      </li>

      <!--Accounting-->
      <li class="menu-item-purchase">
        <a href="#"
          aria-expanded="false">
          <i class="fa fa-cogs menu-icon"></i>
          <span class="menu-text">
            Settings</span>
          <span class="fa arrow pleft5"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li class="sub-menu-item-vendors">
            <a href="{{route('posting_control')}}">
              <i class="fa fa-user-o menu-icon"></i>
              <span class="sub-menu-text">
                Postiong Control</span>
            </a>
          </li>
        </ul>
      </li>

      <!--Customer-->
      <li class="menu-item-purchase">
        <a href="#"
          aria-expanded="false">
          <i class="fa fa-user-o menu-icon"></i>
          <span class="menu-text">
            Customer</span>
          <span class="fa arrow pleft5"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li class="sub-menu-item-vendors">
            <a href="{{route('customer_list')}}">
              <i class="fa fa-user-o menu-icon"></i>
              <span class="sub-menu-text">
                Customer List</span>
            </a>
          </li>

        </ul>
      </li>

      <!--Vendor-->
      <li class="menu-item-purchase">
        <a href="#"
          aria-expanded="false">
          <i class="fa fa-user-o menu-icon"></i>
          <span class="menu-text">
            Vendor</span>
          <span class="fa arrow pleft5"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li class="sub-menu-item-vendors">
            <a href="{{route('vendor_list')}}">
              <i class="fa fa-user-o menu-icon"></i>
              <span class="sub-menu-text">
                Vendor List</span>
            </a>
          </li>

        </ul>
      </li>

      <!--Reference-->
      <li class="menu-item-purchase">
        <a href="#"
          aria-expanded="false">
          <i class="fa fa-shopping-cart menu-icon"></i>
          <span class="menu-text">
            Refarence </span>
          <span class="fa arrow pleft5"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li class="sub-menu-item-purchase-items">
            <a href="{{route('acc_category')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Account Category</span>
            </a>
          </li>

          <li class="sub-menu-item-vendors">
            <a href="{{route('acc_control')}}">
              <i class="fa fa-user-o menu-icon"></i>
              <span class="sub-menu-text">
                Account Control </span>
            </a>
          </li>
          <li class="sub-menu-item-purchase-items">
            <a href="{{route('acc_type')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Account Type </span>
            </a>
          </li>
          <li class="sub-menu-item-purchase-items">
            <a href="{{route('main_head')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Main Head </span>
            </a>
          </li>

        </ul>
      </li>

      <li class="menu-item-purchase">
        <a href="#"
          aria-expanded="false">
          <i class="fa fa-area-chart menu-icon"></i>
          <span class="menu-text">
            Reports </span>
          <span class="fa arrow pleft5"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false">
          <li class="sub-menu-item-purchase-items">
            <a href="{{route('generalladger')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                General Ladger</span>
            </a>
          </li>

          <li class="sub-menu-item-vendors">
            <a href="{{route('cashbook')}}">
              <i class="fa fa-user-o menu-icon"></i>
              <span class="sub-menu-text">
                Cash Book</span>
            </a>
          </li>
          <li class="sub-menu-item-purchase-items">
            <a href="{{route('bankbook')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Bank Book</span>
            </a>
          </li>
          <li class="sub-menu-item-purchase-items">
            <a href="">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Trail Balance</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="{{route('profit_loss')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Profite & Loss Accounts</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="{{route('balance_sheet')}}">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Balance Sheet</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Customer Ladger</span>
            </a>
          </li>

          <li class="sub-menu-item-purchase-items">
            <a href="">
              <i class="fa fa-clone menu-icon menu-icon"></i>
              <span class="sub-menu-text">
                Vendor Ladger</span>
            </a>
          </li>

        </ul>
      </li>

    </ul>
  </aside>
  <div id="wrapper">
    <div class="screen-options-area"></div>
    <div class="content">
      <div class="row">
        <div class="clearfix"></div>

        <div class="col-md-12">
          <div class="widget relative" id="widget-top_stats" data-name="Quick Statistics">
            <div class="row">
              @yield('content')
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <script>
    app.calendarIDs = '[]';
  </script>
  <!-- Likes -->
  <div class="modal likes_modal fade" id="modal_post_likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Colleagues who like this post</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div id="modal_post_likes_wrapper">
            </div>

          </div>

        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-info load_more_post_likes">Load More</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Likes -->
  <div class="modal likes_modal animated fadeIn" id="modal_post_comment_likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Colleagues who like this comment</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div id="modal_comment_likes_wrapper">

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-info load_more_post_comment_likes">Load More</a>
        </div>
      </div>
    </div>
  </div>
  <div id="event"></div>
  <div id="newsfeed" class="animated fadeIn hide">
  </div>
  <!-- Task modal view -->
  <div class="modal fade task-modal-single" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content data">

      </div>
    </div>
  </div>

  <!--Add/edit task modal-->
  <div id="_task"></div>

  <!-- Lead Data Add/Edit-->
  <div class="modal fade lead-modal" id="lead-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content data">

      </div>
    </div>
  </div>

  <div id="timers-logout-template-warning" class="hide">
    <h2 class="bold">Started tasks timers found!<br />Are you sure you want to logout without stopping the timers?</h2>
    <hr />
    <a href="https://democrm.i2technologies.net/admin/authentication/logout" class="btn btn-danger">Logout</a>
  </div>

  <!--Lead convert to customer modal-->
  <div id="lead_convert_to_customer"></div>

  <!--Lead reminder modal-->
  <div id="lead_reminder_modal"></div>


  <script type="text/javascript" id="vendor-js" src="{{ asset('assets/builds/vendor-admin.js') }}"></script>
  <script type="text/javascript" id="jquery-migrate-js" src="{{ asset('assets/plugins/jquery/jquery-migrate.min.js') }}"></script>
  <script type="text/javascript" id="datatables-js" src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
  <script type="text/javascript" id="moment-js" src="{{ asset('assets/builds/moment.min.js') }}"></script>
  <script type="text/javascript" id="bootstrap-select-js" src="{{ asset('assets/builds/bootstrap-select.min.js') }}"></script>
  <script type="text/javascript" id="tinymce-js" src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript" id="jquery-validation-js" src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script type="text/javascript" id="pusher-js" src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script type="text/javascript" id="google-js" src="https://apis.google.com/js/api.js?onload=onGoogleApiLoad" defer></script>
  <script type="text/javascript" id="common-js" src="{{ asset('assets/builds/common.js') }}"></script>
  <script type="text/javascript" id="app-js" src="{{ asset('assets/js/main.min.js') }}"></script>
  <script type="text/javascript" id="full-calendar-js" src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
  <script>
    function custom_fields_hyperlink() {
      var cf_hyperlink = $('body').find('.cf-hyperlink');
      if (cf_hyperlink.length) {
        $.each(cf_hyperlink, function() {
          var cfh_wrapper = $(this);
          var cfh_field_to = cfh_wrapper.attr('data-fieldto');
          var cfh_field_id = cfh_wrapper.attr('data-field-id');
          var textEl = $('body').find('#custom_fields_' + cfh_field_to + '_' + cfh_field_id + '_popover');
          var hiddenField = $("#custom_fields\\\[" + cfh_field_to + "\\\]\\\[" + cfh_field_id + "\\\]");
          var cfh_value = cfh_wrapper.attr('data-value');
          hiddenField.val(cfh_value);

          if ($(hiddenField.val()).html() != '') {
            textEl.html($(hiddenField.val()).html());
          }
          var cfh_field_name = cfh_wrapper.attr('data-field-name');
          textEl.popover({
            html: true,
            trigger: "manual",
            placement: "top",
            title: cfh_field_name,
            content: function() {
              return $(cfh_popover_templates[cfh_field_id]).html();
            }
          }).on("click", function(e) {
            var $popup = $(this);
            $popup.popover("toggle");
            var titleField = $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_title");
            var urlField = $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_link");
            var ttl = $(hiddenField.val()).html();
            var cfUrl = $(hiddenField.val()).attr("href");
            if (cfUrl) {
              $('#cf_hyperlink_open_' + cfh_field_id).attr('href', (cfUrl.indexOf('://') === -1 ? 'http://' + cfUrl : cfUrl));
            }
            titleField.val(ttl);
            urlField.val(cfUrl);
            $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_btn-save").click(function() {
              hiddenField.val((urlField.val() != '' ? '<a href="' + urlField.val() + '" target="_blank">' + titleField.val() + '</a>' : ''));
              textEl.html(titleField.val() == "" ? "Click here to add link" : titleField.val());
              $popup.popover("toggle");
            });
            $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_btn-cancel").click(function() {
              if (urlField.val() == '') {
                hiddenField.val('');
              }
              $popup.popover("toggle");
            });
          });
        });
      }
    }
  </script>
  <script type="text/javascript">
    $(function() {
      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;
      var pusher_options = {
        "0": {
          "disableStats": true
        },
        "cluster": "eu"
      };
      var pusher = new Pusher("8ec8e5b340066ced97d0", pusher_options);
      var channel = pusher.subscribe('notifications-channel-30');
      channel.bind('notification', function(data) {
        fetch_notifications();
      });
    });
  </script>
  <script src="https://democrm.i2technologies.net/modules/timesheets/assets/js/check_in_out_ts.js?v=112"></script> <input type="hidden" name="hour_attendance" value="22">
  <input type="hidden" name="minute_attendance" value="23">
  <input type="hidden" name="second_attendance" value="01">
  <input type="hidden" name="date_attendance" value="2025-05-07 22:23:01">
  <div class="modal" id="clock_attendance_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4>
            Check in / Check out </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="select-placeholder form-group" app-field-wrapper="staff_id"><label for="staff_id" class="control-label">Staff</label><select id="staff_id" name="staff_id" class="selectpicker" onchange="changestaff_id(this)" data-width="100%" data-none-selected-text="Non selected" data-live-search="true">
                  <option value=""></option>
                  <option value="30" selected>Admin Admin</option>
                </select></div>
              <div class="route_point_combobox hide">
                <br>
                <label for="route_point" class="control-label">Route point</label>
                <select id="route_point" name="route_point" class="selectpicker" data-width="100%" data-none-selected-text="Non selected" tabindex="-98">
                </select>
                <br>
                <br>
                <div class="clearfix"></div>
              </div>

              <div id="clock" class="clock">
                <div id="hourHand" class="hourHand"></div>
                <div id="minuteHand" class="minuteHand"></div>
                <div id="secondHand" class="secondHand"></div>
                <div id="center" class="center"></div>
                <ul>
                  <li><span>1</span></li>
                  <li><span>2</span></li>
                  <li><span>3</span></li>
                  <li><span>4</span></li>
                  <li><span>5</span></li>
                  <li><span>6</span></li>
                  <li><span>7</span></li>
                  <li><span>8</span></li>
                  <li><span>9</span></li>
                  <li><span>10</span></li>
                  <li><span>11</span></li>
                  <li><span>12</span></li>
                </ul>
              </div>
              <div class="row curr_date_attendance_wrap">
                <div class="curr_date text-center" id="curr_date_attendance">
                  2025-05-07 <button class="btn-edit-datetime">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn-close-edit-datetime hide">
                    <i class="fa fa-times"></i>
                  </button>
                  <div class="form-group" app-field-wrapper="edit_date"><label for="edit_date" class="control-label">Edit date</label>
                    <div class="input-group date"><input type="text" id="edit_date" name="edit_date" class="form-control datetimepicker" onchange="changedate(this)" value="" autocomplete="off">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar calendar-icon"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>

              <div class="clearfix"></div>
              <br>
              <div class="col-mm-12" id="attendance_history">
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://democrm.i2technologies.net/modules/timesheets/assets/js/route.js?v=112"></script>
  <script src="https://democrm.i2technologies.net/modules/appointly/assets/js/global.js?v=1746634981" type="text/javascript"></script>
  <div class="modal fade _event" id="newEventModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add new event</h4>
        </div>
        <form action="https://democrm.i2technologies.net/admin/utilities/calendar" id="calendar-event-form" method="post" accept-charset="utf-8">
          <input type="hidden" name="csrf_token_name" value="788880cceb998a670d6afd3efcd3e4ff" />
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" app-field-wrapper="title"><label for="title" class="control-label">Event title</label><input type="text" id="title" name="title" class="form-control" value=""></div>
                <div class="form-group" app-field-wrapper="description"><label for="description" class="control-label">Description</label><textarea id="description" name="description" class="form-control" rows="5"></textarea></div>
                <div class="form-group" app-field-wrapper="start"><label for="start" class="control-label">Start Date</label>
                  <div class="input-group date"><input type="text" id="start" name="start" class="form-control datetimepicker" value="" autocomplete="off">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar calendar-icon"></i>
                    </div>
                  </div>
                </div>
                <div class="clearfix mtop15"></div>
                <div class="form-group" app-field-wrapper="end"><label for="end" class="control-label">End Date</label>
                  <div class="input-group date"><input type="text" id="end" name="end" class="form-control datetimepicker" value="" autocomplete="off">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar calendar-icon"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="reminder_before">Notification</label>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <input type="number" class="form-control" name="reminder_before" value="30" id="reminder_before">
                        <span class="input-group-addon"><i class="fa fa-question-circle" data-toggle="tooltip" data-title="Eq. 30 minutes before"></i></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <select name="reminder_before_type" id="reminder_before_type" class="selectpicker" data-width="100%">
                        <option value="minutes" selected>Minutes</option>
                        <option value="hours">Hours</option>
                        <option value="days">Days</option>
                        <option value="weeks">Weeks</option>
                      </select>
                    </div>
                  </div>
                </div>
                <hr />
                <p class="bold">Event Color</p>
                <div class="cpicker-wrapper">
                  <div class='calendar-cpicker cpicker cpicker-big' data-color='#28B8DA' style='background:#28B8DA;border:1px solid #28B8DA'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#03a9f4' style='background:#03a9f4;border:1px solid #03a9f4'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#c53da9' style='background:#c53da9;border:1px solid #c53da9'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#757575' style='background:#757575;border:1px solid #757575'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#8e24aa' style='background:#8e24aa;border:1px solid #8e24aa'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#d81b60' style='background:#d81b60;border:1px solid #d81b60'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#0288d1' style='background:#0288d1;border:1px solid #0288d1'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#7cb342' style='background:#7cb342;border:1px solid #7cb342'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#fb8c00' style='background:#fb8c00;border:1px solid #fb8c00'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#84C529' style='background:#84C529;border:1px solid #84C529'></div>
                  <div class='calendar-cpicker cpicker cpicker-small' data-color='#fb3b3b' style='background:#fb3b3b;border:1px solid #fb3b3b'></div>
                </div>
                <input type="hidden" name="color" value="#28B8DA" />
                <div class="clearfix"></div>
                <hr />
                <div class="checkbox checkbox-primary">
                  <input type="checkbox" name="public" id="public">
                  <label for="public">Public Event</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Save</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />

      <title>Dashboard</title>

      <link rel="shortcut icon" id="favicon" href="https://democrm.i2technologies.net/uploads/company/favicon.jpg">
      <link rel="apple-touch-icon”" id="favicon-apple-touch-icon" href="https://democrm.i2technologies.net/uploads/company/favicon.jpg">
      <link rel="stylesheet" type="text/css" id="reset-css" href="{{ asset('assets/css/custom.reset.min.css') }}">
      <link rel="stylesheet" type="text/css" id="roboto-css" href="{{ asset('assets/plugins/roboto/roboto.css') }}">
      <link rel="stylesheet" type="text/css" id="vendor-css" href="{{ asset('assets/builds/vendor-admin.css') }}">
      <link rel="stylesheet" type="text/css" id="app-css" href="{{ asset('assets/css/style.min.css') }}">
      <link rel="stylesheet" type="text/css" id="full-calendar-css" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}">
      <script>
        var site_url = "https://democrm.i2technologies.net/";
        var admin_url = "https://democrm.i2technologies.net/admin/";
        var app = {};
        var app = {};
        app.available_tags = ["tag1", "tag2"];
        app.available_tags_ids = ["1", "2"];
        app.user_recent_searches = [];
        app.months_json = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        app.tinymce_lang = "";
        app.locale = "en";
        app.browser = "chrome";
        app.user_language = "";
        app.is_mobile = "";
        app.user_is_staff_member = "1";
        app.user_is_admin = "1";
        app.max_php_ini_upload_size_bytes = "67108864";
        app.calendarIDs = "";
        app.options = {};
        app.lang = {};
        app.options.date_format = "Y-m-d";
        app.options.decimal_places = "2";
        app.options.scroll_responsive_tables = "0";
        app.options.company_is_required = "1";
        app.options.default_view_calendar = "month";
        app.options.calendar_events_limit = "4";
        app.options.tables_pagination_limit = "25";
        app.options.time_format = "24";
        app.options.decimal_separator = ".";
        app.options.thousand_separator = ",";
        app.options.timezone = "Asia/Dhaka";
        app.options.calendar_first_day = "0";
        app.options.allowed_files = ".png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt";
        app.options.desktop_notifications = "1";
        app.options.show_table_export_button = "to_all";
        app.options.has_permission_tasks_checklist_items_delete = "1";
        app.options.show_setup_menu_item_only_on_hover = "0";
        app.options.newsfeed_maximum_files_upload = "10";
        app.options.dismiss_desktop_not_after = "15";
        app.options.enable_google_picker = "1";
        app.options.google_client_id = "";
        app.options.google_api = "";
        app.options.has_permission_create_task = "1";
        app.lang.invoice_task_billable_timers_found = "Started timers found";
        app.lang.validation_extension_not_allowed = "File extension not allowed";
        app.lang.tag = "Tag";
        app.lang.options = "Options";
        app.lang.no_items_warning = "Enter at least one item.";
        app.lang.item_forgotten_in_preview = "Have you forgotten to add this item?";
        app.lang.new_notification = "New Notification!";
        app.lang.estimate_number_exists = "This estimate number exists for the ongoing year.";
        app.lang.invoice_number_exists = "This invoice number exists for the ongoing year.";
        app.lang.confirm_action_prompt = "Are you sure you want to perform this action?";
        app.lang.calendar_expand = "expand";
        app.lang.media_files = "Files";
        app.lang.credit_note_number_exists = "Credit note number already exists";
        app.lang.item_field_not_formatted = "The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here.";
        app.lang.email_exists = "Email already exists";
        app.lang.phonenumber_exists = "Phone number already exists";
        app.lang.website_exists = "Website already exists";
        app.lang.company_exists = "Company already exists";
        app.lang.filter_by = "Filter by";
        app.lang.you_can_not_upload_any_more_files = "You can not upload any more files";
        app.lang.cancel_upload = "Cancel Upload";
        app.lang.browser_not_support_drag_and_drop = "Your browser does not support drag'n'drop file uploads";
        app.lang.drop_files_here_to_upload = "Drop files here to upload";
        app.lang.file_exceeds_max_filesize = "The uploaded file exceeds the upload_max_filesize directive in php.ini (64 MB)";
        app.lang.file_exceeds_maxfile_size_in_form = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (64 MB)";
        app.lang.unit = "Unit";
        app.lang.dt_length_menu_all = "All";
        app.lang.dt_button_reload = "Reload";
        app.lang.dt_button_excel = "Excel";
        app.lang.dt_button_csv = "CSV";
        app.lang.dt_button_pdf = "PDF";
        app.lang.dt_button_print = "Print";
        app.lang.dt_button_export = "Export";
        app.lang.search_ajax_empty = "Select and begin typing";
        app.lang.search_ajax_initialized = "Start typing to search";
        app.lang.search_ajax_searching = "Searching...";
        app.lang.not_results_found = "No results found";
        app.lang.search_ajax_placeholder = "Type to search...";
        app.lang.currently_selected = "Currently Selected";
        app.lang.task_stop_timer = "Stop Timer";
        app.lang.dt_button_column_visibility = "Visibility";
        app.lang.note = "Note";
        app.lang.search_tasks = "Search Tasks";
        app.lang.confirm = "Confirm";
        app.lang.showing_billable_tasks_from_project = "Showing billable tasks from project";
        app.lang.invoice_task_item_project_tasks_not_included = "Projects tasks are not included in this list.";
        app.lang.credit_amount_bigger_then_invoice_balance = "Total credits amount is bigger then invoice balance due";
        app.lang.credit_amount_bigger_then_credit_note_remaining_credits = "Total credits amount is bigger then remaining credits";
        app.lang.save = "Save";
        app.lang.expense = "Expense of";
        app.lang.ticket = "Ticket";
        app.lang.lead = "Lead";
        app.lang.create_reminder = "Create Reminder";
        app.lang.datatables = {
          "emptyTable": "No entries found",
          "info": "Showing _START_ to _END_ of _TOTAL_ entries",
          "infoEmpty": "Showing 0 to 0 of 0 entries",
          "infoFiltered": "(filtered from _MAX_ total entries)",
          "lengthMenu": "_MENU_",
          "loadingRecords": "Loading...",
          "processing": "<div class=\"dt-loader\"><\/div>",
          "search": "<div class=\"input-group\"><span class=\"input-group-addon\"><span class=\"fa fa-search\"><\/span><\/span>",
          "searchPlaceholder": "Search...",
          "zeroRecords": "No matching records found",
          "paginate": {
            "first": "First",
            "last": "Last",
            "next": "Next",
            "previous": "Previous"
          },
          "aria": {
            "sortAscending": " activate to sort column ascending",
            "sortDescending": " activate to sort column descending"
          }
        };
        var app_language = "",
          app_is_mobile = "",
          app_user_browser = "chrome",
          app_date_format = "Y-m-d",
          app_decimal_places = "2",
          app_scroll_responsive_tables = "0",
          app_company_is_required = "1",
          app_default_view_calendar = "month",
          app_calendar_events_limit = "4",
          app_tables_pagination_limit = "25",
          app_time_format = "24",
          app_decimal_separator = ".",
          app_thousand_separator = ",",
          app_timezone = "Asia/Dhaka",
          app_calendar_first_day = "0",
          app_allowed_files = ".png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt",
          app_desktop_notifications = "1",
          max_php_ini_upload_size_bytes = "67108864",
          app_show_table_export_button = "to_all",
          calendarIDs = "",
          is_admin = "1",
          is_staff_member = "1",
          has_permission_tasks_checklist_items_delete = "1",
          app_show_setup_menu_item_only_on_hover = "0",
          app_newsfeed_maximum_files_upload = "10",
          app_dismiss_desktop_not_after = "15",
          app_enable_google_picker = "1",
          app_google_client_id = "",
          google_api = "";
        var appLang = {};
        appLang["invoice_task_billable_timers_found"] = "Started timers found";
        appLang["validation_extension_not_allowed"] = "File extension not allowed";
        appLang["tag"] = "Tag";
        appLang["options"] = "Options";
        appLang["no_items_warning"] = "Enter at least one item.";
        appLang["item_forgotten_in_preview"] = "Have you forgotten to add this item?";
        appLang["new_notification"] = "New Notification!";
        appLang["estimate_number_exists"] = "This estimate number exists for the ongoing year.";
        appLang["invoice_number_exists"] = "This invoice number exists for the ongoing year.";
        appLang["confirm_action_prompt"] = "Are you sure you want to perform this action?";
        appLang["calendar_expand"] = "expand";
        appLang["media_files"] = "Files";
        appLang["credit_note_number_exists"] = "Credit note number already exists";
        appLang["item_field_not_formatted"] = "The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here.";
        appLang["email_exists"] = "Email already exists";
        appLang["phonenumber_exists"] = "Phone number already exists";
        appLang["website_exists"] = "Website already exists";
        appLang["company_exists"] = "Company already exists";
        appLang["filter_by"] = "Filter by";
        appLang["you_can_not_upload_any_more_files"] = "You can not upload any more files";
        appLang["cancel_upload"] = "Cancel Upload";
        appLang["browser_not_support_drag_and_drop"] = "Your browser does not support drag'n'drop file uploads";
        appLang["drop_files_here_to_upload"] = "Drop files here to upload";
        appLang["file_exceeds_max_filesize"] = "The uploaded file exceeds the upload_max_filesize directive in php.ini (64 MB)";
        appLang["file_exceeds_maxfile_size_in_form"] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (64 MB)";
        appLang["unit"] = "Unit";
        appLang["dt_length_menu_all"] = "All";
        appLang["dt_button_reload"] = "Reload";
        appLang["dt_button_excel"] = "Excel";
        appLang["dt_button_csv"] = "CSV";
        appLang["dt_button_pdf"] = "PDF";
        appLang["dt_button_print"] = "Print";
        appLang["dt_button_export"] = "Export";
        appLang["search_ajax_empty"] = "Select and begin typing";
        appLang["search_ajax_initialized"] = "Start typing to search";
        appLang["search_ajax_searching"] = "Searching...";
        appLang["not_results_found"] = "No results found";
        appLang["search_ajax_placeholder"] = "Type to search...";
        appLang["currently_selected"] = "Currently Selected";
        appLang["task_stop_timer"] = "Stop Timer";
        appLang["dt_button_column_visibility"] = "Visibility";
        appLang["note"] = "Note";
        appLang["search_tasks"] = "Search Tasks";
        appLang["confirm"] = "Confirm";
        appLang["showing_billable_tasks_from_project"] = "Showing billable tasks from project";
        appLang["invoice_task_item_project_tasks_not_included"] = "Projects tasks are not included in this list.";
        appLang["credit_amount_bigger_then_invoice_balance"] = "Total credits amount is bigger then invoice balance due";
        appLang["credit_amount_bigger_then_credit_note_remaining_credits"] = "Total credits amount is bigger then remaining credits";
        appLang["save"] = "Save";
        appLang["expense"] = "Expense of";
        appLang["ticket"] = "Ticket";
        appLang["lead"] = "Lead";
        appLang["create_reminder"] = "Create Reminder";
      </script>
      <script>
        var totalUnreadNotifications = 0,
          proposalsTemplates = [],
          contractsTemplates = [],
          billingAndShippingFields = ['billing_street', 'billing_city', 'billing_state', 'billing_zip', 'billing_country', 'shipping_street', 'shipping_city', 'shipping_state', 'shipping_zip', 'shipping_country'],
          isRTL = 'false',
          taskid, taskTrackingStatsData, taskAttachmentDropzone, taskCommentAttachmentDropzone, newsFeedDropzone, expensePreviewDropzone, taskTrackingChart, cfh_popover_templates = {},
          _table_api;
      </script>
      <script>
        if (typeof(jQuery) === 'undefined' && !window.deferAfterjQueryLoaded) {
          window.deferAfterjQueryLoaded = [];
          Object.defineProperty(window, "$", {
            set: function(value) {
              window.setTimeout(function() {
                $.each(window.deferAfterjQueryLoaded, function(index, fn) {
                  fn();
                });
              }, 0);
              Object.defineProperty(window, "$", {
                value: value
              });
            },
            configurable: true
          });
        }

        var csrfData = {
          "formatted": {
            "csrf_token_name": "788880cceb998a670d6afd3efcd3e4ff"
          },
          "token_name": "csrf_token_name",
          "hash": "788880cceb998a670d6afd3efcd3e4ff"
        };

        if (typeof(jQuery) == 'undefined') {
          window.deferAfterjQueryLoaded.push(function() {
            csrf_jquery_ajax_setup();
          });
          window.addEventListener('load', function() {
            csrf_jquery_ajax_setup();
          }, true);
        } else {
          csrf_jquery_ajax_setup();
        }

        function csrf_jquery_ajax_setup() {
          $.ajaxSetup({
            data: csrfData.formatted
          });

          $(document).ajaxError(function(event, request, settings) {
            if (request.status === 419) {
              alert_float('warning', 'Page expired, refresh the page make an action.')
            }
          });
        }
      </script>
      <script>
        var leadUniqueValidationFields = ["email"];
        var leadAttachmentsDropzone;
      </script>
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body class="app admin dashboard invoices-total-manual user-id-30 chrome">
      <div id="header">
        <div class="hide-menu"><i class="fa fa-align-left"></i></div>
        <div id="logo">
          <a href="" class="logo img-responsive">
            <img src="https://democrm.i2technologies.net/uploads/company/b20cab9d0ff145d884c70f2de81e77cc.jpg" class="img-responsive" alt="i2Technologies Limited">
          </a>
        </div>
        <nav>
          <div class="small-logo">
            <span class="text-primary">
              <a href="https://democrm.i2technologies.net/admin/" class="logo img-responsive">
                <img src="https://democrm.i2technologies.net/uploads/company/b20cab9d0ff145d884c70f2de81e77cc.jpg" class="img-responsive" alt="i2Technologies Limited">
              </a> </span>
          </div>
          <div class="mobile-menu">
            <button type="button" class="navbar-toggle visible-md visible-sm visible-xs mobile-menu-toggle collapsed" data-toggle="collapse" data-target="#mobile-collapse" aria-expanded="false">
              <i class="fa fa-chevron-down"></i>
            </button>
            <ul class="mobile-icon-menu">
            </ul>
            <div class="mobile-navbar collapse" id="mobile-collapse" aria-expanded="false" style="height: 0px;" role="navigation">
              <ul class="nav navbar-nav">
                <li class="header-my-profile"><a href="https://democrm.i2technologies.net/admin/profile">My Profile</a></li>
                <li class="header-my-timesheets"><a href="https://democrm.i2technologies.net/admin/staff/timesheets">My Timesheets</a></li>
                <li class="header-edit-profile"><a href="https://democrm.i2technologies.net/admin/staff/edit_profile">Edit Profile</a></li>
                <li class="header-newsfeed">
                  <a href="#" class="open_newsfeed mobile">
                    Share documents, ideas.. </a>
                </li>
                <li class="header-logout"><a href="#" onclick="logout(); return false;">Logout</a></li>
              </ul>
            </div>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li id="top_search" class="dropdown" data-toggle="tooltip" data-placement="bottom" data-title="Use # + tagname to search by tags">
              <input type="search" id="search_input" class="form-control" placeholder="Search...">
              <div id="search_results">
              </div>
              <ul class="dropdown-menu search-results animated fadeIn no-mtop search-history" id="search-history">
              </ul>
            </li>
            <li id="top_search_button">
              <button class="btn"><i class="fa fa-search"></i></button>
            </li>


            <li class="icon header-user-profile" data-toggle="tooltip" title="Admin Admin" data-placement="bottom">
              <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="false">
                <img src="https://democrm.i2technologies.net/assets/images/user-placeholder.jpg" class="img img-responsive staff-profile-image-small pull-left" /> </a>
            </li>
          </ul>
        </nav>
      </div>
      <div id="mobile-search" class="hide">
        <ul>
        </ul>
      </div>

      <aside id="menu" class="sidebar">
        <ul class="nav metis-menu" id="side-menu">
          <li class="dashboard_user">
            Welcome Admin<i class="fa fa-power-off top-left-logout pull-right" data-toggle="tooltip"></i>
          </li>
          <li class="quick-links">
            <div class="dropdown dropdown-quick-links">
              <a href="#" class="dropdown-toggle" id="dropdownQuickLinks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-gavel" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li class="menu-item-dashboard">
            <a href=""
              aria-expanded="false">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-text">
                Dashboard</span>
            </a>
          </li>

          <!--Accounting-->
          <li class="menu-item-purchase">
            <a href="#"
              aria-expanded="false">
              <i class="fa fa-shopping-cart menu-icon"></i>
              <span class="menu-text">
                Accounting</span>
              <span class="fa arrow pleft5"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
              <li class="sub-menu-item-vendors">
                <a href="{{route('chart_of_account')}}">
                  <i class="fa fa-user-o menu-icon"></i>
                  <span class="sub-menu-text">
                    Chart Of Accounts</span>
                </a>
              </li>
              <li class="sub-menu-item-purchase-items">
                <a href="{{route('general_journal')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">Genaral Journal</span>
                </a>
              </li>

              <li class="sub-menu-item-purchase-items">
                <a href="{{route('adjustment_journal')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">Adjustment Journal</span>
                </a>
              </li>

              <li class="sub-menu-item-purchase-items">
                <a href="{{route('unposted_journal')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">Upnosted Journal</span>
                </a>
              </li>

              <li class="sub-menu-item-purchase-items">
                <a href="{{route('others_payment')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">Others Payment</span>
                </a>
              </li>

              <li class="sub-menu-item-purchase-items">
                <a href="{{route('credit_note')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">Credit Note Entry</span>
                </a>
              </li>

            </ul>
          </li>

          <!--Accounting-->
          <li class="menu-item-purchase">
            <a href="#"
              aria-expanded="false">
              <i class="fa fa-shopping-cart menu-icon"></i>
              <span class="menu-text">
                Settings</span>
              <span class="fa arrow pleft5"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
              <li class="sub-menu-item-vendors">
                <a href="{{route('posting_control')}}">
                  <i class="fa fa-user-o menu-icon"></i>
                  <span class="sub-menu-text">
                    Postiong Control</span>
                </a>
              </li>
            </ul>
          </li>

          <!--Customer-->
          <li class="menu-item-purchase">
            <a href="#"
              aria-expanded="false">
              <i class="fa fa-shopping-cart menu-icon"></i>
              <span class="menu-text">
                Customer</span>
              <span class="fa arrow pleft5"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
              <li class="sub-menu-item-vendors">
                <a href="{{route('customer_list')}}">
                  <i class="fa fa-user-o menu-icon"></i>
                  <span class="sub-menu-text">
                    Customer List</span>
                </a>
              </li>

            </ul>
          </li>

          <!--Vendor-->
          <li class="menu-item-purchase">
            <a href="#"
              aria-expanded="false">
              <i class="fa fa-shopping-cart menu-icon"></i>
              <span class="menu-text">
                Vendor</span>
              <span class="fa arrow pleft5"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
              <li class="sub-menu-item-vendors">
                <a href="{{route('vendor_list')}}">
                  <i class="fa fa-user-o menu-icon"></i>
                  <span class="sub-menu-text">
                    Vendor List</span>
                </a>
              </li>

            </ul>
          </li>

          <!--Reference-->
          <li class="menu-item-purchase">
            <a href="#"
              aria-expanded="false">
              <i class="fa fa-shopping-cart menu-icon"></i>
              <span class="menu-text">
                Refarence </span>
              <span class="fa arrow pleft5"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
              <li class="sub-menu-item-purchase-items">
                <a href="{{route('acc_category')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">
                    Account Category</span>
                </a>
              </li>

              <li class="sub-menu-item-vendors">
                <a href="{{route('acc_control')}}">
                  <i class="fa fa-user-o menu-icon"></i>
                  <span class="sub-menu-text">
                    Account Control </span>
                </a>
              </li>
              <li class="sub-menu-item-purchase-items">
                <a href="{{route('acc_type')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">
                    Account Type </span>
                </a>
              </li>
              <li class="sub-menu-item-purchase-items">
                <a href="{{route('main_head')}}">
                  <i class="fa fa-clone menu-icon menu-icon"></i>
                  <span class="sub-menu-text">
                    Main Head </span>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </aside>
      <div id="wrapper">
        <div class="screen-options-area"></div>
        <div class="content">
          <div class="row">
            <div class="clearfix"></div>

            <div class="col-md-12">
              <div class="widget relative" id="widget-top_stats" data-name="Quick Statistics">
                <div class="row">
                  @yield('content')
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <script>
        app.calendarIDs = '[]';
      </script>
      <!-- Likes -->
      <div class="modal likes_modal fade" id="modal_post_likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Colleagues who like this post</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div id="modal_post_likes_wrapper">
                </div>

              </div>

            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-info load_more_post_likes">Load More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Likes -->
      <div class="modal likes_modal animated fadeIn" id="modal_post_comment_likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Colleagues who like this comment</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div id="modal_comment_likes_wrapper">

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-info load_more_post_comment_likes">Load More</a>
            </div>
          </div>
        </div>
      </div>
      <div id="event"></div>
      <div id="newsfeed" class="animated fadeIn hide">
      </div>
      <!-- Task modal view -->
      <div class="modal fade task-modal-single" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content data">

          </div>
        </div>
      </div>

      <!--Add/edit task modal-->
      <div id="_task"></div>

      <!-- Lead Data Add/Edit-->
      <div class="modal fade lead-modal" id="lead-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content data">

          </div>
        </div>
      </div>

      <div id="timers-logout-template-warning" class="hide">
        <h2 class="bold">Started tasks timers found!<br />Are you sure you want to logout without stopping the timers?</h2>
        <hr />
        <a href="https://democrm.i2technologies.net/admin/authentication/logout" class="btn btn-danger">Logout</a>
      </div>

      <!--Lead convert to customer modal-->
      <div id="lead_convert_to_customer"></div>

      <!--Lead reminder modal-->
      <div id="lead_reminder_modal"></div>


      <script type="text/javascript" id="vendor-js" src="{{ asset('assets/builds/vendor-admin.js') }}"></script>
      <script type="text/javascript" id="jquery-migrate-js" src="{{ asset('assets/plugins/jquery/jquery-migrate.min.js') }}"></script>
      <script type="text/javascript" id="datatables-js" src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
      <script type="text/javascript" id="moment-js" src="{{ asset('assets/builds/moment.min.js') }}"></script>
      <script type="text/javascript" id="bootstrap-select-js" src="{{ asset('assets/builds/bootstrap-select.min.js') }}"></script>
      <script type="text/javascript" id="tinymce-js" src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
      <script type="text/javascript" id="jquery-validation-js" src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
      <script type="text/javascript" id="pusher-js" src="https://js.pusher.com/5.0/pusher.min.js"></script>
      <script type="text/javascript" id="google-js" src="https://apis.google.com/js/api.js?onload=onGoogleApiLoad" defer></script>
      <script type="text/javascript" id="common-js" src="{{ asset('assets/builds/common.js') }}"></script>
      <script type="text/javascript" id="app-js" src="{{ asset('assets/js/main.min.js') }}"></script>
      <script type="text/javascript" id="full-calendar-js" src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
      <script>
        function custom_fields_hyperlink() {
          var cf_hyperlink = $('body').find('.cf-hyperlink');
          if (cf_hyperlink.length) {
            $.each(cf_hyperlink, function() {
              var cfh_wrapper = $(this);
              var cfh_field_to = cfh_wrapper.attr('data-fieldto');
              var cfh_field_id = cfh_wrapper.attr('data-field-id');
              var textEl = $('body').find('#custom_fields_' + cfh_field_to + '_' + cfh_field_id + '_popover');
              var hiddenField = $("#custom_fields\\\[" + cfh_field_to + "\\\]\\\[" + cfh_field_id + "\\\]");
              var cfh_value = cfh_wrapper.attr('data-value');
              hiddenField.val(cfh_value);

              if ($(hiddenField.val()).html() != '') {
                textEl.html($(hiddenField.val()).html());
              }
              var cfh_field_name = cfh_wrapper.attr('data-field-name');
              textEl.popover({
                html: true,
                trigger: "manual",
                placement: "top",
                title: cfh_field_name,
                content: function() {
                  return $(cfh_popover_templates[cfh_field_id]).html();
                }
              }).on("click", function(e) {
                var $popup = $(this);
                $popup.popover("toggle");
                var titleField = $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_title");
                var urlField = $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_link");
                var ttl = $(hiddenField.val()).html();
                var cfUrl = $(hiddenField.val()).attr("href");
                if (cfUrl) {
                  $('#cf_hyperlink_open_' + cfh_field_id).attr('href', (cfUrl.indexOf('://') === -1 ? 'http://' + cfUrl : cfUrl));
                }
                titleField.val(ttl);
                urlField.val(cfUrl);
                $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_btn-save").click(function() {
                  hiddenField.val((urlField.val() != '' ? '<a href="' + urlField.val() + '" target="_blank">' + titleField.val() + '</a>' : ''));
                  textEl.html(titleField.val() == "" ? "Click here to add link" : titleField.val());
                  $popup.popover("toggle");
                });
                $("#custom_fields_" + cfh_field_to + "_" + cfh_field_id + "_btn-cancel").click(function() {
                  if (urlField.val() == '') {
                    hiddenField.val('');
                  }
                  $popup.popover("toggle");
                });
              });
            });
          }
        }
      </script>
      <script type="text/javascript">
        $(function() {
          // Enable pusher logging - don't include this in production
          // Pusher.logToConsole = true;
          var pusher_options = {
            "0": {
              "disableStats": true
            },
            "cluster": "eu"
          };
          var pusher = new Pusher("8ec8e5b340066ced97d0", pusher_options);
          var channel = pusher.subscribe('notifications-channel-30');
          channel.bind('notification', function(data) {
            fetch_notifications();
          });
        });
      </script>
      <script src="https://democrm.i2technologies.net/modules/timesheets/assets/js/check_in_out_ts.js?v=112"></script> <input type="hidden" name="hour_attendance" value="22">
      <input type="hidden" name="minute_attendance" value="23">
      <input type="hidden" name="second_attendance" value="01">
      <input type="hidden" name="date_attendance" value="2025-05-07 22:23:01">
      <div class="modal" id="clock_attendance_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4>
                Check in / Check out </h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="select-placeholder form-group" app-field-wrapper="staff_id"><label for="staff_id" class="control-label">Staff</label><select id="staff_id" name="staff_id" class="selectpicker" onchange="changestaff_id(this)" data-width="100%" data-none-selected-text="Non selected" data-live-search="true">
                      <option value=""></option>
                      <option value="30" selected>Admin Admin</option>
                    </select></div>
                  <div class="route_point_combobox hide">
                    <br>
                    <label for="route_point" class="control-label">Route point</label>
                    <select id="route_point" name="route_point" class="selectpicker" data-width="100%" data-none-selected-text="Non selected" tabindex="-98">
                    </select>
                    <br>
                    <br>
                    <div class="clearfix"></div>
                  </div>

                  <div id="clock" class="clock">
                    <div id="hourHand" class="hourHand"></div>
                    <div id="minuteHand" class="minuteHand"></div>
                    <div id="secondHand" class="secondHand"></div>
                    <div id="center" class="center"></div>
                    <ul>
                      <li><span>1</span></li>
                      <li><span>2</span></li>
                      <li><span>3</span></li>
                      <li><span>4</span></li>
                      <li><span>5</span></li>
                      <li><span>6</span></li>
                      <li><span>7</span></li>
                      <li><span>8</span></li>
                      <li><span>9</span></li>
                      <li><span>10</span></li>
                      <li><span>11</span></li>
                      <li><span>12</span></li>
                    </ul>
                  </div>
                  <div class="row curr_date_attendance_wrap">
                    <div class="curr_date text-center" id="curr_date_attendance">
                      2025-05-07 <button class="btn-edit-datetime">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button class="btn-close-edit-datetime hide">
                        <i class="fa fa-times"></i>
                      </button>
                      <div class="form-group" app-field-wrapper="edit_date"><label for="edit_date" class="control-label">Edit date</label>
                        <div class="input-group date"><input type="text" id="edit_date" name="edit_date" class="form-control datetimepicker" onchange="changedate(this)" value="" autocomplete="off">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar calendar-icon"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>

                  <div class="clearfix"></div>
                  <br>
                  <div class="col-mm-12" id="attendance_history">
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <script src="https://democrm.i2technologies.net/modules/timesheets/assets/js/route.js?v=112"></script>
      <script src="https://democrm.i2technologies.net/modules/appointly/assets/js/global.js?v=1746634981" type="text/javascript"></script>
      <div class="modal fade _event" id="newEventModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add new event</h4>
            </div>
            <form action="https://democrm.i2technologies.net/admin/utilities/calendar" id="calendar-event-form" method="post" accept-charset="utf-8">
              <input type="hidden" name="csrf_token_name" value="788880cceb998a670d6afd3efcd3e4ff" />
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" app-field-wrapper="title"><label for="title" class="control-label">Event title</label><input type="text" id="title" name="title" class="form-control" value=""></div>
                    <div class="form-group" app-field-wrapper="description"><label for="description" class="control-label">Description</label><textarea id="description" name="description" class="form-control" rows="5"></textarea></div>
                    <div class="form-group" app-field-wrapper="start"><label for="start" class="control-label">Start Date</label>
                      <div class="input-group date"><input type="text" id="start" name="start" class="form-control datetimepicker" value="" autocomplete="off">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar calendar-icon"></i>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix mtop15"></div>
                    <div class="form-group" app-field-wrapper="end"><label for="end" class="control-label">End Date</label>
                      <div class="input-group date"><input type="text" id="end" name="end" class="form-control datetimepicker" value="" autocomplete="off">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar calendar-icon"></i>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="reminder_before">Notification</label>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="number" class="form-control" name="reminder_before" value="30" id="reminder_before">
                            <span class="input-group-addon"><i class="fa fa-question-circle" data-toggle="tooltip" data-title="Eq. 30 minutes before"></i></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <select name="reminder_before_type" id="reminder_before_type" class="selectpicker" data-width="100%">
                            <option value="minutes" selected>Minutes</option>
                            <option value="hours">Hours</option>
                            <option value="days">Days</option>
                            <option value="weeks">Weeks</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <p class="bold">Event Color</p>
                    <div class="cpicker-wrapper">
                      <div class='calendar-cpicker cpicker cpicker-big' data-color='#28B8DA' style='background:#28B8DA;border:1px solid #28B8DA'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#03a9f4' style='background:#03a9f4;border:1px solid #03a9f4'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#c53da9' style='background:#c53da9;border:1px solid #c53da9'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#757575' style='background:#757575;border:1px solid #757575'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#8e24aa' style='background:#8e24aa;border:1px solid #8e24aa'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#d81b60' style='background:#d81b60;border:1px solid #d81b60'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#0288d1' style='background:#0288d1;border:1px solid #0288d1'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#7cb342' style='background:#7cb342;border:1px solid #7cb342'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#fb8c00' style='background:#fb8c00;border:1px solid #fb8c00'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#84C529' style='background:#84C529;border:1px solid #84C529'></div>
                      <div class='calendar-cpicker cpicker cpicker-small' data-color='#fb3b3b' style='background:#fb3b3b;border:1px solid #fb3b3b'></div>
                    </div>
                    <input type="hidden" name="color" value="#28B8DA" />
                    <div class="clearfix"></div>
                    <hr />
                    <div class="checkbox checkbox-primary">
                      <input type="checkbox" name="public" id="public">
                      <label for="public">Public Event</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </body>

    </html>

    @stack('script')
  </div><!-- /.modal -->

</body>

</html>

@stack('script')