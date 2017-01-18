<?php include_once('includes/settings.php'); ?>
<!DOCTYPE html>
<html ng-app="schoolzApp" xmlns:fb="http://www.facebook.com/2008/fbml"
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
    lang="en" dir="ltr">
<head>
	<title><?php echo SITE_TITLE ?></title>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta name="description" content="<?php echo SITE_DESC ?>" />
	<meta property="og:title" content="<?php echo SITE_TITLE ?>" />
	<meta property="og:site_name" content="<?php echo SITE_NAME ?>"/>
	<meta property="og:url" content="<?php echo SITE_URL ?>" />
	<meta property="og:description" content="<?php echo SITE_DESC ?>" />
	<meta property="og:image" content="<?php echo SITE_IMG ?>" />
	<meta property="fb:app_id" content="<?php echo FB_APP_ID ?>" />
	<script defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GMAPS_API_KEY ?>&callback=angular.noop" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="dist/style.min.css">
</head>
<body ng-controller="mapControl">
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo FB_APP_ID ?>',
          xfbml      : true,
          version    : 'v2.5'
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="map-wrap">
      <map id="map_main" zoom="{{zoom}}" center="{{address}}"></map>
    </div>
    <header id="map-header">
      <div id="search-wrap">
        <label id="search-label">Search:&nbsp;</label>
        <input id="map_search" ng-model="address" placeholder="Find a School in NZ" list="schoolList" ng-keyup="searchKeyUp($event)" ng-change="searchChange()">
      </div>

      <div id="map_legend" open="open">
        <!--<p><span class="red line">------</span><small>Power&nbsp;Grid</small></p>
        <p><span class="blue line">------</span><small>Bus&nbsp;Routes</small></p>-->
				<label for="toggleSchools" class="togglebox">
					<input id="toggleSchools" type="checkbox" ng-model="checkedSchools" ng-change="toggleMarkerType('schools')">
					<img src="images/school.png" alt="schools">&nbsp;Schools
				</label>
				<label for="toggleSubstations" class="togglebox">
					<input id="toggleSubstations" type="checkbox" ng-model="checkedSubstations" ng-change="toggleMarkerType('substations')">
					<img src="images/substation.png" alt="substations">&nbsp;Substations
				</label>
				<?php /*<label for="togglePylons" class="togglebox">
					<input id="togglePylons" type="checkbox" ng-model="checkedPylons" ng-change="toggleMarkerType('pylons')">
					<span class="line red">---</span>Power Lines
				</label>*/ ?>
      </div>
    </header>

    <datalist id="schoolList">
      <option ng-repeat="school in schoolz">{{school.FIELD2}}, {{school.FIELD23}}</option>
    </datalist>
    <div id="map_footer">
        <div class="copyright">
        <a href="//<?php echo GT_SITE ?>">
            <span class="bigtext">Graeme&nbsp;Thornber</span>
            <span class="smalltext">GT</span>
        </a>
        <span class="copy">&copy;&nbsp;2016</span>
        </div>
        <div id="map_social">
            <div class="fb-share-button" data-href="http://<?php echo SITE_URL ?>/" data-layout="button_count"></div>
        </div>
    </div>
    <script src="dist/main.min.js"></script>

    <script src="data/schoolz.js"></script>
		<script src="scripts/gt_school.js"></script>

    <script src="data/pylonz.js"></script>

    <!--<script src="data/busz.js"></script>-->

    <script src="data/substationz.js"></script>
		<script src="scripts/gt_substation.js"></script>

    <script src="data/playcentrez.js"></script>
		<script src="scripts/gt_playcentre.js"></script>

    <script src="scripts/gt_mapControl.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', '<?php echo GA_ID ?>', '<?php echo SITE_URL ?>');
        ga('send', 'pageview');
    </script>
</body>
</html>