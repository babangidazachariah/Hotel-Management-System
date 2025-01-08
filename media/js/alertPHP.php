<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Alert Demos</title>
		
		<link rel="stylesheet" type="text/css" href="media/css/demos.css" />
		<link rel="stylesheet" type="text/css" href="media/css/alert.css" />
		
		<script type="text/javascript" src="media/js/js-core.js"></script>
		<script type="text/javascript" src="media/js/alert.js"></script>
		<script type="text/javascript">
			window.onload = function() {
				/*
				 * You'll probably want to replace this with $('#demo').click( fn ); or whatever the
				 * JS library you are using uses. If none then this will do nicly!
				 */
				jsCore.addListener( {
					"mElement":  "demo",
					"sType":     "click",
					"fnCallback": function() {
						Alert.fnCustom( {
							'sTitle': 'Alert',
							'sMessage': "This alert box is some what different from the other examples",
							'sClass': 'different',
							'bAnimate': false,
							'sDisplay': 'abbc',
							'aoButtons': [
								{
									'sLabel': 'Funky',
									'sClass': 'selected',
									'cPosition': 'b'
								}
							]
						} );
					}
				} );
			}
		</script>
	</head>
	<body id="alert_example">
		<div id="container">
			<div class="full_width big">
				<i>Alert</i> custom control with alternative styling - fnCustom()
			</div>
		
			<h1>Preamble</h1>
			<p>I've built a default style for Alert and it might not be to your taste or fit into your web-site. For that reason Alert can be completely styled using CSS. The example below shows an alternative style.</p>
			
			<h1>Live example</h1>
			<p id="demo">fnCustom() example with custom styling - click to run.</p>
			
			<h1>Initialisation code</h1>
			<pre>	Alert.fnCustom( {
	'sTitle': 'Alert',
	'sMessage': "This alert box is some what different from the other examples!",
	'sClass': 'different',
	'bAnimate': false,
	'sDisplay': 'abbc',
	'aoButtons': [
		{
			'sLabel': 'Funky',
			'sClass': 'selected',
			'cPosition': 'b'
		}
	]
} );</pre>
			
			
			<h1>Other examples</h1>
			<h2>Basic usage</h2>
			<ul>
				<li><a href="example_alert.html">Basic Alert</a></li>
				<li><a href="example_confirm.html">Basic Confirm</a></li>
				<li><a href="example_custom_basic.html">Basic custom alert control</a></li>
				<li><a href="example_custom_position.html">Custom positioning and size of buttons</a></li>
				<li><a href="example_user_input.html">Requiring user input (i.e. prompt())</a></li>
				<li><a href="example_style.html">Alternative CSS styling</a></li>
				<li><a href="example_desktop_save.html">Imitation of a desktop application 'save' dialogue.</a></li>
				<li><a href="example_mouse.html">Mouse over/out functions.</a></li>
			</ul>
			
			<p>Please refer to the <a href="http://www.sprymedia.co.uk/article/Alert+-+Javascript+dialogue+controls"><i>Alert</i> documentation</a> for full information about it's API properties and methods.</p>
			
			
			<div id="footer" style="text-align:center;">
				<span style="font-size:10px;">
					Alert &copy; Allan Jardine 2007-2008.
				</span>
			</div>
		</div>
		
	</body>
</html>
