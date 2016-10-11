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
	/*page-3隐藏,page-4-1显示*/
	$(".page3_btn").on("touchstart", function() {
		$("#logo").hide();
		$(".page_3").hide();
		$(".page_4_1").show();
		page4();
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
			setInterval(Impact, 2);
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
	var timerLeft = null;
	var timerRight = null;
	function moveLR(obj, speed) {
		$(".img_9").on("touchstart", function(ev) {
			ev.preventDefault();
			ev.stopPropagation();
			if(obj.offsetLeft <= max * 0.1) {
				obj.style.left = max * 0.1 + "px";
			}
			timerLeft=setInterval(function(){
				obj.style.left = obj.offsetLeft - speed + "px";
			},1);
		});
		$(".imh_9").on("touchend",function(){
			clearInterval(timerLeft);
		});
		$(".img_10").on("touchstart", function(ev) {
			ev.preventDefault();
			ev.stopPropagation();
			if(obj.offsetLeft >= max - 80) {
				obj.style.left = max - 80 + "px";
			}
		timerRight=setInterval(function(){
			obj.style.left = obj.offsetLeft + speed + "px";
		},1);
		});
		$(".imh_10").on("touchend",function(){
			clearInterval(timerRight);
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
					$(".barnum").html(count+"个");
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
				$(".page_5b").show();
				$("#page_middle").show();
				$("#page_header").hide();
				console.log(2);
			}
		}
	}
	
	//-----------------------------------------------------------------------
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
$(function(){
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
