<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Addons/Checkin/View/Css/check.css">

<div class="box1" id="checkdiv">
    <div class="row">
        <div class="col-xs-3 col-sm-4 col-md-3 col-lg-4 text-center">
            <span style="font-size: 48px;padding: 10px 0 0 10px;color: #fff;"
                  class="glyphicon glyphicon-calendar"></span>
        </div>

        <div class="col-xs-2 hidden-sm hidden-md hidden-lg text-center" style="color: #fff; padding-top: 14px;">
            <div><?php echo ($check["week"]); ?></div>
            <div><?php echo ($check["day"]); ?></div>
        </div>

        <div class="col-xs-2 col-md-4 col-lg-3 hidden-sm text-center" style="color: #fff; padding-top: 14px;">
            <div>DAYS</div>
            <div>0</div>
        </div>

        <div class="col-xs-5 col-sm-8 col-md-5 col-lg-5">
            <br/>
            <a href="<?php echo U('Home/User/login');?>" id="checkin" class="btn-sign">签到</a>
        </div>

    </div>
</div>