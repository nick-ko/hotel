<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <script src='{{asset('back/calendar/dhtmlxscheduler.js?v=5.2.1')}}' type="text/javascript" charset="utf-8"></script>
    <script src='{{asset('back/calendar/ext/dhtmlxscheduler_timeline.js?v=5.2.1')}}' type="text/javascript" charset="utf-8"></script>
    <script src='{{asset('back/calendar/codebase/ext/dhtmlxscheduler_tooltip.js?v=5.2.1')}}' type="text/javascript" charset="utf-8"></script>
    <link rel="icon" href="{{asset('front/image/logo.jpg')}}" type="image/png">
    <link rel='stylesheet' type='text/css' href='{{asset('back/calendar/dhtmlxscheduler_material.css?v=5.2.1')}}'>


    <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }

    </style>
</head>
<body>
<body onload="init();">
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">&nbsp;</div>
        <div class="dhx_cal_next_button">&nbsp;</div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_cal_date"></div>
        <img src="{{URL::to('front/image/logo.jpg')}}" alt="" style="height: 80px" />
    </div>
    <div class="dhx_cal_header">
    </div>
    <div class="dhx_cal_data">
    </div>
</div>
<script src="{{asset('back/vendor/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript">
    function init() {

        scheduler.locale.labels.timeline_tab = "Timeline";
        scheduler.locale.labels.section_custom="Section";
        scheduler.config.details_on_create=true;
        scheduler.config.details_on_dblclick=true;


        scheduler.attachEvent("onTemplatesReady", function(){
            scheduler.xy.scale_height = 35;
        });
        //===============
        //Configuration
        //===============
        var result = <?php print_r(json_encode($result)) ?>;
        var sections=[];
        $.each( result, function( index, value ){
            sections.push({key:value.id, label:value.room_name})
        });

        var days = 7;
        scheduler.createTimelineView({
            name:	"timeline",
            x_unit:	"hour",
            x_date:	"%H:%i",
            x_step:	1,
            x_size: 24*days,
            scrollable:true,
            scroll_position: new Date(),
            column_width:70,
            x_length:	24*days,
            y_unit:	sections,
            y_property:	"book_room",
            render:"bar",
            event_dy: "full",
            second_scale:{
                x_unit: "day", // unit which should be used for second scale
                x_date: "%d %F %Y" // date format which should be used for second scale, "July 01"
            }
        });



        //===============
        //Data loading
        //===============
        scheduler.config.lightbox.sections=[
            {name:"description", height:130, map_to:"text", type:"textarea" , focus:true},
            {name:"custom", height:23, type:"select", options:sections, map_to:"id" },
            {name:"time", height:72, type:"time", map_to:"auto"}
        ];
        scheduler.config.date_format = "%Y-%m-%d %H:%i:%s";
        scheduler.init('scheduler_here',new Date(),"timeline");
        scheduler.load("/dashboard/data-room", "json");
    }
</script>
</body>

