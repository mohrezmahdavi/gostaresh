<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME', 'Laravel') }} | @yield('title-tag')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (config('recommendation.project_name') == 'samt')
    <meta content="سایت رصد آنلاین قیمت اصناف" name="description" />
    @else
    <meta content="سایت توسعه تعاون روستایی" name="description" />
    @endif
    <meta content="Mohammadreza Mahdavi" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/material/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/admin/material/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('assets/admin/material/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/admin/material/css/bootstrap-dark-rtl.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{ asset('assets/admin/material/css/app-dark-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
    @yield('styles-head')
    <script src="{{ asset('assets/moment-time/moment.min.js') }}"></script>
    <script src="{{ asset('assets/moment-time/moment-timezone-with-data.min.js') }}"></script>
    <script type="text/javascript">

        /***********************************************
        * Local Time script- By Dynamic Drive (http://www.dynamicdrive.com)
        * Please keep this notice intact
        * Visit http://www.dynamicdrive.com/ for this script and 100s more.
        ***********************************************/
        
        
        function showLocalTime(container, zoneString, formatString){
            var thisobj=this
            this.container=document.getElementById(container)
            this.localtime = moment.tz(new Date(), zoneString)
            this.formatString = formatString
            this.container.innerHTML = this.localtime.format( this.formatString )
            setInterval(function(){thisobj.updateContainer()}, 1000) //update container every second
        }
        
        showLocalTime.prototype.updateContainer=function(){
            this.localtime.second(this.localtime.seconds() + 1 )
            this.container.innerHTML = this.localtime.format( this.formatString )
        }
        
        
        </script>    
    <!-- icons -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>