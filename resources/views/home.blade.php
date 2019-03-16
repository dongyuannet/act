<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>{{$act['title']}}</title>
    
    <!--弹窗0--->
    <link href="/huodong/css/component.css" rel="stylesheet">
    <!--弹窗0--->
	<link href="/huodong/css/reset.css" rel="stylesheet">
    <link href="/huodong/css/style.css" rel="stylesheet">
    <script src="/huodong/js/new_file.js" type="text/javascript" charset="utf-8"></script>	
    
 
</head>
<body>

<!-----轮播------->
<div class="flexslider"> 
    <ul class="slides"> 
        @foreach($act->pics as $k=>$v):
            <li><img src="/upload/{{$v}}" /></li>
        @endforeach
    </ul> 
</div>
<!-----轮播-end------>

<!-----轮播-end------>
<div class="wrap">
	<div class="box" >
    	<div class="A-title">{{$act['title']}}</div>
        <div class="A-fix fix">
        	<div class="A-fl fl" style="background: none">热门指数：@for($i=1;$i<=$act->points;$i++)<img src="/huodong/images/A-xing.png" alt="" />@endfor</div>
            <div class="A-fr fr"><span>{{$act['view_num']+$act['base']}}</span>人次已浏览</div>            
        </div>        
        <div class="A-countdown">
            <h3>活动倒计时:</h3>
            <div id="time" class="time fix">
                <span id="day"></span><b>天</b>
                <span id="hour"></span><b>时</b>
                <span id="min"></span><b>分</b>
                <span id="sec"></span><b>秒</b>
            </div>     
        </div>
        <div class="A-sign-up fix">
        	<div class="A-sign-up-fl">正在火热报名中</div>
            <div class="A-sign-up-fr"><a href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">已转发{{$act['zhuan_num']+$act['base']}}次</a></div>        
        </div>        
        <div class="A-site">
        	<p>活动时间：<span>{{date('Y年m月d日 H:i',strtotime($act['start_at']))}} -- {{date('Y年m月d日 H:i',strtotime($act['end_at']))}}</span></p>
            <a href="tel:{{$act['phone']}}" class="p-san">联系电话：<span>{{$act['phone']}}</span></a>
            <a href="https://3gimg.qq.com/lightmap/v1/marker/index.html?type=0&marker=coord%3A{{$act->location_x}}%2C{{$act->location_y}}&key=ER3BZ-KPSAU-EN2VK-BUANH-F3NOO-OBFYG&referer=myapp" style="border:0;" class="p-san">活动地址：<span>{{$act['address']}}</span></a>
        </div>
    </div>
    <div class="B-box" >
    	<div class="B-title fix">
        	<h3>实时报名</h3>
            <p><b>{{$act['sign_num']+$act['base']}}</b>人报名</p>
            <a href="javascript:;" class="md-trigger more" data-modal="modal-3">所有报名</a>
        </div>
        <div class="picMarquee-top">			
			<div class="bd">
				<ul class="picList">
                    @foreach($signup as $v)
                    @if($k<5)
					<li>
						<div class="pic"><img src="{{$v['avator']}}" /></div>
						<div class="title">
                        	<div class="name">{{$v['name']}}</div>
                            <div class="time">{{$v['shi']}}</div>
                        </div>
                        <div class="phone">{{$v['phones']}}</div>
                        <div class="wybm">我已报名</div>
                        <div style="clear:both;"></div>
					</li>
                    @endif
					@endforeach
                    <!-- <li>
                        <div class="pic"><img src="/huodong/images/B-tx.png" /></div>
                        <div class="title">
                            <div class="name">周女士</div>
                            <div class="time">1天前</div>
                        </div>
                        <div class="phone">123****8901</div>
                        <div class="wybm">我已报名</div>
                        <div style="clear:both;"></div>
                    </li> -->
				</ul>
			</div>
		</div>    
    </div>
    <style type="text/css">
        .D-box-ul li a{color: #8d8d8d}
    </style>
    
    <div style="text-align: center;background: #fff;width: 100%;z-index: 99999" id="nav_left_layout">
    <ul class="D-box-ul fix" >
            <li class="y on"><a href="#detail" style="color: #fff">活动详情</a></li>
            <li><a href="#detail2">报名</a></li>
            <li class="z"><a href="javascript:;">抽奖</a></li>  
    </ul>
    </div>
    <div class="D-box" >
        <div class="D-box-tab">
            

            <div class="D-tab" style="display:block;" id="detail" >
                <div class="D-tab-img">
                    <?php echo $act->detail;?>
                    <!-- <img src="/huodong/images/D-hdxq.png" /> -->
                </div>
            </div>
            
            <div class="D-tab" style="display:none;" id="detail2">
                <div class="" style=" padding:25px 0px;">
                    <?php echo $act->detail2;?>
                </div>
            </div>
            <div class="D-tab" style="display:none;">
                <div class="" style=" padding:25px 0px;">
                    抽奖
                </div>
            </div>
            <div class="D-tab" style="display:none;">
                <div class="" style=" padding:25px 0px;">
                    特价爆款
                </div>
            </div>
            
            
            
            
        </div>        
    </div>

    <div class="E-box C-box">
        <div class="C-title fix">
            <h3>活动主会场</h3>
            
        </div>
        <div class="C-bg" style="text-align: center;padding: 50px">
            <img src="/huodong/images/5.png" style="width: 356px;height: 356px">
            <h1 style="line-height: 40px;height: 40px;color: #f00;font-size: 30px;margin-top: 20px">长按识别二维码直达活动主会场</h1>
        </div>
    </div>


    <div class="E-box C-box">
        <div class="C-title fix">
            <h3>积分排名</h3>
            <a href="javascript:;" class="md-trigger more" data-modal="modal-8">更多排名</a>
        </div>
        <div class="C-bg">
            <div class="picMarquee-left">           
                <div class="bd">
                    <ul class="picList">
                        @foreach($reward as $k=>$v)
                        <li>
                            <div class="pic"><img src="/upload/{{$v['pics']}}" > </div>
                            <div class="title">
                                <h4>{{$v['name']}}</h4>
                                <span>{{$jiang[$v['type']]}}</span>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <table class="C-table" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th width="20%" scope="col">名次</th>
                    <th width="20%" scope="col">姓名</th>
                    <th width="20%" scope="col">手机</th>
                    <th width="20%" scope="col">转发</th>
                    <th width="20%" scope="col">积分</th>
                </tr>

                @foreach($scorep as $k=>$v)
                @if($k<5)
                <tr @if($k%2==1)class="tr"@endif>
                    <td><span class="C-pm">{{$k+1}}</span></td>
                    <td>{{$v['name']}}</td>
                    <td><span class="C-Sj">{{$v['phones']}}</span></td>
                    <td>{{$v['zhuan']}}</td>
                    <td>{{$v['score']}}</td>
                </tr>
                @endif
                @endforeach
            </table>
            <div class="C-zhuli fix">
                <div class="C-list w-20p">
                    <h3>积分</h3>
                    <span>0</span>                
                </div>
                <div class="C-list w-25p">
                    <h3>排名</h3>
                    <span>0</span>                
                </div>
                <div class="C-list w-20p">
                    <h3>转发</h3>
                    <span>0</span>                
                </div>
                <a class="C-haoli w-35p" href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">转发得积分</a>
            </div>          
        </div>
        <div class="E-guize fix">
            <div class="E-list col-2">
                <div class="img"><img src="/huodong/images/bao.png" /></div>
                <div class="txt">
                    +300<br />报名
                </div>
            </div>
            <div class="E-list col-2">
                <div class="img"><img src="/huodong/images/zan.png" /></div>
                <div class="txt">
                    +10~20<br />点赞
                </div>
            </div>
            <div class="E-list col-2">
                <div class="img"><img src="/huodong/images/yue.png" /></div>
                <div class="txt">
                    +10~20<br />阅读
                </div>
            </div>
            <div class="E-list col-2">
                <div class="img"><img src="/huodong/images/zhuan.png" /></div>
                <div class="txt">
                    +10~20<br />转发
                </div>
            </div>
            <div class="E-list col-2">
                <div class="img"><img src="/huodong/images/yao.png" /></div>
                <div class="txt">
                    +100<br />邀请
                </div>
            </div>
            <div class="E-list col-2">
                <a href="javascript:;" class="md-trigger" data-modal="modal-13">
                <div class="img"><img src="/huodong/images/guize.png" /></div>
                    <div class="txt" style="color:#0f62c7;">
                        积分<br />规则
                    </div>
                </a>
            </div>            
        </div>
    </div>
    
    <div class="C-box F-box">
        <div class="C-title fix">
            <h3>助力排名</h3>
            <p><b>{{$act['zhu_num']+$act['base']}}</b>人助力</p>
            <a class="C-rules" href="">助力规则</a>
            <a href="javascript:;" class="md-trigger more" data-modal="modal-14">更多排名</a>
        </div>
        <div class="C-bg">
            <div class="picMarquee-left">           
                <div class="bd">
                    <ul class="picList">
                        @foreach($reward as $k=>$v)
                        <li>
                            <div class="pic"><img src="/upload/{{$v['pics']}}" > </div>
                            <div class="title">
                                <h4>{{$v['name']}}</h4>
                                <span>{{$jiang[$v['type']]}}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <table class="C-table" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th width="20%" scope="col">名次</th>
                    <th width="20%" scope="col">姓名</th>
                    <th width="20%" scope="col">手机</th>
                    <th width="20%" scope="col">转发</th>
                    <th width="20%" scope="col">助力</th>
                </tr>
                @foreach($zhulip as $k=>$v)
                @if($k<5)
                <tr @if($k%2==1)class="tr"@endif>
                    <td><span class="C-pm">{{$k+1}}</span></td>
                    <td>{{$v['name']}}</td>
                    <td><span class="C-Sj">{{$v['phones']}}</span></td>
                    <td>{{$v['zhuan']}}</td>
                    <td>{{$v['zhu']}}</td>
                </tr>
                @endif
                @endforeach
               
            </table>
            <div class="C-zhuli fix">
                <div class="C-list w-20p">
                    <h3>助力</h3>
                    <span>0</span>                
                </div>
                <div class="C-list w-25p">
                    <h3>排名</h3>
                    <span>0</span>                
                </div>
                <div class="C-list w-20p">
                    <h3>转发</h3>
                    <span>0</span>                
                </div>
                <a class="C-haoli w-35p" href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">助力享好礼</a>
            </div>
        </div>
    </div>

        
    
</div>

<!---底部漂浮--->
<div class="foot fix">
	<div class="foot-fb w-30p" style="font-size: 28px">
    	<a href="">
        	<img src="/huodong/images/foot.png" /><br />
            商家发布活动
        </a>
    </div>
    <div class="foot-zf w-30p">
    	<a href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">转发助力</a>
    </div>
    <div class="foot-bm">
        <a href="javascript:;" class="md-trigger" data-modal="modal-13">报名享好礼</a>
    </div>
</div>

<!----弹幕-->

<div class="barrager">
    @foreach($danmu as $v):
    <div><span>{{$v['name']}}</span></div>
    @endforeach
</div>

<!---左侧漂浮--->


<div class="main-im">
	<div id="open_im" class="open-im">&nbsp;</div>  	
	<div class="im_main" id="im_main">
    	<div class="side_list fix">    
        	<div class="side_tx"><img src="/huodong/images/B-tx.png" /></div>
            <div class="side_yao">周女士为欧派代言<br />邀请你参加转发助力</div>
            <div class="side_zan"><a href=""><img src="/huodong/images/yao-zan.png" /></a></div>
			<div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭"><img src="/huodong/images/foot-gb.png" /></a></div>
		</div>
	</div>
	
</div>



<div style="position: fixed;right: 10px;top: 20px;width: 60px;z-index: 99999;">
    <ul>
        <li><a class="music-icon music-trigger play" href="javascript:;"><img src="/huodong/images/R-1.png" /></a></li>
    </ul>
</div>
<!---右侧漂浮--->
<div class="R-floating">
	<ul>
        <li><a href=""><img src="/huodong/images/R-2.png" /></a></li>
        <li><a href="tel:12345678901"><img src="/huodong/images/R-3.png" /></a></li>       
        <li class="actGotop"><a href="javascript:;" title="返回顶部"><img src="/huodong/images/R-4.png" /></a></li>
    </ul>
</div>


<!---转发tishi---->
<div id="light" class="white_content">
	<div class="wthite-img"><img src="/huodong/images/you.png" /></div>
    <div class="whitetxt">
        <div class="white-txt">
            <p><img src="/huodong/images/fen.png" />温馨提示</p>
            <p>点击右上角立即分享</p>
        </div>
        <a class="white-gb" href="javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">关闭</a>    
    </div>
</div> 
<div id="fade" class="black_overlay"></div> 
    
<!---转发tishi-end--->


<!---实时排名---->
<div class="md-modal md-effect-3" id="modal-3">
    <div class="md-content">
    	<div class="md-tan fix">
        	<h3>已报名用户</h3>
            <p><b>{{$act['sign_num']+$act['base']}}</b>人报名</p>
	        <button class="md-close"></button>
        </div>
        <div class="mb-list" id="signup">			
			
            <ul class="picList" id="signupli">
                @foreach($signup as $v)
                    <li>
                        <div class="pic"><img src="{{$v['avator']}}" /></div>
                        <div class="title">
                            <div class="name">{{$v['name']}}</div>
                            <div class="time">{{$v['shi']}}</div>
                        </div>
                        <div class="phone">{{$v['phones']}}</div>
                        <div class="wybm">我已报名</div>
                        <div style="clear:both;"></div>
                    </li>
                @endforeach
                
                    
            </ul>
            <!-- <div class="jin">--- 仅显示最近10条信息 ---</div> -->
		</div>        
	</div>
</div>



<!---助力排名---->
<div class="md-modal md-effect-14" id="modal-14">
    <div class="md-content">
    	<div class="md-tan fix">
        	<h3>已助力用户</h3>
            <p class="zhu"><b>{{$act['zhu_num']+$act['base']}}</b>人助力</p>
	        <button class="md-close"></button>
        </div>
        <div class="mb-list" id="zhulist">			
			<table class="C-table" width="100%" border="0" cellspacing="0" cellpadding="0" id="zhulisttable">               

                @foreach($zhulip as $k=>$v)
                <tr @if($k%2==1)class="tr"@endif>
                    <td><span class="C-pm">{{$k+1}}</span></td>
                    <td>{{$v['name']}}</td>
                    <td><span class="C-Sj">{{$v['phones']}}</span></td>
                    <td>{{$v['zhu']}}</td>
                </tr>
                @endforeach

            </table>
            <!-- <div class="jin" style="margin-top:25px;">--- 仅显示最近10条信息 ---</div> -->
		</div>        
	</div>
</div>
<!---助力排名---->


<!---积分排名---->
<div class="md-modal md-effect-8" id="modal-8">
    <div class="md-content">
    	<div class="md-tan fix">
        	<h3>积分用户</h3>
            <!-- <p class="zhu"><b>88888</b>人积分</p> -->
	        <button class="md-close"></button>
        </div>
        <div class="mb-list" id="scorelist">			
			<table class="C-table" width="100%" border="0" cellspacing="0" cellpadding="0" id="scorelisttable"> 

                @foreach($scorep as $k=>$v)
                <tr @if($k%2==1)class="tr"@endif>
                    <td><span class="C-pm">{{$k+1}}</span></td>
                    <td>{{$v['name']}}</td>
                    <td><span class="C-Sj">{{$v['phones']}}</span></td>
                    <td>{{$v['score']}}</td>
                </tr>
                @endforeach



                
            </table>
            <!-- <div class="jin" style="margin-top:25px;">--- 仅显示最近10条信息 ---</div> -->
		</div>        
	</div>
</div>
<!---积分---->

<!---填写---->
<div class="md-modal md-effect-13" id="modal-13">
    <div class="md-content">
    	<div class="md-tan fix">
        	<h3>填写您的信息</h3>
            <p><b>{{count($brand)}}</b>个品牌</p>
	        <button class="md-close"></button>
        </div>
        <div class="mb-tian">
        	<div class="mb-xzpp" id="dress-size">
                <ul id="accordion" class="accordion">
                    <li>
                        <div class="link mb-xz"><img src="/huodong/images/xuanze.gif" /></div>
                        <div class="submenu">                            
                            <div class="choose">
                                <form action="" method="get">                                    
                                    <div class="choosebox">
                                        <ul class="fix" id="ybrand">
                                            @foreach($brand as $v)
                                            <li>
                                                <input type="radio" name="name" value="{{$v['name']}}" id="" />
                                                <a href="javascript:void(0);" class="size_radioToggle"><span class="value">{{$v['name']}}</span></a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>		
                                </form>	
                            </div>
                        </div>
                    </li>
				</ul>
                
                <div class="mb-yx"><img src="/huodong/images/nn.png" />&nbsp;&nbsp;已选择意向品牌</div>                
                <div class="choosetext mb-yj"><span>意向品牌</span></div>
            </div>
            <div class="mb-sr">
            	<form>
	            	<div class="shu-ru fix">
                    	<span>姓名</span>
                        <input class="txt" name="" type="text" placeholder="输入姓名" />
                    </div>
                    <div class="shu-ru fix">
                    	<span>手机</span>
                        <input class="txt" name="" type="text" placeholder="输入手机号" />
                        <b style="height: 45px;line-height: 45px;float: right;font-size: 24px;color: #f00">获取验证码</b>
                    </div>  
                    <div class="shu-ru fix">
                        <span>验证码</span>
                        <input class="txt" name="" type="text" placeholder="输入验证码" />
                    </div> 
                    <div class="shu-ru fix">
                        <span>推荐人</span>
                        <input class="txt" name="" type="text" placeholder="可填" />
                    </div> 
                
					<input class="sub" name="" type="submit" value="立即报名" style="height: 80px" />
                </form>
            </div>
        </div>
             
	</div>
</div>

  
  
	<div class="md-overlay"></div>
  <!-- the overlay element --> 
<!---实时排名-end--->

<!---音乐--->
<div class="audio-box" style="display: none">
    <audio src="/upload/{{$act->mp3}}" id="Jaudio" class="media-audio" autoplay preload loop="loop"></audio>
    <input type="button" onclick="document.getElementById('Jaudio').play()" value='播放' id="play-btn"  />
    <input type="button" onclick="document.getElementById('Jaudio').pause()" value='停止' id="stop-btn" />
</div>
<!---音乐-end--->





<!--js-基本.js-->
<script src="/huodong/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript"> 
$.fn.smartFloat = function() {
    var position = function(element) {
        var top = element.position().top, pos = element.css("position");
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > top) {
                if (window.XMLHttpRequest) {
                    element.css({
                        position: "fixed",
                        top: 0
                    }); 
                } else {
                    element.css({
                        top: scrolls
                    }); 
                }
            }else {
                element.css({
                    position: pos,
                    top: top
                }); 
            }
        });
};
    return $(this).each(function() {
        position($(this));                       
    });
};
//绑定
$("#nav_left_layout").smartFloat();
</script>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>
        function autoPlayVideo(){
            wx.config({
                debug:false,
                appId:"",
                timestamp:1,
                nonceStr:"",
                signature:"",
                jsApiList:[]
            });
            wx.ready(function(){
                var autoplayVideo=document.getElementById("audio");
                autoplayVideo.play()
            })
        };
        autoPlayVideo();
    </script>
 <!---点击展开--->
<script>
	$(function() {
		var Accordion = function(el, multiple) {
			this.el = el || {};
			this.multiple = multiple || false;
	
			// Variables privadas
			var links = this.el.find('.link');
			// Evento
			links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
		}
	
		Accordion.prototype.dropdown = function(e) {
			var $el = e.data.el;
				$this = $(this),
				$next = $this.next();
	
			$next.slideToggle();
			$this.parent().toggleClass('open');
	
			if (!e.data.multiple) {
				$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
			};
		}	
	
		var accordion = new Accordion($('#accordion'), false);
	});
</script>

<script type="text/javascript">
$(function(){   
  $('.choosebox li a').click(function(){
	  var thisToggle = $(this).is('.size_radioToggle') ? $(this) : $(this).prev();
	  var checkBox = thisToggle.prev();
	  checkBox.trigger('click');
	  $('.size_radioToggle').removeClass('current');
	  thisToggle.addClass('current');
	  return false;
  });		
});

$(".choosebox li a").click(function(){
  var text = $(this).html();
  $(".choosetext span").html(text);
  $("#result").html("" + getSelectedValue("dress-size"));
});
		  
function getSelectedValue(id){
  return 
  $("#" + id).find(".choosetext span.value").html();
}
</script>


 <!---左侧漂浮--->
<script>
$(function(){
	$('#close_im').bind('click',function(){
		$('#main-im').css("height","0");
		$('#im_main').hide();
		$('#open_im').show();
	});
	$('#open_im').bind('click',function(e){
		$('#main-im').css("height","272");
		$('#im_main').show();
		$(this).hide();
	});
	$('.go-top').bind('click',function(){
		$(window).scrollTop(0);
	});
	$(".weixing-container").bind('mouseenter',function(){
		$('.weixing-show').show();
	})
	$(".weixing-container").bind('mouseleave',function(){        
		$('.weixing-show').hide();
	});
});
</script>
<!-----轮播------->
<script type="text/javascript" src="/huodong/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    $(function() {
        $(".flexslider").flexslider({
            animation:"slide",
            directionNav:false,
            slideshowSpeed: 4000, //展示时间间隔ms
            animationSpeed: 400, //滚动时间ms
            touch: true //是否支持触屏滑动
        });
    });
</script>
<!-----轮播-end------>


<!-----倒计时------->
<script type="text/javascript">
	window.onload = timeOver;
	function timeOver() {
		var day = $("#day").text();//获取到当前<span>中的值，便于后续更改。
		var hour = $("#hour").text();//同上
		var min = $("#min").text();//同上
		var sec = $("#sec").text();//同上
		var newTime = new Date();//当前日期
		var outTime = new Date("{{$act['start_at']}}".replace(/-/g,'/')) //抢购开始时间s
		var time = parseInt((outTime.getTime() - newTime.getTime()) / 1000);// 抢购开始时间-当前日期。因为getTime()返回的是毫秒数，1000毫秒=1秒。所以time得到的时间差是以秒为单位的。
		if(time >= 0) {
			day = parseInt((time/3600)/24);//计算天数
			hour = parseInt(time/3600%24); //计算小时数
			min =parseInt(time/60%60); //计算分钟数
			sec =parseInt(time%60); //计算秒数
			if(day <= 9) day = '0' + day;//如果为个位数，就在前面加个0
			if(hour <= 9) hour = '0' + hour;//同上
		if(min <= 9) min = '0' + min; //同上
			if(sec <= 9) sec = '0' + sec; //同上
		}
		$("#sec").text(sec);//用计算结果替换掉原来的字
		$("#min").text(min);//同上
		$("#hour").text(hour);//同上
		$("#day").text(day);//同上
		setTimeout(timeOver, 1000);//每个一秒钟执行一次，
	}

    var p1;
    var p2;
    var p3;
    p1 = p2 = p3 = 1
</script>
<!-----倒计时-end------>

<!-- 交互报名 -->
<script type="text/javascript">

    $('#signup').scroll(function(){
        var $this =$(this),
         viewH =$(this).height(),//可见高度
         contentH =$(this).get(0).scrollHeight,//内容高度
         scrollTop =$(this).scrollTop();//滚动高度
        if(contentH - viewH - scrollTop <= 100) { //到达底部100px时,加载新内容
            setTimeout(function(){
                var str = ""
                p1++
                $.ajax({
                    url:'/morebm',
                    type:'get',
                    data:{'page':p1},
                    dataType:'json',
                    async:true,
                    success:function(json){
                        if(json.data){
                            $.each(json.data,function(i,v){
                                str+="<li>"+
                                    "<div class='pic'><img src='"+v.avator+"'></div>"+
                                    "<div class='title'>"+
                                        "<div class='name'>"+v.name+"</div>"+
                                        "<div class='time'>"+v.shi+"</div>"+
                                    "</div>"+
                                    "<div class='phone'>"+v.phones+"</div>"+
                                    "<div class='wybm'>我已报名</div>"+
                                    "<div style='clear:both;'></div>"+
                                "</li>"
                            })

                            $('#signupli').append(str)
                            
                        }
                        
                    }
                })
            },1000)
        }
    })

    $('#scorelist').scroll(function(){
        var $this =$(this),
         viewH =$(this).height(),//可见高度
         contentH =$(this).get(0).scrollHeight,//内容高度
         scrollTop =$(this).scrollTop();//滚动高度
        if(contentH - viewH - scrollTop <= 100) { //到达底部100px时,加载新内容
            setTimeout(function(){
                var str = ""
                p2++
                $.ajax({
                    url:'/morescorep',
                    type:'get',
                    data:{'page':p2},
                    dataType:'json',
                    async:true,
                    success:function(json){
                        if(json.data){
                            $.each(json.data,function(i,v){
                                // console.log(json.data)
                                var c = ""
                                if(v.id%2==0) c = "class='tr'" 
                                str+="<tr "+c+">"+
                                    "<td><span class='C-pm'>"+v.id+"</span></td>"+
                                    "<td>"+v.name+"</td>"+
                                    "<td><span class='C-Sj'>"+v.phones+"</span></td>"+
                                    "<td>"+v.score+"</td>"+
                                "</tr>"

                                
                            })

                            $('#scorelisttable').append(str)
                            
                        }
                        
                    }
                })
            },1000)
        }
    })

    $('#zhulist').scroll(function(){
        var $this =$(this),
         viewH =$(this).height(),//可见高度
         contentH =$(this).get(0).scrollHeight,//内容高度
         scrollTop =$(this).scrollTop();//滚动高度
        if(contentH - viewH - scrollTop <= 100) { //到达底部100px时,加载新内容
            setTimeout(function(){
                var str = ""
                p3++
                $.ajax({
                    url:'/morezhulip',
                    type:'get',
                    data:{'page':p3},
                    dataType:'json',
                    async:true,
                    success:function(json){
                        if(json.data){
                            $.each(json.data,function(i,v){
                                // console.log(json.data)
                                var c = ""
                                if(v.id%2==0) c = "class='tr'" 
                                str+="<tr "+c+">"+
                                    "<td><span class='C-pm'>"+v.id+"</span></td>"+
                                    "<td>"+v.name+"</td>"+
                                    "<td><span class='C-Sj'>"+v.phones+"</span></td>"+
                                    "<td>"+v.zhu+"</td>"+
                                "</tr>"

                                
                            })

                            $('#zhulisttable').append(str)
                            
                        }
                        
                    }
                })
            },1000)
        }
    })


</script>


<!-----报名上滚动------>
<script type="text/javascript" src="/huodong/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
	jQuery(".picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:30});
</script>


<!-----助力排名滚动------>
<script type="text/javascript">
	jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:4,interTime:30});
</script>

<!-----助力排名滚动------>
<script type="text/javascript">
$(function(){	
	$(window).scroll(function() {		
		if($(window).scrollTop() >= 0){
			$('.actGotop').fadeIn(300); 
		}else{    
			$('.actGotop').fadeOut(300);    
		}  
	});
	$('.actGotop').click(function(){
	$('html,body').animate({scrollTop: '0px'}, 800);});	
});
</script>


<!-----弹幕------>
<script type="text/javascript">
    $(function () {
        $(".barrager").barrager()
    });
    (function () {
        var Barrager = function (ele,options) {
            var defaults = {
                color:["#ff9999","#35d2f4","#9ee353","#9d77ff","#4785d9","#ff9333","#5bdea8","#51befc"],
                wrap:ele
            };
            this.settings = $.extend({},defaults,options||{});
            this._init();
            this.bindEven();
        };
        Barrager.prototype = {
            _init:function () {
                var item = $(this.settings.wrap).find("div");
                for(var i = 0;i<item.length;i++){
                    item.eq(i).css({
                        top:this.getReandomTop()+"px",
                        color:this.getReandomColor(),
                        fontSize:this.getReandomSize()+"px",
                        textShadow:'0 1px #fff, 1px 0 #fff, -1px 0 #fff, 0 -1px #fff'

                    });
                    item.eq(i).css({
                        right:-item.eq(i).width()
                    })
                }
                this.randomTime(0);
            },
            bindEven:function () {
                var _this = this;
                $(".addBarrager .submit").on('click',function () {
                    _this._click(_this);
                });
            },
            getReandomColor:function () {
                var max = this.settings.color.length;
                var randomNum = Math.floor(Math.random()*max);
                return this.settings.color[randomNum];
            },
            getReandomTop:function () {
                var top = (Math.random()*450).toFixed(1);
                return top;
            },
            getReandomSize:function () {
                var size = (20+Math.random()*28);
                return size;
            },
            getReandomTime:function () {
                var time = Math.floor((8+Math.random()*10));
                return time*1000;
            },
            randomTime:function (n) {
                var obj = $(this.settings.wrap).find("div");
                var _this = this;
                var len = obj.length;
                if(n>=len){
                    n=0;
                }
                setTimeout(function () {
                    n++;
                    _this.randomTime(n)
                },1000);
                var item = obj.eq(n),_w = item.outerWidth(!0);
                item.animate({
                    left:-_w
                },_this.getReandomTime(),"linear",function () {
                    item.css({right:-_w,left:""});
                    _this.randomTime(n)
                });
            },
            _click:function (obj) {
                var _this = obj;
                var _val = $(".barVal");
                if(_val.val() == ""){
                    alert("");
                    return false;
                }
                $(_this.settings.wrap).append("<div><span class='new'>"+_val.val()+"</span></div>");
                _this._init();
                _val.val("");
            }
        };
        $.fn.barrager = function (opt) {
            var bger = new Barrager(this,opt);
        }
    })(jQuery);
</script>



<!--背景音乐---->
<script type="text/javascript">
$(document).ready(function(){
    $('.page-1 .pic').animate({
        width:"120%",
        marginLeft:"-20%"
    },5000);
    $('.page-1 .title1').fadeIn(2000);
    setTimeout(function(){
        $('.page-1 .title2').fadeIn(2000);
    },2000)
    $(".music-trigger").click(function(document){
       if($(this).hasClass("play")){
          $('#stop-btn').click();
          $(this).removeClass("play").addClass("stop");
          $(this).find("img").attr('src','/huodong/images/R-1-close.png')
       }
       else
       {
           $('#play-btn').click();
           $(this).removeClass("stop").addClass("play");
           $(this).find("img").attr('src','/huodong/images/R-1.png')
       }
    })
});

	function audioAutoPlay(id){
    	var audio = document.getElementById(id),
    		play = function(){
    			audio.play();
    			document.removeEventListener("touchstart",play, false);
    		};
    	audio.play();
        document.addEventListener("WeixinJSBridgeReady", function () {
            play();
        }, false);
        document.addEventListener('YixinJSBridgeReady', function() {
        	play();
        }, false);
        document.addEventListener("touchstart",play, false);
    }
    audioAutoPlay('Jaudio');

</script>

<!--弹窗------>
<script>
	$('.D-box-ul li').mouseover(function(){
	var el_index=$(this).parent().find('li').index(this);
	$(this).parent().find('li').removeClass('on');
	$(this).addClass('on');
	$(this).parent().parent().parent().find(".D-tab").hide();
	$(this).parent().parent().parent().find(".D-tab").eq(el_index).show();

	$(this).parent().find('a').css({color:'#8d8d8d'})
    $(this).find('a').css({color:'#fff'})
	});
</script>

</body>
<!--弹窗------>

<script src="/huodong/js/classie.js"></script>
<script src="/huodong/js/modalEffects.js"></script>

</html>
