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
            <div><?php echo ($connum); ?></div>
        </div>

        <div class="col-xs-5 col-sm-8 col-md-5 col-lg-5">
            <br/>


            <?php if($check['ischeck']==1){ ?>

            <span id="checkin" class="btn-sign-h" style="font-size: 20px;padding-top: 10px">已签到</span>

            <?php }else{ ?>

            <a href="javascript:void(0)" id="checkin" onclick="checkin()" class="btn-sign">签到</a>

            <?php } ?>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="sign-wrap" style="display:none" id="checkdetail">

            <i class="arrow-y"></i>

            <div class="sign-box" style="text-align: center">

                <h3 id="checkinfo" style="font-size: 20px">
                    <?php if($check['ischeck']){ ?>
                    签到成功
                    <?php }else{ ?>
                    未签到
                    <?php } ?>
                </h3>

                <p>
                    连签<span id="con_num"><?php echo ($connum); ?></span>天，累签<span id="total_num"><?php echo ($totalnum); ?></span>天，超<?php echo ($over_rate); ?>用户
                </p>

            </div>
        </div>
    </div>
</div>


<script>
    var isshow = 1;
    $(function () {
        var ischeck = "<?php echo ($check['ischeck']); ?>";
        if (ischeck == "1") {
            $('#checkdetail').hover(function () {
                isshow = 2;
            }, function () {
                setTimeout(function () {
                    if (isshow == 1) {
                        $('#checkdetail').hide();
                    }
                    isshow = 1;
                }, 100);
            });

            $('#checkin').hover(function () {
                $('#checkdetail').show();
            }, function () {
                setTimeout(function () {
                    if (isshow == 1) {
                        $('#checkdetail').hide();
                    }
                    isshow = 1;
                }, 100);
            });
        }
    });

    function checkin() {
        $('#checkin').text('已签到');
        $('#checkin').attr('onclick', '');
        $('#checkin').attr('class', 'btn-sign-h');
        $('#checkinfo').text('签到成功');

        $.post("<?php echo addons_url('Checkin://Checkin/check_in');?>", {}, function (res) {

                    if (res) {
                        var connum = res;
                        $('#con_num').text(connum);
                        $('#con_num_day').text(connum);
                        //$('#total_num').text(totalnum);
                        $('#checkdetail').hover(function () {
                            isshow = 2;
                        }, function () {
                            setTimeout(function () {
                                if (isshow == 1) {
                                    $('#checkdetail').hide();
                                }
                                isshow = 1;
                            }, 100);
                        });
                        $('#checkin').hover(function () {
                            $('#checkdetail').show();
                        }, function () {
                            setTimeout(function () {
                                if (isshow == 1) {
                                    $('#checkdetail').hide();
                                }
                                isshow = 1;
                            }, 100);
                        });
                    }
                    location.reload();
                }
        )
        ;

    }
</script>