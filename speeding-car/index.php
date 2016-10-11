<?php
header("Content-type:text/html;charset=utf-8");

function httpGet($url) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	$res = curl_exec($curl);
	curl_close($curl);
	return $res;
}

if (!$_GET["openid"]) {
	//获取网页授权的token
	$appid="wx042f94ed8dd6031f";
	$appsecret="b1c83db617209319ffea0c44685d00c1";
	$code = $_GET["code"];
	$api = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$appsecret}&code={$code}&grant_type=authorization_code";
	$json = httpGet($api);
	//获取用户的基本信息
	$arr=json_decode($json,true);
	//获取网页授权的token
	$token=$arr["access_token"];
	//获取关注者的openid
	$openid=$arr["openid"];
	
	$api="https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}&lang=zh_CN";
	$json=httpGet($api);
	$userInfo=json_decode($json,true);
} else {
	$openid = $_GET["openid"];
}
?>
<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>旋风车手</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/css8.css" />
		<link rel="stylesheet" type="text/css" href="css/animatelast.css" />
	</head>

	<body>
		<div id="wrap">
			<img src="img/shouye.png" alt="" id="index" />
			<!--page1;2;3;4-->
			<div id="page_header">
				<!---------------------------page-1-------------------------------------->
				<div class="page_1">
					<img src="img/page1_bg.png" alt="" class="page1_bg" />
					<img src="img/page1_logo.png" alt="" id="logo" />
					<img src="img/page1_title.png" alt="" class="page1_title" />
					<img src="img/page1_txt1.png" alt="" class="page1_txt1" />
					<img src="img/page1_txt2.png" alt="" class="page1_txt2" />
					<img src="img/page1_btn.png" alt="" class="page1_btn1" />
					<img src="img/page1_txt3.png" alt="" class="guize1" />
				</div>
				<!---------------------------page-2-------------------------------------->
				<div class="page_2">
					<div class="page2bg">
						<img src="img/page2_30stiaozhan.png" alt="" class="page2_txt1" />
						<img src="img/page2_shanchu.png" alt="" class="page2_close" />
						<img src="img/page2_guize.png" alt="" class="page2_gz" />
						<img src="img/page2_tiaozhan.png" alt="" class="page2_btn" />
					</div>
				</div>
				<!---------------------------page-3-------------------------------------->
				<div class="page_3">
					<img src="img/page3_bg.png" alt="" class="page3_bg" />
					<img src="img/page1_logo.png" alt="" id="logo" />
					<img src="img/page3_txt1.png" alt="" class="page3_txt1" />
					<img src="img/page3_txt2.png" alt="" class="page3_txt2" />
					<img src="img/page3_btn.png" alt="" class="page3_btn" />
					<img src="img/page3_gz.png" alt="" class="page3_gz" />
				</div>
				<!---------------------------message-------------------------------------->
				<div id="message">
					<div class="page14_bg"></div>
					<form>
						<h3>登录信息</h3>
						<div>昵称：<input type="text" class="gamename" placeholder="昵称" /></div>
						<div>邮箱：<input type="text" class="email" / placeholder="邮箱"></div>
						<div>密码：<input type="password" class="password" placeholder="密码" /></div>
						<div class="login">登录</div>
					</form>
					<img src="img/page3_btn.png" alt="" class="gamestart" />
				</div>
				<!---------------------------page-4-1-------------------------------------->
				<div class="page_4_1">
					<!--赛道-->
					<img src="img/page4_1sd.png" alt="" class="img_1" />
					<!--起跑线-->
					<img src="img/page4_1qd.png" alt="" class="img_7" />
					<!--计时器-->
					<img src="img/page4_1jsq.png" alt="" class="img_4" />
					<!--准备-->
					<img src="img/page4_1txt1.png" alt="" class="img_6" />
					<!--赛车-->
					<img src="img/page4_1zc.png" alt="" class="img_8" />
					<!--左侧按钮-->
					<img src="img/page4_1leftbtn.png" alt="" class="img_9" />
					<!--右侧按钮-->
					<img src="img/page4_1rightbtn.png" alt="" class="img_10" />
					<!--加速按钮-->
					<img src="img/page4_1jsbtn.png" alt="" class="img_11" />
					<!--减速按钮-->
					<img src='img/page4_1fs.png' class='speed' style="display: none;" />
					<!--倒计时-->
					<div class="time1">0:0:30</div>
					<!--红绿灯-->
					<div class="lights">
						<img src="img/page4_1hld.png" alt="" class="img_5" />
						<img src="img/page_4_1red0.png" alt="" class="img_12" />
						<img src="img/page_4_1yellow1.png" alt="" class="img_13" />
						<img src="img/page_4_1green1.png" alt="" class="img_14" />
					</div>
				</div>
				<!--滚动的赛道-->
				<div class="move">
					<img src="img/page4_1sd.png" alt="" class="img_1" />
					<img src="img/page4_1sd.png" alt="" class="img_2" />
					<img src="img/page4_1sd.png" alt="" class="img_3" />
				</div>
			</div>
			<!------------------------------------------------------------------------------------------>
			<div id="page_middle">
				<!--page5a1-->
				<div class="page_5a1">
					<img src="img/page5_1bg.png" alt="" id="bg5" />
					<img src="img/page1_logo.png" alt="" id="logo" />
					<img src="img/page5_1guoguanla.png" alt="" class="page5a1_txt1" />
					<div class="page5a1_txt2">您共闯过了 <span class="color" id="hinder">53</span> 个障碍物</div>
					<div class="page5a1_txt3">胜出全国 <span class="color" id="bfb">70%</span> 的玩家</div>
					<div class="page5_txt">
						<div class="page5a1_txt4">
							<p>快邀请你的朋友做导师，<br>
								<b class="color">只要有1人</b>让你晋级即可<br> 领取金钥匙抽大奖啦！
							</p>
						</div>
						<img src="img/page5a1_person.png" alt="" class="person5a" />
					</div>
					<img src="img/page5_1btn1.png" alt="" class="page5_1btn1" />
					<img src="img/page5_1btn2.png" alt="" class="page5_1btn2" />
					<img src="img/page5a1_news.png" alt="" class="page5_news" />
				</div>
				<!---------------------------------------------------------------------->
				<!--page5a2-->
				<div class="page_5a2">
					<div class="page14_bg"></div>
					<p class="title">
						<p class="titlep">淘汰还是晋级</p>
						<p class="titlep">就看他们的啦</p>
					</p>
					<img src="img/page5_2jiantouxian.png" alt="" class="page5_a2img" />
					<img src="img/page5_2xiaoren.png" alt="" class="person5a2" />
					<p class="txt">
						<p class="txtp"><b>只要有一位好友</b>选择 "晋级"</p>
						<p class="txtp">你即可获参与免费地中海风情游抽奖哦！</p>
					</p>
					<img src="img/page5_1btn1.png" alt="" class="page5a2_btn" />
				</div>
				<!---------------------------------------------------------------------->
				<!--page5b-->
				<div class="page_5b">
					<img src="img/page5b_bg.png" alt="" id="bg5b" />
					<img src="img/page1_logo.png" alt="" id="logo" />
					<img src="img/page5b_txt2.png" alt="" class="page5b_txt1" />
					<div class="page5b_txt2">您只闯过了 <span class="color" id="barnum">3</span> 个障碍物</div>
					<div class="page5b_txt3">胜出全国 <span class="color bfb">7%</span> 的玩家</div>
					<div class="page5a1_txt4" id="page5b_txt4">
						<p><span class="color">赶紧再来1次，邀请好友1<br>
							起玩</span>只要有1人晋级即可<br> 领取金钥匙并抽大奖啦！
						</p>
					</div>
					<img src="img/page5b_person.png" alt="" class="person5a" id="page5b_txt4" />
					<img src="img/page5b_btn1.png" alt="" class="page5b_btn1" id="again" />
					<img src="img/page5b_btn2.png" alt="" class="page5_1btn2" />
				</div>
				<!---------------------------------------------------------------------->
				<!--page7:排行榜-->
				<div class="page_7">
					<div class="page14_bg"></div>
					<img src="img/page1_title.png" alt="" class="page7_title" />
					<img src="img/page7_close.png" alt="" class="page7_close" />
					<div class="page7_list">
						<div><img src="img/page7_phb.png" alt="" /></div>
						<ul class="page7_ul1">
							<li>名次</li>
							<li>微信昵称</li>
							<li>分数</li>
						</ul>
						<ul class="page7_ul" id="ul">
							<li class="paiming">10</li>
							<li class="myname">魔鬼</li>
							<li><span class="barnum">0</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>1</li>
							<li class="nameone">魔鬼</li>
							<li><span class="scone">38</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>2</li>
							<li class="nametwo">魔鬼</li>
							<li><span class="sctwo">38</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>3</li>
							<li class="namethree">魔鬼</li>
							<li><span class="scthree">38</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>4</li>
							<li class="namefour">魔鬼</li>
							<li><span class="scfour">38</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>5</li>
							<li class="namefive">魔鬼</li>
							<li><span class="scfive">38</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>6</li>
							<li class="namesix">魔鬼</li>
							<li><span class="scsix">38</span>0</li>
						</ul>
						<ul class="page7_ul">
							<li>7</li>
							<li class="nameevent">魔鬼</li>
							<li><span class="scevent">38</span>0</li>
						</ul>
						<ul>
							<li>8</li>
							<li class="nameeight">魔鬼</li>
							<li><span class="sceight">38</span>0</li>
						</ul>
					</div>
				</div>
			</div>
			<!--page8,9,10,11,12,13,14,15,16-->
			<div id="page_last">
				<img src="img/page8_bg.png" alt="" id="bg5" />
				<!--自己新添加的一页-->
				<div id="new_page">
					<img src="img/page3_bg.png" alt="" id="bg5" />
					<img src="img/page1_title.png" alt="" class="page7_title" />
					<div class="page7_list">
						<p class="p">支援列表</p>
						<ul class="page7_ul1">
							<li>头像</li>
							<li>微信昵称</li>
							<li>请求支援</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgone"/></li>
							<li><span class="nameone">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgtwo"/></li>
							<li><span class="nametwo">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgthree"/></li>
							<li><span class="namethree">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgfour"/></li>
							<li><span class="namefour">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgfive"/></li>
							<li><span class="namefive">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgsix"/></li>
							<li><span class="namesix">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul class="newul">
							<li><img src="img/touxiang.jpg" alt="" class="imgevent"/></li>
							<li><span class="nameevent">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
						<ul>
							<li><img src="img/touxiang.jpg" alt="" class="imgeight"/></li>
							<li><span class="nameeight">魔鬼</span></li>
							<li class="help">
								<div class="button">请求支援</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!---------------------------------------------------------------------->
			<!--page8-->
			<div class="page_8">
				<img src="img/page1_logo.png" alt="" id="logo" />
				<div class="txt_one">
					<span>你的好友</span>
					<span>魔鬼</span>
					<h1>邀请您做TA的导师</h1>
				</div>
				<img src="img/page8_biao.png" alt="" class="clock" />
				<div class="txt_two">
					<h3>TA在《30秒赛车挑战》中</h3>
					<span>闯过了 <span class="color">53</span> 个障碍物</span><br>
					<span>胜出全国 <span class="color">70%</span> 的玩家</span>
				</div>
				<img src="img/page8_txt1.png" alt="" class="page8_txt1" />
				<img src="img/page8_btn1.png" alt="" class="page8_btn1" />
				<img src="img/page8_btn2.png" alt="" class="page8_btn2" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page9-->
			<div class="page_9">
				<img src="img/page1_logo.png" alt="" id="logo" />
				<img src="img/page9_person.png" alt="" class="person1" />
				<div class="page9_txt">
					<h1><span>魔鬼 </span><span>  拜谢你</span></h1>
					<p>TA将有机会获得地中海风情游(珠海海泉湾 星赏假期套票／星悦套票)、海洋温泉、海泉 湾公仔......等好礼！
					</p>
					<img src="img/page9_img.png" alt="" class="page9_img" />
				</div>
				<img src="img/page9_btn1.png" alt="" class="page9_btn" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page10-->
			<div class="page_10">
				<img src="img/page1_logo.png" alt="" id="logo" />
				<img src="img/page10_txt1.png" alt="" class="page10_txt1">
				<div class="page10_txt3">( 已有<span>2</span>位导师选择“你丫太差啦 ”)</div>
				<img src="img/page10_xiaorenxiao.png" alt="" class="person2" id="page10_person" />
				<div class="page10_txt4">
					<p class="p1"><span class="color">只要有1位</span>导师让您晋级，</p>
					<p>你即可抽取免费地中海风情游资格哦！</p>
				</div>
				<img src="img/page10_btn.png" alt="" class="page10_btn" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page11-->
			<div class="page_11">
				<img src="img/page1_logo.png" alt="" id="logo" />
				<img src="img/page11_txt1.png" alt="" class="page11_txt1" />
				<img src="img/page10_xiaorenxiao.png" alt="" class="person2" />
				<div class="page11_txt2" style="font-size: 10px;">
					<h2>马上抽免费地中海风情游</h2>
					<p>奖池共有林志颖签名书1份、星赏假期套票4份、 星悦套票8份、海景房12份、海洋温泉门票40份、 神秘岛门票40份、梦幻剧场门票40份、海泉湾 公仔40份、明星海报300份等。
					</p>
				</div>
				<img src="img/page11_btn.png" alt="" class="page11_btn" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page12-->
			<div class="page_12">
				<img src="img/page1_logo.png" alt="" id="logo" />
				<img src="img/page12_txt1.png" alt="" class="page12_txt1">
				<img src="img/page12_person1.png" alt="" class="person2" id="page12_person" />
				<div class="page12_txt4">
					<p class="p1"><span class="color">只要有1位</span>导师让您晋级，</p>
					<p>你即可抽取免费地中海风情游资格哦！</p>
				</div>
				<img src="img/page10_btn.png" alt="" class="page10_btn" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page13-->
			<div class="page_13">
				<img src="img/page8_bg.png" alt="" id="bg5" />
				<img src="img/page1_logo.png" alt="" id="logo" />
				<div class="zhuan">
					<div class="carDiv">
						<img src="img/car.png" alt="" class="car" />
					</div>
					<img src="img/zhuan.png" />
				</div>
				<img src="img/btn.png" class="btn" />
				<img src="img/hand.png" class="hand" />
				<img src="img/page13_btn.png" alt="" class="page13_btn" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page14-->
			<div class="page_14">
				<div class="page14_bg"></div>
				<img src="img/page14_gongxi.png" alt="" class="page14_txt1" />
				<img src="img/page14_xiaoren.png" alt="" class="person3" />
				<div class="page14_txt2">
					<img src="img/page14_tp.png" alt="" class="page14_tp" />
					<div class="page14_txt3">中了星赏假期套票1份</div>
				</div>
				<img src="img/page14_tianxie.png" alt="" class="page14_btn" />
				<div class="page14_txt4">分享给好友，一起来玩哦！</div>
			</div>
			<!---------------------------------------------------------------------->
			<!--page15-->
			<div class="page_15">
				<div class="page14_bg"></div>
				<img src="img/page15_txt.png" alt="" class="page15_txt1" />
				<div class="page15_txt2">
					<img src="img/page15_jg.png" alt="" />
					<span class="spantxt">请务必完整认真填写，凭信息核对领取</span>
					<div>姓名<input type="text" class="input" id="name" /></div>
					<div>电话<input type="text" class="input" id="tel" /></div>
					<div class="add">
						住址 <input type="text" class="select slone" placeholder="省" />
						<div class="addbg"></div>
						<div class="arrow addone"></div>
						<!--省-->
						<ul class="adds">
							<li>山东省</li>
							<li>吉林省</li>
							<li>辽宁省</li>
						</ul>
					</div>
					<div class="add">
						<input type="text" class="select sltwo" placeholder="市" />
						<div class="addbg"></div>
						<div class="arrow addtwo"></div>
						<!--市-->
						<!--山东省的市-->
						<ul class="shand shi">
							<li>济南市</li>
							<li>青岛市</li>
							<li>威海市</li>
						</ul>
						<!--吉林省的市-->
						<ul class="jilin shi">
							<li>吉林市</li>
							<li>四平市</li>
							<li>长春市</li>
						</ul>
						<!--辽宁省的市-->
						<ul class="liaon shi">
							<li>大连市</li>
							<li>沈阳市</li>
							<li>鞍山市</li>
						</ul>
					</div>
					<div class="text"><input type="text" class="input" id="address" /></div>
				</div>
				<img src="img/page15_btn.png" alt="" class="page15_btn" />
			</div>
			<!---------------------------------------------------------------------->
			<!--page16-->
			<div class="page_16">
				<div class="page14_bg"></div>
				<img src="img/page16_txt.png" alt="" class="page16_txt1" />
				<img src="img/page16_person1.png" alt="" class="person4" />
				<img src="img/page16_light.png" alt="" class="page16_light" />
				<div class="page16_txt2">
					<p class="p1">奖品将于活动结束后统一安排基础，</p>
					<p>请耐心关注海泉湾官方微信。</p>
				</div>
			</div>
			<!---------------------------------------------------------------------->
		</div>
		<script src="js/jquery-1.11.2.js"></script>
		<script src="js/jquery.rotate.min.js"></script>
		<script src="js/jQueryRotate.2.2.js"></script>
		<!--<script src="js/index.js"></script>-->
		<script type="text/javascript">
			var zhuan = document.querySelector(".zhuan");
			var time_message = "";
			var wait_ajax = "";
			var num = 0;
			var canClick = true; //点击为true
			var car = document.querySelector(".carDiv");
			$(".btn").on("touchstart", function() {
				//不允许用户反复点击
				if(canClick) {
					canClick = false;
					//等待ajax请求的数据返回,并模拟转动,每隔10毫秒绕z轴旋转一定的度数
					wait_ajax = setInterval(function() {
						num++;
						car.style.webkitTransform = "rotateZ(" + 20 + num * 7.2 + "deg)";
					}, 10);

					//点击之后手消失
					$(".hand").css("display", "none");

					$.ajax({
						type: "get",
						url: "rotate.php",
						async: true,
						success: function(data) {
							clearInterval(wait_ajax);
							num = 0;
							var deg = data;
							console.log(deg)
							$(".carDiv").rotate({
								duration: 8000, //转动时间间隔
								//获取等待ajax时转动的度数
								angle: 20 + (num * 7.2) % 360,
								animateTo: 1800 + parseInt(deg),
								easing: $.easing.easeOutExpo
							});

							time_message = setTimeout(function() {
								if(deg == 20) {
									alert("恭喜您获得海洋温泉门票一张");
									$(".page14_txt3").html("获得了海洋温泉门票一张");
								} else if(deg == 65) {
									alert("恭喜您获得神秘岛门票一张");
									$(".page14_txt3").html("获得了神秘岛门票一张");
								} else if(deg == 110) {
									alert("恭喜您获得梦幻剧场门票一张");
								} else if((deg == 155) || (deg == 335)) {
									alert("恭喜您获得了一份神秘的奖品");
									$(".page14_txt3").html("获得了一份神秘的奖品");
								} else if(deg == 200) {
									alert("恭喜您获得海泉湾吉祥公仔一个");
									$(".page14_txt3").html("获得一个海泉湾吉祥公仔");
								} else if(deg == 245) {
									alert("恭喜您获得明星海报一张");
									$(".page14_txt3").html("获得一份明星海报");
								} else if(deg == 290) {
									alert("运气爆棚,赢得海景房一套");
									$(".page14_txt3").html("赢得了海景房一套");
								}
								canClick = true;
								$(".page_14").show();
							}, 8000)
						}
					});
				}
			});
		</script>
		<script type="text/javascript">
			//输入登录信息
			/*$(".login").on("touchstart", function() {
				$.ajax({
					type: "get",
					url: "login.php",
					async: true,
					data: {
						gamename: $(".gamename").val(),
						email: $(".email").val(),
						pass: $(".password").val()
					},
					dataType: "json",
					success: function(json) {
						alert($(".gamename").val());
					}
				});
			});*/
			/*－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－*/
			//输入领奖信息
			$(".page15_btn").on("touchstart", function() {
				var name = $("#name").val();
				var tel = $("#tel").val();
				var add = $("#address").val();
				if(name == '' || tel == '' || add == '') {
					alert("请输入完整信息");
					return
				}
				var regu = /^[1][0-9]{10}$/;
				var re = new RegExp(regu);
				if(!re.test(tel)) {
					alert("请输入正确手机号码");
					$("#tel").val("");
					return
				}
				$(".page_16").show();
				//领奖的个人资料
				$.ajax({
					type: "get",
					url: "message.php",
					async: true,
					data: {
						name: $("#name").val(),
						tel: $("#tel").val(),
						address: $("#address").val(),
						prize: $(".page14_txt3").html()
					},
					dataType: "json",
					success: function(json) {
						alert($("#name").val());
					}
				});
			});
			/*－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－*/
			//请求好友支援
			$(".page5_news").on('touchstart', function() {
				$.ajax({
					type: "get",
					dataType: "json",
					url: "paim.php",
					async: true,
					data: {
						active: "paim"
					},
					success: function(json) {
						$(".nameone").html(json[0].name);
						$(".nametwo").html(json[1].name);
						$(".namethree").html(json[2].name);
						$(".namefour").html(json[3].name);
						$(".namefive").html(json[4].name);
						$(".namesix").html(json[5].name);
						$(".nameevent").html(json[6].name);
						$(".nameeight").html(json[7].name);
					}
				});
			});
			//点击显示排行榜
			$(".page5_1btn2").on('touchstart', function() {
				$(".page_7").show();
				$(".myname").html($(".gamename").val());
				//排行榜的更新
				$.ajax({
					type: "get",
					dataType: "json",
					url: "paim.php",
					async: true,
					data: {
						active: "paim"
					},
					success: function(json) {
						$(".nameone").html(json[0].name);
						$(".nametwo").html(json[1].name);
						$(".namethree").html(json[2].name);
						$(".namefour").html(json[3].name);
						$(".namefive").html(json[4].name);
						$(".namesix").html(json[5].name);
						$(".nameevent").html(json[6].name);
						$(".nameeight").html(json[7].name);
						$(".scone").html(json[0].score);
						$(".sctwo").html(json[1].score);
						$(".scthree").html(json[2].score);
						$(".scfour").html(json[3].score);
						$(".scfive").html(json[4].score);
						$(".scsix").html(json[5].score);
						$(".scevent").html(json[6].score);
						$(".sceight").html(json[7].score);
					}
				});
				//分数的更新
				/**/
				$.ajax({
					type: "get",
					url: "score.php",
					async: true,
					data: {
						name: $(".gamename").val(),
						email: $(".email").val(),
						pass: $(".password").val(),
						score: $(".barnum").html(),
						openid: '<?php echo $openid; ?>',
						logo: '<?php echo $userInfo["headimgurl"]; ?>'
					},
					success: function(json) {
						$(".barnum").html();
					}
				});
				//排名的更新
				/**/
				$.ajax({
					type: "get",
					url: "paiming.php",
					async: true,
					data: {
                        //name: $(".gamename").val()
                        openid: '<?php echo $openid; ?>'
					},
					success: function(json) {
						$(".paiming").html(json);
					}
				});
                //百分比
				$.ajax({
					type: "get",
					url: "baifb.php",
					async: true,
					data: {
						name: $(".gamename").val()
					},
					success: function(json) {
						$("#bfb").html(json);
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(function(){
				$(".page5_1btn1").on("touchstart",function(){
						$.ajax({
						type: "get",
						dataType: "json",
						url: "logo.php",
						async: true,
						data: {
							active: "paim"
						},
						success: function(json) {
							$(".imgone").attr("src", json[0].logo);
							$(".imgtwo").attr("src", json[1].logo);
							$(".imgthree").attr("src", json[2].logo);
							$(".imgfour").attr("src", json[3].logo);
							$(".imgfive").attr("src", json[4].logo);
							$(".imgsix").attr("src", json[5].logo);
							$(".imgevent").attr("src", json[6].logo);
							$(".imgeight").attr("src", json[7].logo);
						}
					});
				})
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				setTimeout(function() {
					$(".page1_title").show();
				}, 1000);
				$(".guize1").on("touchstart", function() {
					$(".page_2").show();
				});
				/*page-1隐藏,page-3显示*/
				$(".page1_btn1").on("touchstart", function() {
					$(".page_1").hide();
					$(".page_3").show();
				});
				$(".page2_close").on("touchstart", function() {
					$(".page_2").hide();
				});
				$(".page2_btn").on("touchstart", function() {
					$(".page_1").hide();
					$(".page_2").hide();
					$(".page_3").show();
				});
				/*message显示*/
				$(".page3_btn").on("touchstart", function() {
					$("#message").show();
				});
				var aEmail = document.querySelector(".email");
				$(".login").on("touchstart", function() {
					var gamename = $(".gamename").val();
					var email = $(".email").val();
					var pass = $(".password").val();
					if(gamename == '' || email == '' || pass == '') {
						alert("请输入完整信息");
						return
					} else {
						alert("登录成功");
						/*$(".gamestart").on("touchstart", function() {
							$(".page_3").hide();
							$("#message").hide();
							$(".page_4_1").show();
							page4();
						});*/
					}
					var re = /^\w+@[a-z0-9]{2,6}(\.[a-z]{2,6}){1,4}$/;
					var re2 = /^\s+|\s+$/g;
					aEmail.value = aEmail.value.replace(re2, "");
					if(re.test(aEmail.value)) {
						return true;
					} else {
						alert('请输入正确的邮箱信息');
						aEmail.value = "";
					}
				});
				/*if($(".gamename").val("") || $(".email").val("") || $(".password").val("")) {
					$(".gamestart").on("touchstart", function() {
						alert("请先填写完整的登录信息");
					});
				}*/

				$(".gamestart").on("touchstart", function() {
					$(".page_3").hide();
					$("#message").hide();
					$(".page_4_1").show();
					page4();
				});

				$(".button").on("touchstart", function() {
					alert("请求成功");
				});

				var timer3 = null;

				function page4() {
					/***********************page4-1红绿灯切换**红绿灯隐藏**************************/
					var timer1 = setTimeout(function() {
						$(".img_12").show();
					}, 2000);

					setTimeout(function() {
						$(".img_13").show();
						clearTimeout(timer1);
					}, 3000);

					setTimeout(function() {
						$(".img_13").hide();
						$(".img_14").show();
					}, 4000);
					var timer2 = setTimeout(function() {
						$(".lights").hide();
						$(".img_6").hide();
						/********************************page4-1的倒计时器********************************/
						var time1 = 29;

						timer3 = setInterval(function() {
							time1--;
							$(".time1").html("0:0:" + time1);
							if(time1 <= 9) {
								$(".time1").html("0:0:0" + time1);
							}
							if(time1 == 0) {
								clearInterval(timer3);
								$("#page_header").hide();
								$("#page_middle").show();
								$(".page_5a1").show();
								bars();
							}
						}, 1000);
						/*************************调用函数:赛道与赛车开始运动***************************/
						move(5);
						moveLR(oCar, 10);
						wCar();
						bar();
						setInterval(Impact, 10);
						/********************************加速********************************/
						$(".img_11").on("touchstart", function() {
							$(".img_11").hide();
							$(".speed").show();
							oCar.src = "img/page4_1js.png";
							clearTimeout(timer2);
							move(20);
							$(".speed").on("touchstart", function() {
								$(".speed").hide();
								$(".img_11").show();
								oCar.src = "img/page4_1zc.png";
								clearTimeout(timer2);
								move(5);
							});
						});
					}, 5000);
				}

				/********************************page_4 背景图的移动********************************/
				var move1 = document.querySelector(".move");
				var imgs = document.querySelectorAll(".move>img");
				var timer = null;
				var heights = imgs[0].offsetHeight;
				var allH = imgs.length * heights;
				var img7 = document.querySelector(".img_7");

				function move(num) {
					clearInterval(timer);
					timer = setInterval(function() {
						if(move1.offsetTop >= allH / 2) {
							move1.style.top = 0 + "px";
						}
						move1.style.top = move1.offsetTop + num + "px";
						if($(".img_7").offset().top == 1000) {
							$(".img_7").hide();
						}
						img7.style.top = img7.offsetTop + 5 + "px";
					}, 30);
				}
				/********************************左右走********************************/
				var oCar = document.querySelector(".img_8");
				var max = $(".page_4_1").width();
				//alert(max);
				function moveLR(obj, speed) {
					$(".img_9").on("touchstart", function(ev) {
						ev.preventDefault();
						ev.stopPropagation();
						if(obj.offsetLeft <= max * 0.1) {
							obj.style.left = max * 0.1 + "px";
						}
						obj.style.left = obj.offsetLeft - speed + "px";
					});

					$(".img_10").on("touchstart", function(ev) {
						ev.preventDefault();
						ev.stopPropagation();
						if(obj.offsetLeft >= max - 80) {
							obj.style.left = max - 80 + "px";
						}
						obj.style.left = obj.offsetLeft + speed + "px";
					});
				}
				/********************************白车障碍物********************************/
				function rand(min, max) {
					return parseInt(Math.random() * (max - min)) + min;
				}
				var arrWcar = ["img/page4_2cml.png", "img/page4_2cmr.png"];

				function wCar() {
					clearInterval(timecrea);
					var timecrea = setInterval(function() {
							var img = $("<img src='img/page4_2cml.png' class='page4_whitecar'>");
							img.attr("src", arrWcar[rand(0, 2)]);
							img.css({
								"left": rand(40, max - 80) + "px"
							});
							$(".page_4_1").append(img);
							clearInterval(timer6);
							var timer6 = setInterval(function() {
								if(img.offset().top >= 1000) {
									img.remove();
									clearInterval(timer6);
								} else {
									img.css({
										"top": img.offset().top + 5 + "px"
									});
								}
							}, 30);
							$(".img_11").on("touchstart", function() {
								img.css({
									"top": img.offset().top + 20 + "px"
								});
							});
							$(".speed").on("touchstart", function() {
								img.css({
									"top": img.offset().top + 5 + "px"
								});
							});
						},
						10000);
				}
				/********************************雪橇障碍物********************************/
				var count = 0;

				function bar() {
					clearInterval(creabar);
					var creabar = setInterval(function() {
						var img = $("<img src='img/page4_2za.png' class='bar'>");
						$(".page_4_1").append(img);
						img.css({
							"left": rand(40, max - 80) + "px"
						});
						clearInterval(timerbar);
						var timerbar = setInterval(function() {
							if(img.offset().top >= 1000) {
								img.remove();
								count++;
								$("#barnum").html(count);
								$(".barnum").html(count);
								clearInterval(timerbar);
							} else {
								img.css({
									"top": img.offset().top + 5 + "px"
								});
							}
						}, 30);
						$(".img_11").on("touchstart", function() {
							img.css({
								"top": img.offset().top + 20 + "px"
							});
						});
						$(".speed").on("touchstart", function() {
							img.css({
								"top": img.offset().top + 5 + "px"
							});
						});
					}, 3000);
				}
				/********************************检测碰撞********************************/
				function collide(obj1, obj2) {
					//物体1
					var left1 = obj1.offsetLeft;
					var right1 = left1 + obj1.offsetWidth;
					var top1 = obj1.offsetTop;
					var bottom1 = top1 + obj1.offsetHeight;
					//物体2
					var left2 = obj2.offsetLeft;
					var right2 = left2 + obj2.offsetWidth;
					var top2 = obj2.offsetTop;
					var bottom2 = top2 + obj2.offsetHeight;
					//判断
					if(bottom1 > top2 && top1 < bottom2 && left1 < right2 && right1 > left2) {
						return true;
					} else {
						return false;
					}
				}
				//-----------------------------------------------------------------------------------
				//碰撞函数
				function Impact() {
					var zacArr = document.querySelectorAll(".page4_whitecar");
					var zawArr = document.querySelectorAll(".bar");
					for(var i = 0; i < zawArr.length; i++) {
						for(var j = 0; j < zacArr.length; j++) {
							if(collide(oCar, zacArr[j])) {
								clearInterval(timer3);
								$(".page_12").show();
								$("#page_last").show();
								$("#page_middle").hide();
								$("#page_header").hide();
								console.log(1);
							}
						}
						if(collide(oCar, zawArr[i])) {
							clearInterval(timer3);
							$(".page_5b").show();
							$("#page_middle").show();
							$("#page_header").hide();
							console.log(2);
						}
					}
				}

				//---------------------------page5~~~~~page16-----------------------------
				function page8() {
					$(".page8_btn1").on("touchstart", function() {
						$(".page_9").show();
						$(".page_8").hide();
					});
					$(".page8_btn2").on("touchstart", function() {
						$(".page_10").show();
						$(".page_8").hide();
					});
				}
				/*---------------------障碍物计数-------------------------*/
				function bars() {
					var timer = null;
					var num = 0;
					setTimeout(function() {
						$(".page5a1_txt2").show();
						timer = setInterval(function() {
							num++;
							$("#hinder").html(num);
							if(num >= count) {
								clearInterval(timer);
								$(".page5a1_txt3").show();
								setTimeout(function() {
									$(".page5_txt").show();
								}, 1000);
							}
						}, 30);
					}, 2000);
				}
				$(".page5_1btn1").on("touchstart", function() {
					$(".page_5a2").show();
				});
				$(".page5a2_btn").on("touchstart", function() {
					$("#new_page").show();
					$("#page_middle").hide();
					$(".button").on("touchstart", function() {
						$(".page_11").show();
						$("#new_page").hide();
						$(".page11_btn").on("touchstart", function() {
							$(".page_13").show();
							$(".page_11").hide();
						});
					});
				});
				$(".page5_news").on("touchstart", function() {
					$("#page_middle").hide();
					$("#page_last").show();
					$(".page_8").show();
					page8();
				});
				$(".page7_close").on("touchstart", function() {
					$(".page_7").hide();
				});
				/*---------------------page15－－ news-------------------------*/
				$(".page14_btn").on("touchstart", function() {
					$(".page_15").show();
					$(".page_14").hide();
				});
				/*---------------------page10，12——person-------------------------*/
				var oPerson10 = document.querySelector("#page10_person");
				var oPerson12 = document.querySelector("#page12_person");
				var arr10 = ['img/page10_xiaorenxiao.png', 'img/page10_xiaoren.png'];
				var arr12 = ['img/page12_person1.png', 'img/page12_person2.png'];

				function rand(min, max) {
					return parseInt(Math.random() * (max - min)) + min;
				}
				setInterval(function() {
					oPerson10.src = arr10[rand(0, 2)];
					oPerson12.src = arr12[rand(0, 2)];
				}, 800);
				/*---------------------page15——address-------------------------*/
				$(".addone").on("touchstart", function() {
					$(".adds").show();
					$(".shi").hide();
				});
				var Citys = document.querySelectorAll(".adds li");
				var sdCitys = document.querySelectorAll(".shand li");
				var jlCitys = document.querySelectorAll(".jilin li");
				var lnCitys = document.querySelectorAll(".liaon li");
				for(var i = 0; i < Citys.length; i++) {
					Citys[i].onmouseover = function() {
						$(".adds").hide();
						$(".slone").val(this.innerHTML);
						$(".sltwo").val("");
						$("#address").val("");
						var slone = document.querySelector(".slone").value;
						if(slone == "山东省") {
							$(".addtwo").on("touchstart", function() {
								$(".adds").hide();
								$(".shand").show();
								$(".jilin").hide();
								$(".liaon").hide();
								for(var i = 0; i < sdCitys.length; i++) {
									sdCitys[i].onmouseover = function() {
										$(".shand").hide();
										$(".sltwo").val(this.innerHTML);
										$("#address").val($(".slone").val() + $(".sltwo").val());
									}
								}
							});
						}
						if(slone == "吉林省") {
							$(".addtwo").on("touchstart", function() {
								$(".adds").hide();
								$(".jilin").show();
								$(".shand").hide();
								$(".liaon").hide();
								for(var i = 0; i < jlCitys.length; i++) {
									jlCitys[i].onmouseover = function() {
										$(".jilin").hide();
										$(".sltwo").val(this.innerHTML);
										$("#address").val($(".slone").val() + $(".sltwo").val());
									}
								}
							});
						}
						if(slone == "辽宁省") {
							$(".addtwo").on("touchstart", function() {
								$(".adds").hide();
								$(".liaon").show();
								$(".shand").hide();
								$(".jilin").hide();
								for(var i = 0; i < lnCitys.length; i++) {
									lnCitys[i].onmouseover = function() {
										$(".liaon").hide();
										$(".sltwo").val(this.innerHTML);
										$("#address").val($(".slone").val() + $(".sltwo").val());
									}
								}
							});
						}
					}
				}
			});
			//-----------------------------------------------------------------------------------
			$(function() {
				$(".page5b_btn1").on("touchstart", function() {
					window.location.reload();
				});
				$(".page9_btn").on("touchstart", function() {
					window.location.reload();
				});
				$(".page10_btn").on("touchstart", function() {
					window.location.reload();
				});
				$(".page13_btn").on("touchstart", function() {
					window.location.reload();
				});
				$("#index").on("touchstart", function() {
					window.location.reload();
				});
			})
		</script>
	</body>

</html>