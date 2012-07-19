<html>
	<head>
		<title>{{title}} aa</title>
		<base href="{{_config.subdomain_url}}"> 
		<link rel="stylesheet" href="/static/css/main.css" type="text/css" /> 
		<link rel="stylesheet" href="/static/css/forms.css" type="text/css" /> 
		<link rel="stylesheet" href="/static/css/general.css" type="text/css" />
		<link rel="stylesheet" href="/static/css/boxy.css" type="text/css" />
		<link rel="stylesheet" href="/static/css/jquery.qtip.css" type="text/css" />
		<link rel="stylesheet" href="/static/css/redmond/jquery-ui-1.8.9.custom.css" type="text/css" /> 
    <link href="/static/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="/static/js/jquery-ui-1.8.9.custom.min.js"></script>
		<script type='text/javascript' src='/static/js/jquery.locationpicker.js'></script>
		<script type='text/javascript' src='/static/js/jquery.boxy.js'></script>
		<script type='text/javascript' src='/static/js/jquery.qtip.min.js'></script>
		<script type='text/javascript' src='/static/js/boostrap_modal.js'></script>
    <script type="text/javascript" src="/static/js/bootstrap-tabs.js"></script>
		<script type='text/javascript' src='/static/js/admin.js'></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
 		<!-- Setup the recorder interface -->
  		<script type="/static/js/text/javascript" src="recorder.js"></script>
  		<!-- GUI code... take it or leave it -->
  		<script type="/static/js/text/javascript" src="gui.js"></script>
		<!--[if lt IE 7]>
		<script src="/static/js/IE7.js" type="text/javascript"></script>
		<![endif]-->
		<!--[if lt IE 8]>
		<script src="/static/js/IE8.js" type="text/javascript"></script>
		<![endif]-->
		{{map.headerjs}}
		{{map.headermap}}
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .noBlue{background:#FFFFFF!important;}
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }

    </style>
  </head>
  <body>
  {{map.onload}}
